<?php

namespace App\Http\Controllers;

use App\Http\Requests\Equipment\StoreRequest;
use App\Http\Requests\Equipment\UpdateRequest;

use App\Models\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipment::orderBy("id", "desc")->where("company_id", request("company_id") ?? 0)->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = Equipment::create($request->validated());

        try {
            if ($response) {
                return $this->response('Equipment successfully created.', null, true);
            } else {
                return $this->response('Equipment cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $Equipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Equipment $Equipment)
    {
        $response = $Equipment->update($request->validated());

        try {
            if ($response) {
                return $this->response('Equipment successfully updated.', null, true);
            } else {
                return $this->response('Equipment cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment cannot update.', null, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $Equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $Equipment)
    {
        try {
            if ($Equipment->delete()) {
                return $this->response('Equipment successfully deleted.', null, true);
            } else {
                return $this->response('Equipment cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Equipment cannot delete.', null, false);
        }
    }
}
