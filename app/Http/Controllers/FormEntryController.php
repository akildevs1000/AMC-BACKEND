<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormEntry\StoreRequest;
use App\Models\FormEntry;

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

        $model->whereDate('date', ">=", request()->input("from") ?? date("Y-m-d"));
        $model->whereDate('date', "<=", request()->input("to") ?? date("Y-m-d"));

        $model->with([
            "amc", "ticket", "equipment_category", "technician", "checklists"
        ]);

        // return request()->input("company_id");

        return $model->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->before_attachment) {
            $data["before_attachment"] = FormEntry::processAttachment($request->before_attachment, 'before_attachment');
        }

        if ($request->after_attachment) {
            $data["after_attachment"] = FormEntry::processAttachment($request->after_attachment, 'after_attachment');
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
        return $formEntry;
    }
}
