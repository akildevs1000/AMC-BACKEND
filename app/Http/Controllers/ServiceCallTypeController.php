<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCallType\StoreRequest;
use App\Http\Requests\ServiceCallType\UpdateRequest;
use App\Models\ServiceCallType;

class ServiceCallTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropDownList()
    {
        return ServiceCallType::orderBy("name", "asc")->get();
    }

    public function index()
    {
        return ServiceCallType::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = ServiceCallType::create($request->validated());

        try {
            if ($response) {
                return $this->response('Service Call Type successfully created.', null, true);
            } else {
                return $this->response('Service Call Type cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Service Call Type cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCallType  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, ServiceCallType $ServiceCallType)
    {
        $response = $ServiceCallType->update($request->validated());
        try {
            if ($response) {
                return $this->response('Service Call Type successfully updated.', null, true);
            } else {
                return $this->response('Service Call Type cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Service Call Type cannot update.', null, false);
        }
    }

    public function destroy(ServiceCallType $ServiceCallType)
    {
        try {
            if ($ServiceCallType->delete()) {
                return $this->response('Service Call Type successfully deleted.', null, true);
            } else {
                return $this->response('Service Call Type cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Service Call Type cannot delete.', null, false);
        }
    }
}
