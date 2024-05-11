<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        foreach ($request->attachments as $aKey => $attachment) {

            $base64Image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $attachment['attachment']));
            $publicDirectory = public_path("checklist/" . $request->form_entry_id);

            if (!file_exists($publicDirectory)) {
                mkdir($publicDirectory, 0777, true);
            }

            file_put_contents($publicDirectory . '/' . $attachment['name'], $base64Image);
        }

        $arr = [
            "form_entry_id" => $request->form_entry_id,
            "checklist" => $request->checklist,
        ];

        Checklist::truncate();

        try {
            $model = Checklist::query();
            $model->where("form_entry_id", $request->form_entry_id);
            $model->delete();
            $created = $model->create($arr);
            return $this->response("Checklist has been added", $created, true);
        } catch (\Exception $e) {
            return $this->response("Record cannot update. Error: " . $e->getMessage(), null, false, 500);
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
