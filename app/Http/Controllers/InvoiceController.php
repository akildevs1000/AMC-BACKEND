<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Models\Invoice;
use App\Models\Quotation;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::orderBy("id", "desc")
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
        try {
            if (Invoice::create($request->validated())) {
                $quotation_id = $request->filled("quotation_id");
                if ($quotation_id) {
                    Quotation::where("id", $quotation_id)->update(["status" => "invoiced"]);
                }
                return $this->response('Invoice successfully created.', null, true);
            } else {
                return $this->response('Invoice cannot create.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $data = $request->validated();
        $response = $invoice->update($data);

        try {
            if ($response) {
                return $this->response('Invoice successfully updated.', null, true);
            } else {
                return $this->response('Invoice cannot update.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $response = $invoice->delete();

        try {
            if ($response) {
                return $this->response('Invoice successfully deleted.', null, true);
            } else {
                return $this->response('Invoice cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
