<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalCare extends Model
{
    protected $fillable = ['animal_id', 'employee_id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
