<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Technician extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function serviceCalls()
    {
        return $this->belongsToMany(ServiceCall::class)->with(["contract", "priority"])->withPivot('schedule_date');
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class)->with(["company","priority"])->withPivot('schedule_date');
    }
}
