<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCall extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the ServiceCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo(Contract::class)->with("company");
    }

    /**
     * Get the priority that owns the ServiceCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class, "prority_id");
    }

    public function technicians()
    {
        return $this->belongsToMany(Technician::class)->withPivot('schedule_date');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($serviceCall) {
            $serviceCall->status = "pending";
            $serviceCall->date = now();
        });
    }

    public function getScheduleStartDateAttribute($value)
    {
        return date("M", strtotime($value));
    }
}
