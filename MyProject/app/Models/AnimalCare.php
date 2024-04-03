<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalCare extends Model
{
    protected $table = "animal_care";

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
