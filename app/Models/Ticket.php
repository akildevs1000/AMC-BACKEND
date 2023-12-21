<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(CompanyBranch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket_history()
    {
        return $this->hasMany(TicketHistory::class)->latest();
    }

    public static function processAttachment($attachment = null)
    {
        if ($attachment) {
            $ext = $attachment->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $attachment->move(public_path('/tickets'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function getAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('tickets/' . $value);
    }
}
