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
    /**
     * Get the priority that owns the ServiceCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class,"prority_id");
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

    public function scopeFilters($query)
    {
        $query->when(request()->filled("title"), fn ($q) => $q->where('title', 'ILIKE', "%" . request("title") . "%"));

        $query->when(request()->filled("id"), fn ($q) => $q->where("id", request("id")));
        $query->when(request()->filled("prority"), fn ($q) => $q->where("prority", request("prority")));
        $query->when(request()->filled("status"), fn ($q) => $q->where("status", request("status")));
        $query->when(request()->filled("user_id"), fn ($q) => $q->where("user_id", request("user_id")));
        $query->when(request()->filled("company_id"), fn ($q) => $q->where("company_id", request("company_id")));

        // "ticket_open_date_time" => "nullable",
        // "ticket_close_date_time" => "nullable",

        return $query;
    }
}
