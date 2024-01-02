<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "items" => "array"
    ];

    /**
     * Get all of the documents for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(InvoiceDocument::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $lastInvoiceId = self::max("id") + 1;
            $invoice_number = $lastInvoiceId < 1000 ? $lastInvoiceId + 1000 : $lastInvoiceId;
            $invoice->invoice_number = "INV-" . $invoice_number;
            $invoice->date = date("Y-m-d H:i:s");
        });
    }
}
