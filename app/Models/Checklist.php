<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ["checklist" => "array"];

    /**
     * Get the user that owns the Checklist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public static function processAttachment($item = null, $file_name)
    {
        if (array_key_exists("attachment", $item)) {
            $file = $item["attachment"];
            $ext = $file->getClientOriginalExtension();
            $fileName = $file_name . time() . '.' . $ext;
            $file->move(public_path('/checklist'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function getAttachmentAttribute($value)
    {
        if (!$value) return null;
        return asset('checklist/' . $value);
    }

    protected $hidden = ["status", "created_at", "updated_at"];
}
