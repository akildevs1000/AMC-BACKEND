<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function processAttachment($attachment = null)
    {
        if ($attachment) {
            $ext = $attachment->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $attachment->move(public_path('/contracts'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function getAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('contracts/' . $value);
    }

    public function amc_type()
    {
        return $this->belongsTo(AMCType::class);
    }

    public function visit_type()
    {
        return $this->belongsTo(VisitType::class);
    }

    public function service_call_type()
    {
        return $this->belongsTo(ServiceCallType::class);
    }
}
