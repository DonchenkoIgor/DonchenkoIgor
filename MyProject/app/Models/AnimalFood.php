<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalFood extends Model
{
    protected $fillable = ['name', 'brand', 'type', 'unit'];

    public function feedings()
    {
        return $this->hasMany(AnimalFeeding::class);
    }
}
