<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = "animals";

    public function data()
    {
        return $this->hasMany(AnimalData::class);
    }

    public function getDataCount()
    {
        return $this->data()->count();
    }
}
