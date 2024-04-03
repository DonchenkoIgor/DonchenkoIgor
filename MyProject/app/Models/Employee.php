<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'position', 'start_date', 'salary'];

    public function cares()
    {
        return $this->hasMany(AnimalCare::class);
    }
}
