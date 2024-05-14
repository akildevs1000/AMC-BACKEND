<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormEntry\StoreRequest;
use App\Http\Requests\FormEntry\ValidateRequest;
use App\Http\Requests\FormEntry\ValidateUpdateRequest;
use App\Models\FormEntry;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FormEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = FormEntry::query();

        $model->orderBy("id", "desc");

        $model->where(function ($q) {
            $q->whereHas("amc.contract", function ($q) {
                if (request()->input('company_id')) {
                    $q->where('company_id', request()->input('company_id'));
                }
            });

            $q->orWhereHas("ticket", function ($q) {
                if (request()->input('company_id')) {
                    $q->where('company_id', request()->input('company_id'));
                }
            });
        });

        if (request()->input('equipment_category_id')) {
            $model->where('equipment_category_id', request()->input('equipment_category_id'));
        }

        if (request()->input('technician_id')) {
            $model->where('technician_id', request()->input('technician_id'));
        }

        if (request()->input('work_type')) {
            $model->where('work_type', request()->input('work_type'));
        }

        // $model->where('work_type', 'amc');
        // $model->whereDate('date', ">=", request()->input("from") ?? date("Y-m-d"));
        // $model->whereDate('date', "<=", request()->input("to") ?? date("Y-m-d"));

        $model->with([
            "amc", "ticket", "equipment_category", "technician", "checklist"
        ]);

        // return request()->input("company_id");

        return $model->paginate(request("per_page") ?? 10);
    }

    /**
     * Validate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateRequest(ValidateRequest $request)
    {
        return $this->response('Form Entry has been validated.', $request->validated(), true);
    }

    public function store(StoreRequest $request)
    {
        // FormEntry::truncate();

        $data = $request->validated();

        if ($request->sign) {
            $base64Image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', request('sign')));
            $imageName = time() . ".png";
            $publicDirectory = public_path("sign");
            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory);
            }
            file_put_contents($publicDirectory . '/' . $imageName, $base64Image);

            $data["sign"] = $imageName;
        }
        $response = FormEntry::create($data);

        try {
            if ($response) {
                return $this->response('Form Entry successfully created.', $response, true);
            } else {
                return $this->response('Form Entry cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function show(FormEntry $formEntry)
    {
        $relations = ["equipment_category", "technician", "checklist"];

        // $relations = ["checklist"];

        $relations[] = $formEntry->work_type == "amc" ? "amc" :  "ticket";

        return $formEntry->load($relations);
    }

    public function update(ValidateUpdateRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->sign) {
            $base64Image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', request('sign')));
            $imageName = time() . ".png";
            $publicDirectory = public_path("sign");
            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory);
            }
            file_put_contents($publicDirectory . '/' . $imageName, $base64Image);

            $data["sign"] = $imageName;
        }

        try {
            FormEntry::where("id", $id)->update([
                "defective_area" => $data["defective_area"],
                "summary" => $data["summary"],
                "technician_signed_datetime" => $data["technician_signed_datetime"]
            ]);

            (new ChecklistController)->update($request, $id);


            return $this->response('Form Entry has been updated.', null, true);
        } catch (\Exception $e) {
            return $this->response('Form Entry update created. Error: ' . $e->getMessage(), null, false);
        }
    }

    public function customerUpdate(Request $request, $id)
    {
        $data = [];
        if ($request->customer_sign) {
            $base64Image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', request('customer_sign')));
            $imageName = time() . ".png";
            $publicDirectory = public_path("customer_sign");
            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory);
            }
            file_put_contents($publicDirectory . '/' . $imageName, $base64Image);

            $data["customer_sign"] = $imageName;
        }

        $data["customer_name"] = $request->customer_name;
        $data["customer_phone"] = $request->customer_phone;
        $data["customer_note"] = $request->customer_note;
        $data["customer_signed_datetime"] = $request->customer_signed_datetime;


        try {
            $response = FormEntry::where("id", $id)->update($data);
            return $this->response('Form Entry has been updated.', $response, true);
        } catch (\Exception $e) {
            return $this->response('Form Entry cannot created. Error: ' . $e->getMessage(), null, false);
        }
    }

    public function destroy(FormEntry $FormEntry)
    {
        try {
            $record = $FormEntry->delete();

            if ($record) {
                return $this->response('Form successfully deleted.', $record, true);
            } else {
                return $this->response('Form cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ticketPrint($id)
    {
        $item = FormEntry::with(["ticket", "equipment_category", "technician", "checklists"])->find($id);

        return Pdf::setPaper('a4', 'portrait')->loadView('pdf.form_entry.ticket.report', compact("item"))->stream();
    }

    public function amcPrint($id)
    {
        $item = FormEntry::with(["amc", "equipment_category", "technician", "checklists"])->find($id);

        return Pdf::setPaper('a4', 'portrait')->loadView('pdf.form_entry.amc.report', compact("item"))->stream();
    }
}
