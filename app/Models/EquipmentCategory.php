<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ["created_at", "updated_at"];

    public function headings()
    {
        return $this->hasMany(QuestionHeading::class)->with("questions");
    }

    public function equipment()
    {
        return $this->hasOne(Equipment::class);
    }


    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
