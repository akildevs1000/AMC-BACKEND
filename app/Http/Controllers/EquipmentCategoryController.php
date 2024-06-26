<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentCategory\StoreRequest;
use App\Http\Requests\EquipmentCategory\UpdateRequest;
use App\Models\Company;
use App\Models\EquipmentCategory;

class EquipmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function equipmentCategoryByCompanyId()
    {
        $ids = Company::pluck("id");

        $arr = [];

        foreach ($ids as $id) {
            $arr[$id] = EquipmentCategory::orderBy("name", "asc")
                ->whereHas("equipment", fn ($q) => $q->where("company_id", $id))
                ->get();
        }

        return $arr;
    }
    public function dropDownList()
    {
        return EquipmentCategory::orderBy("name", "asc")->get();
    }

    public function equipmentCategoryWithQuestions()
    {
        $model = EquipmentCategory::orderBy("id", "desc")
            ->whereHas("headings")
            ->with("headings");

        return $model->paginate(request("per_page") ?? 10);
    }


    public function equipmentCategoryWithQuestionsList()
    {
        return EquipmentCategory::orderBy("id", "desc")->whereHas("headings")->with("headings")->get();
    }

    public function index()
    {
        return EquipmentCategory::paginate(request("per_page") ?? 10);
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
        return $request->validated();
        $response = $EquipmentCategory->update($request->validated());
        return $this->response('Equipment Category successfully updated.', $request->validated(), true);
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
