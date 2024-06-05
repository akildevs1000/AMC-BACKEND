<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ticket\StoreRequest;
use App\Http\Requests\Ticket\UpdateRequest;
use App\Models\Ticket;
use App\Models\TicketHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function card()
    {
        $total = Ticket::whereMonth("created_at", date("m"))->count();

        $open_jobs = Ticket::whereMonth("created_at", date("m"))->where("status", "Pending")->count();
        $closed_jobs = Ticket::whereMonth("created_at", date("m"))->where("status", "Completed")->count();

        $assigned_jobs = Ticket::whereMonth("created_at", date("m"))->whereHas("technicians")->count();
        $not_assigned = Ticket::whereMonth("created_at", date("m"))->doesntHave("technicians")->count();



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

    public function companyIndex()
    {
        $model = Ticket::query();
        $model->orderBy("id", "desc");
        $model->with(['company', 'user', 'ticket_history', 'priority', 'technicians']);
        return $model->paginate(request("per_page") ?? 10);
    }

    public function index()
    {
        $model = Ticket::query();
        $model->orderBy("id", "desc");
        $model->filters();
        $model->with(['company', 'user', 'ticket_history', 'priority', 'technicians']);
        return $model->paginate(request("per_page") ?? 10);
    }

    public function show(Ticket $Ticket)
    {
        return $Ticket->load(['company', 'user', 'ticket_history', 'priority', 'technicians']);
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

        $data["status"] = "Pending";
        $data["ticket_open_date_time"] = date("Y-m-d H:i:s");
        $data["created_at"] = Carbon::now();


        if ($request->attachment) {
            $data["attachment"] = Ticket::processAttachment($request->attachment);
        }
        $response = Ticket::create($data);

        try {
            if ($response) {

                TicketHistory::create([
                    "comments" => $request->comments ?? "---",
                    "user_id" => $request->user_id,
                    "ticket_id" =>  $response->id,
                    "title" => "Tick created",
                    "user_type" => "company",
                    "dateTime" =>  date("Y-m-d H:i:s"),
                ]);

                return $this->response('Ticket successfully created.', null, true);
            } else {
                return $this->response('Ticket cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ticketTechnicianAssigning(Request $request)
    {
        $sIds = $request->ticketIds;
        $tIds = $request->technicianIds;
        $schedule_date = $request->schedule_date;

        $transformedData = collect($sIds)->crossJoin($tIds)
            ->map(
                fn ($item) => ["ticket_id" => $item[0], "technician_id" => $item[1], "schedule_date" => $schedule_date]
            )->toArray();


        DB::table('technician_ticket')->insert($transformedData);

        return $transformedData;
    }

    public function update(Request $request, Ticket $Ticket)
    {
        return $Ticket->update(["status" => $request->status ?? "Open"]);
    }

    public function updateTicket(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->attachment) {
            $data["attachment"] = Ticket::processAttachment($request->attachment);
        }

        if ($data["status"] == "Close") {
            $data["ticket_close_date_time"] = date("Y-m-d H:i:s");
        }

        $response = Ticket::find($id)->update($data);

        try {
            if ($response) {

                TicketHistory::create([
                    "comments" => $request->comments ?? "---",
                    "user_id" => $request->user_id,
                    "ticket_id" =>  $id,
                    "title" => "Ticket updated",
                    "user_type" => "company",
                    "dateTime" =>  date("Y-m-d H:i:s"),
                ]);

                return $this->response('Ticket successfully updated.', null, true);
            } else {
                return $this->response('Ticket cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function recordHistory(Request $request, $ticket_id, $title)
    {
        // // Validation rules
        // $rules = [
        //     "comments" => "nullable|min:3|max:200",
        //     "user_id" => "required",
        //     "user_type" => "nullable",
        //     "dateTime" => "nullable",
        // ];


        // Validation
        // $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        //     // You can customize the response format and HTTP status code as per your API standards
        // }


    }
}
