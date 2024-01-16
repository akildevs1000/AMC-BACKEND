<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = [];

        foreach ($request->headings as $hKey => $heading) {

            foreach ($heading as $key => $item) {

                $arr[] = [
                    "form_entry_id" => $item["form_entry_id"],
                    "question_id" => $item["question_id"],
                    "remarks" => $item["remarks"],
                    "selectedOption" => $item["selectedOption"],
                    "attachment" => Checklist::processAttachment($item, $hKey . $key),
                ];
            }
        }
        // D:\projects\AMC\web-app\AMC-BACKEND\public\checklist
        try {
            return $this->response("Checklist has been added", Checklist::insert($arr), true);
        } catch (\Throwable $th) {
            $this->response("Record cannot update", $th, false);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        //
    }
}
