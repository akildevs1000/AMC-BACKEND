<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DocumentInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function getAttachmentAttribute($value)
    // {
    //     if (!$value) {
    //         return null;
    //     }
    //     return asset('documents/' . $this->employee_id . "/" . $value);
    // }




    protected $casts = [
        'created_at' => 'datetime:d-M-y',
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
}
