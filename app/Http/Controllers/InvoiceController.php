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
    public function getLastInvoice()
    {
        $last = Invoice::orderBy("id", "desc")->first("id");
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
        return Invoice::orderBy("id", "desc")
            ->when(request()->filled("company_id"), fn ($q)  => $q->where("company_id", request("company_id")))
            ->with(["documents", "company"])
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
            $created = Invoice::create($request->validated());
            $update = null;
            if ($created) {
                $quotation_id = $request->quotation_id;
                if ($quotation_id) {
                    $update = Quotation::where("id", $quotation_id)->update(["status" => "invoiced"]);
                }
                return $this->response('Invoice successfully created.', $update, true);
            } else {
                return $this->response('Invoice cannot create.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Invoice $Invoice)
    {
        return $Invoice->load("company");
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
