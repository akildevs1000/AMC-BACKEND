<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitType\StoreRequest;
use App\Http\Requests\VisitType\UpdateRequest;
use App\Models\VisitType;

class VisitTypeController extends Controller
{
    public function index()
    {
        return VisitType::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = VisitType::create($request->validated());

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
     * @param  \App\Models\VisitType  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, VisitType $VisitType)
    {
        $response = $VisitType->update($request->validated());
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

    public function destroy(VisitType $VisitType)
    {
        try {
            if ($VisitType->delete()) {
                return $this->response('Business Type successfully deleted.', null, true);
            } else {
                return $this->response('Business Type cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Business Type cannot delete.', null, false);
        }
    }
}
