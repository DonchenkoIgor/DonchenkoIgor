<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function showAll(Request $request)
    {
        $animals = Animal::all();
        return view('animals', ['animalList' => $animals, 'flag' => 'Hey']);
    }

    public function showAnimalsData(Request $request, Animal $animal)
    {
        $animalData = $animal->data();

        return view(
            'animalData',
            ['animal' => $animal,
            'animalData' => $animalData]
        );
    }

    public function animalAction(Request $request, int $animal_id)
    {
        try {
            $model = Animal::findOrFail($animal_id);
            return response()->json($model, 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Animal not found'], 404);
        }
    }
}
