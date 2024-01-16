<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCall\StoreRequest;
use App\Models\Contract;
use App\Models\Priority;
use App\Models\ServiceCall;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AMCController extends Controller
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
        return ServiceCall::orderBy("status", "desc")
            ->whereHas("contract", function ($q) {
                if (request()->input('company_id')) {
                    $q->where('company_id', request()->input('company_id'));
                }
            })
            ->with(["contract", "priority", "technicians"])
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
        return ServiceCall::create($request->validated());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkStore(Request $request)
    {
        return ServiceCall::insert($request->all());
    }

    public function serviceCallTechnicianAssigning(Request $request)
    {

        $sIds = $request->serviceCallIds;
        $tIds = $request->technicianIds;
        $schedule_date = $request->schedule_date;

        $transformedData = collect($sIds)->crossJoin($tIds)
            ->map(
                fn ($item) => ["service_call_id" => $item[0], "technician_id" => $item[1], "schedule_date" => $schedule_date]
            )->toArray();


        DB::table('service_call_technician')->insert($transformedData);

        return $transformedData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCall $serviceCall)
    {
        return $serviceCall->load(["contract", "priority"]);
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
        return $serviceCall->update(["status" => $request->status ?? "pending"]);
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
