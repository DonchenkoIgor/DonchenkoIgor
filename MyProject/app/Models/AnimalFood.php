<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalFood extends Model
{
    protected $table="animal_food";

    public function data()
    {
        return $this->hasMany(AnimalFood::class);
    }
}
