<?php

namespace App\Http\Controllers;

use App\Http\Requests\AMCCompany\InfoRequest;
use App\Http\Requests\AMCCompany\StoreRequest;
use App\Http\Requests\AMCCompany\LicenseRequest;
use App\Http\Requests\AMCCompany\ContactRequest;
use App\Http\Requests\AMCCompany\ContactUpdateRequest;
use App\Http\Requests\AMCCompany\GeographicRequest;
use App\Http\Requests\AMCCompany\InfoUpdateRequest;
use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\CompanyDocument;
use App\Models\Role;
use App\Models\TradeLicense;
use App\Models\User;
use App\Notifications\CompanyCreationNotification;
use Illuminate\Http\Request;
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
    public function dropdownList()
    {
        return Company::where("account_type", "AMC")->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::where("account_type", "AMC")->with(['users', 'company_contact', 'trade_license', 'company_documents'])->paginate(request("per_page") ?? 10);
    }

    public function validateAMCCompany(InfoRequest $request)
    {
        // DB::beginTransaction();

        try {
            $data = $request->validated();

            $data["max_employee"] = 0;
            $data["max_devices"] = 0;
            $data["company_code"] = Company::max('id') + 1;
            $data["account_type"] = "AMC";

            if (isset($request->logo)) {

                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $request->file('logo')->move(public_path('/upload'), $fileName);
                $data['logo'] = $fileName;
            }

            $created = Company::create($data);

            return $this->response('AMC Company Successfully created.', $created, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function validateLicense(LicenseRequest $request)
    {
        try {
            $data = $request->validated();
            $created = TradeLicense::updateOrCreate(['company_id' =>  $data["company_id"]], $data);
            return $this->response('License Successfully created.', $created, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function validateContact(ContactRequest $request)
    {
        try {
            $data = $request->validated();
            $data["password"] = Hash::make("password");
            $data["user_type"] = "customer";
            $created = User::updateOrCreate(['company_id' =>  $data["company_id"]], $data);
            return $this->response('User Successfully created.', $created, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function validateGeographic(GeographicRequest $request)
    {
        try {
            $updated = Company::where("id", $request->company_id)->update($request->except("company_id"));

            return $this->response('Geographic Successfully created.', $updated, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AMCCompanyInfoUpdate(InfoUpdateRequest $request, $id)
    {
        try {

            $data = $request->validated();

            if (isset($request->logo)) {

                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $request->file('logo')->move(public_path('/upload'), $fileName);
                $data['logo'] = $fileName;
            }

            $updated = Company::where("id", $id)->update($data);

            return $this->response('Geographic Successfully updated.', $updated, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AMCLicenseUpdate(LicenseRequest $request, $id)
    {

        try {
            $updated = TradeLicense::where("id", $id)->update($request->validated());

            return $this->response('User Successfully updated.', $updated, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AMCContactUpdate(ContactUpdateRequest $request, $id)
    {

        try {
            $updated = User::where("id", $id)->update($request->validated());

            return $this->response('User Successfully updated.', $updated, true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AMCGeographicUpdate(GeographicRequest $request, $id)
    {
        try {
            $updated = Company::where("id", $id)->update($request->except("company_id"));

            return $this->response('Geographic Successfully updated.', $updated, true);
        } catch (\Throwable $th) {
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

    public function AMCCompany($id)
    {
        return Company::with("users")->find($id);
    }

    public function AMCDocumentUpdate(Request $request, $id)
    {
        $arr = [];
        foreach ($request->items as $key => $item) {

            $file = $item["attachment"];
            $ext = $file->getClientOriginalExtension();
            $fileName = $key . time() . '.' . $ext;
            $file->move(public_path('/company_documents'), $fileName);

            $arr[] = [
                "title" => $item["title"],
                "company_id" => $id,
                "attachment" => $fileName,
                "date" => date("Y-m-d"),
                "start_date" => $item["start_date"],
                "expire_date" => $item["expire_date"],
            ];
        }
        try {
            return $this->response("Document has been updated", CompanyDocument::insert($arr), true);
        } catch (\Throwable $th) {
            $this->response("Record cannot update", $th, false);
        }
    }

    public function AMCDocumentDelete($id)
    {
        $CompanyDocument = CompanyDocument::find($id);


        try {
            if ($CompanyDocument->delete()) {
                return $this->response('Document successfully deleted.', null, true);
            } else {
                return $this->response('Document cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
