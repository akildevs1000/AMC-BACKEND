<?php

namespace App\Http\Controllers;

use App\Http\Requests\AMCCompany\InfoRequest;
use App\Http\Requests\AMCCompany\StoreRequest;
use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\Role;
use App\Models\User;
use App\Notifications\CompanyCreationNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use TechTailor\RPG\Facade\RPG;

class AMCCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::where("account_type", "AMC")->with(['user', 'contact'])->paginate(request("per_page") ?? 10);
    }

    public function validateAMCCompany(InfoRequest $request)
    {
        try {
            return $this->response('AMC Company Successfully validated.', $request->validated(), true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StoreRequest $request)
    {
        $randPass = RPG::Generate("luds", 8, 0, 0);

        if (env("APP_ENV") == "local") {
            Storage::put('password.txt', $randPass);
        }

        $data = $request->validated();
        $user = [
            "name" => "ignore",
            "password" => Hash::make($randPass = "secret"),
            "email" => $data['email'],
            "is_master" => 1,
            "first_login" => 1,
            "user_type" => "customer",
        ];

        $company = [
            "name" => $data['company_name'],
            "location" => $data['location'],
            "member_from" => $data['member_from'],
            "expiry" => $data['expiry'],
            "company_code" => Company::max('id') + 1,
            "no_branch" => 0,
            "max_employee" => 0,
            "max_devices" => 0,

            "lat" => $request->lat,
            "lon" => $request->lon,

            "account_type" => "AMC",

        ];

        if (isset($request->logo)) {

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $request->file('logo')->move(public_path('/upload'), $fileName);
            $company['logo'] = $fileName;
        }

        $contact = [
            "name" => $data['contact_name'],
            "number" => $data['number'],
            "position" => $data['position'],
            "whatsapp" => $data['whatsapp'],
        ];

        DB::beginTransaction();

        try {
            $role = Role::firstOrCreate(['name' => 'company']);

            if (!$role) {
                return $this->response('Role cannot add.', null, false);
            }

            $user["role_id"] = $role->id;

            if (!$user) {
                return $this->response('User cannot add.', null, false);
            }

            $company = Company::create($company);

            $user["company_id"] = $company->id;
            $user = User::create($user);

            $company->user_id = $user->id;
            $company->save();

            $user['randPass'] = $randPass;
            try {
                if (($company && $user) && env('IS_MAIL')) {
                    NotificationsController::toSend($user, new CompanyCreationNotification, $company);
                }
            } catch (\Exception $e) {
                return $e;
            }
            if (!$company) {
                return $this->response('Company cannot add.', null, false);
            }

            $contact['company_id'] = $company->id;

            $contact = CompanyContact::create($contact);

            if (!$contact) {
                return $this->response('Contact cannot add.', null, false);
            }

            $company->logo = asset('media/company/logo' . $company->logo);

            DB::commit();

            $record = Company::with(['user', 'contact'])->find($company->id);
            $record->pass = $randPass;

            // if (!$this->addDefaults($company->id)) {
            //     return $this->response('Default cannot add.', null, false);
            // }

            return $this->response('Company Successfully created.', $record, true);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function AMCCompanyDelete($id)
    {
        $Company = Company::find($id);

        $User    = User::where("id", $Company->user_id)->first();

        try {
            if ($Company->delete() && $User->delete()) {
                return $this->response('Company successfully deleted.', null, true);
            } else {
                return $this->response('Company cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
