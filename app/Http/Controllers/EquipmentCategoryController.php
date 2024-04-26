<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentCategory\StoreRequest;
use App\Http\Requests\EquipmentCategory\UpdateRequest;

use App\Models\EquipmentCategory;

class EquipmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropDownList()
    {
        return EquipmentCategory::orderBy("name", "asc")->get();
    }

    public function equipmentCategoryWithQuestions()
    {
        $domain = request()->getHost(); // Get the domain from the request

        $model = EquipmentCategory::orderBy("id", "desc")
            ->whereHas("headings")
            ->with("headings");

        if ($domain === 'amccustomer.mytime2cloud.com') {
            return $model->paginate(request("per_page") ?? 10);
        }

        return $model->get();
    }

    public function index()
    {
        return EquipmentCategory::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = EquipmentCategory::create($request->validated());

        try {
            if ($response) {
                return $this->response('Equipment Category successfully created.', null, true);
            } else {
                return $this->response('Equipment Category cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment Category cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentCategory  $EquipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, EquipmentCategory $EquipmentCategory)
    {
        $response = $EquipmentCategory->update($request->validated());

        try {
            if ($response) {
                return $this->response('Equipment Category successfully updated.', null, true);
            } else {
                return $this->response('Equipment Category cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment Category cannot update.', null, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentCategory  $EquipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentCategory $EquipmentCategory)
    {
        try {
            if ($EquipmentCategory->delete()) {
                return $this->response('Equipment Category successfully deleted.', null, true);
            } else {
                return $this->response('Equipment Category cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment Category cannot delete.', null, false);
        }
    }
}
