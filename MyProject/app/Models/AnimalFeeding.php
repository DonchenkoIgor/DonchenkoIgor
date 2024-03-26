<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalFeeding extends Model
{
    protected $table = "animal_feeding";

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }


    public function food()
    {
        return $this->belongsTo(AnimalFood::class);
    }
}
