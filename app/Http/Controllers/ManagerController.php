<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropDown()
    {
        return Manager::where("company_id", request("company_id"))->get();
    }

    public function index()
    {
        return Manager::where("company_id", request("company_id"))->paginate(request("per_page") ?? 10);
    }

    public function store(Request $request)
    {
        $model = Manager::query();

        $model->where("company_id", $request->company_id ?? 0);

        $model->delete();

        $response = $model->insert($request->json);

        try {
            if ($response) {
                return $this->response('Manager(s) has been added .', $response, true);
            } else {
                return $this->response('Manager(s) cannot add.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
