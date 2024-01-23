<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['show_start_date', 'show_expire_date'];


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

    /**
     * Get the company that owns the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getShowStartDateAttribute(): string
    {
        return date('d M Y', strtotime($this->start_date));
    }

    public function getShowExpireDateAttribute(): string
    {
        return date('d M Y', strtotime($this->expire_date));
    }
}
