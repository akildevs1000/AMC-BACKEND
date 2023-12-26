<?php

namespace App\Http\Controllers;

use App\Http\Requests\Priority\StoreRequest;
use App\Http\Requests\Priority\UpdateRequest;
use App\Models\Priority;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Priority::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = Priority::create($request->validated());

        try {
            if ($response) {
                return $this->response('Priority successfully created.', null, true);
            } else {
                return $this->response('Priority cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Priority cannot create.', null, false);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(Priority $priority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Priority $priority)
    {
        $response = $priority->update($request->validated());
        try {
            if ($response) {
                return $this->response('Priority successfully updated.', null, true);
            } else {
                return $this->response('Priority cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Priority cannot update.', null, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        try {
            if ($priority->delete()) {
                return $this->response('Priority successfully deleted.', null, true);
            } else {
                return $this->response('Priority cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Priority cannot delete.', null, false);
        }
    }
}
