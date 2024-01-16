<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "items" => "array"
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quotation) {
            $lastquotationId = self::max("id") + 1;
            $quotation_number = $lastquotationId < 1000 ? $lastquotationId + 1000 : $lastquotationId;
            $quotation->quotation_number = "QTN-" . $quotation_number;
            $quotation->date = date("Y-m-d H:i:s");
        });
    }

    /**
     * Get the company that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getDateAttribute($value){

        return date("d M y",strtotime($value));
    }
}
