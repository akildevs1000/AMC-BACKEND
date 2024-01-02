<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDocument;
use Illuminate\Http\Request;

class InvoiceDocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $arr = [];

        foreach ($request->items as $key => $item) {

            $file = $item["attachment"];
            $ext = $file->getClientOriginalExtension();
            $fileName = $key . time() . '.' . $ext;
            $file->move(public_path('/invoice_documents'), $fileName);

            $arr[] = [
                "title" => $item["title"],
                "attachment" => $fileName,
                "date" => date("Y-m-d"),
                "invoice_id" => $id,
            ];
        }
        // InvoiceDocument::where("invoice_id",$id)->delete();
        try {
            return $this->response('Invoice Document successfully created.', InvoiceDocument::insert($arr), true);
        } catch (\Throwable $th) {
            return $this->response('Invoice Document successfully created.', null, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceDocument  $invoiceDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $InvoiceDocument = InvoiceDocument::find($id);

        try {
            if ($InvoiceDocument->delete()) {
                return $this->response('Document successfully deleted.', null, true);
            } else {
                return $this->response('Document cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
