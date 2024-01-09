<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCall\StoreRequest;
use App\Models\Contract;
use App\Models\Priority;
use App\Models\ServiceCall;
use Illuminate\Http\Request;

class ServiceCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropDownList()
    {
        return ServiceCall::orderBy("id", "desc")->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceCall::orderBy("id", "desc")->whereHas("contract")->with(["contract","priority"])->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return ServiceCall::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCall $serviceCall)
    {
        return $serviceCall->load(["contract","priority"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCall $serviceCall)
    {
        return $serviceCall->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCall $serviceCall)
    {
        return $serviceCall->delete();
    }
}
