<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contract\StoreRequest;
use App\Http\Requests\Contract\UpdateRequest;
use App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropdownList($id)
    {
        return Contract::where("company_id", $id)->get();
    }

    public function index()
    {
        return Contract::orderBy("id", "desc")
            ->with(["amc_type", "visit_type", "service_call_type"])
            ->where("company_id", request("company_id"))
            ->paginate(request("per_page") ?? 10);
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
        
        if ($request->attachment) {
            $data["attachment"] = Contract::processAttachment($request->attachment);
        }
        $response = Contract::create($data);

        try {
            if ($response) {
                return $this->response('Contract successfully created.', $response, true);
            } else {
                return $this->response('Contract cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $ticket
     * @return \Illuminate\Http\Response
     */
    public function updateContract(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->attachment) {
            $data["attachment"] = Contract::processAttachment($request->attachment);
        }
        $response = Contract::find($id)->update($data);

        try {
            if ($response) {
                return $this->response('Contract successfully updated.', null, true);
            } else {
                return $this->response('Contract cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
