<?php

namespace App\Http\Controllers;

use App\Http\Requests\AMCType\StoreRequest;
use App\Http\Requests\AMCType\UpdateRequest;

use App\Models\AMCType;
use Illuminate\Http\Request;

class AMCTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AMCType::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = AMCType::create($request->validated());

        try {
            if ($response) {
                return $this->response('AMC Type successfully created.', null, true);
            } else {
                return $this->response('AMC Type cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('AMC Type cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AMCType  $aMCType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $response = AMCType::where("id", $id)->update($request->validated());

        try {
            if ($response) {
                return $this->response('AMC Type successfully updated.', null, true);
            } else {
                return $response;
                return $this->response('AMC Type cannot updated sdfdf.', null, false);
            }
        } catch (\Throwable $th) {
            return $th;
            return $this->response('AMC Type cannot update.', null, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AMCType  $aMCType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = AMCType::where("id", $id)->delete();

        try {
            if ($response) {
                return $this->response('AMC Type successfully deleted.', null, true);
            } else {
                return $this->response('AMC Type cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('AMC Type cannot delete.', null, false);
        }
    }
}
