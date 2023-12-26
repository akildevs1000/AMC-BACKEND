<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessType\StoreRequest;
use App\Http\Requests\BusinessType\UpdateRequest;
use App\Models\BusinessType;

class BusinessTypeController extends Controller
{
    public function index()
    {
        return BusinessType::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = BusinessType::create($request->validated());

        try {
            if ($response) {
                return $this->response('Business Type successfully created.', null, true);
            } else {
                return $this->response('Business Type cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Business Type cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessType  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, BusinessType $BusinessType)
    {
        $response = $BusinessType->update($request->validated());
        try {
            if ($response) {
                return $this->response('Business Type successfully updated.', null, true);
            } else {
                return $this->response('Business Type cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Business Type cannot update.', null, false);
        }
    }

    public function destroy(BusinessType $BusinessType)
    {
        try {
            if ($BusinessType->delete()) {
                return $this->response('Business Type successfully deleted.', null, true);
            } else {
                return $this->response('Business Type cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Business Type cannot delete.', null, false);
        }
    }
}
