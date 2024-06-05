<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCall\StoreRequest;
use App\Models\ServiceCall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AMCController extends Controller
{
    public function card()
    {
        $total = ServiceCall::whereMonth("created_at", date("m"))->count();

        $open_jobs = ServiceCall::whereMonth("created_at", date("m"))->where("status", "Pending")->count();
        $closed_jobs = ServiceCall::whereMonth("created_at", date("m"))->where("status", "Completed")->count();

        $assigned_jobs = ServiceCall::whereMonth("created_at", date("m"))->whereHas("technicians")->count();
        $not_assigned = ServiceCall::whereMonth("created_at", date("m"))->doesntHave("technicians")->count();



        return [
            [
                "color" => "green",
                "src" => "/bcase.png",
                "title" => "Open Jobs",
                "value" => $open_jobs . "/" . $total,
                "job_type" => "AMC",
                "cols" => "3",
                "page" => "/amc",
            ],
            [
                "color" => "red",
                "src" => "/bcase.png",
                "title" => "Closed Jobs",
                "value" => $closed_jobs . "/" . $total,
                "job_type" => "AMC",
                "cols" => "3",
                "page" => "/amc",
            ],
            [
                "color" => "blue",
                "src" => "/clock.png",
                "title" => "Assigned Jobs",
                "value" => $assigned_jobs . "/" . $total,
                "job_type" => "AMC",
                "cols" => "3",
                "page" => "/amc",
            ],
            [
                "color" => "red",
                "src" => "/clock.png",
                "title" => "Not Assigned Jobs",
                "value" => $not_assigned . "/" . $total,
                "job_type" => "AMC",
                "cols" => "3",
                "page" => "/amc",
            ],

        ];
    }

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
        $data = $request->validated();
        $data['created_at'] = Carbon::now();
        return ServiceCall::create($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkStore(Request $request)
    {
        // Get the current timestamp
        $currentTimestamp = Carbon::now();

        // Get all the request data
        $data = $request->all();

        // Add the 'created_at' field to each record
        foreach ($data as &$record) {
            $record['created_at'] = $currentTimestamp;
        }

        // Perform the bulk insert with the modified data
        return ServiceCall::insert($data);
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
