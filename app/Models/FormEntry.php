<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    /**
     * The checklists that belong to the FormEntry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function checklist()
    {
        return $this->hasOne(Checklist::class)->with("question");
    }

    public function amc()
    {
        return $this->belongsTo(ServiceCall::class, "work_id")->with([
            "contract" => fn ($q) =>
            $q->with([
                "company" => fn ($q) => $q->with(["trade_license", "contact"])
            ])
        ]);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, "work_id")
            ->with([
                "company" => fn ($q) => $q->with(["trade_license", "contract", "contact"])
            ]);
    }


    public function equipment_category()
    {
        return $this->belongsTo(EquipmentCategory::class)->with("equipment");
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quotation) {
            $quotation->date = now();
        });
    }

    public static function processAttachment($attachment = null, $folder = 'attachments')
    {
        if ($attachment) {
            $ext = $attachment->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $attachment->move(public_path('/' . $folder), $fileName);
            return $fileName;
        }
        return null;
    }

    public function getBeforeAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('before_attachment/' . $value);
    }

    public function getAfterAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('after_attachment/' . $value);
    }

    public function getSignAttribute($value)
    {
        if (!$value) return null;
        // return "https://amcbackend.mytime2cloud.com/sign/" . $value;
        return asset('sign/' . $value);
    }

    public function getCustomerSignAttribute($value)
    {
        if (!$value) return null;
        // return "https://amcbackend.mytime2cloud.com/sign/" . $value;
        return asset('customer_sign/' . $value);
    }

    public function getDateAttribute($value)
    {
        return date("d M Y", strtotime($value));
    }
}
