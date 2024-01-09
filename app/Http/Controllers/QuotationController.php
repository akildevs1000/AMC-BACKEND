<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quotation\StoreRequest;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLastQuotation()
    {
        $last = Quotation::orderBy("id", "desc")->first("id");
        $last->date = date("d M Y");
        return $last;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quotation::orderBy("id", "desc")
            ->with("company")
            ->paginate(request("per_page") ?? 10);
    }

    public function show(Quotation $Quotation)
    {
        return $Quotation->load("company");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return Quotation::create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Quotation $quotation)
    {
        return $quotation->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $response = $quotation->delete();

        try {
            if ($response) {
                return $this->response('Quotation successfully deleted.', null, true);
            } else {
                return $this->response('Quotation cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
