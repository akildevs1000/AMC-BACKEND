<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "company_id" => "int"
    ];

    public function getAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('company_documents/' . $value);
    }
}
