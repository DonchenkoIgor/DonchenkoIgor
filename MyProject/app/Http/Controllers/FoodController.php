<?php

namespace App\Http\Controllers;

use App\Models\AnimalFood;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function showAll(Request $request)
    {
        $foods = AnimalFood::all();
        return view('foods', ['foodList' => $foods, 'flag' => 'Hey']);
    }
}
