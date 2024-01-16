<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The technician that belong to the FormEntry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    /**
     * The checklists that belong to the FormEntry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class)->with("question");
    }

    public function amc()
    {
        return $this->belongsTo(ServiceCall::class, "work_id")->with("contract");
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, "work_id")->with("company");
    }


    public function equipment_category()
    {
        return $this->belongsTo(EquipmentCategory::class);
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
}
