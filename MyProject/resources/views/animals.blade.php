@extends('layout')

@section('title', 'List of all animals')

@section ('content')
    <div class="container text-center">
        <div class="row mt-3 mb-3">
            <div class="col">
                Name
            </div>
            <div class="col">
                Age
            </div>
            <div class="col">
                Species
            </div>
        </div>
        @foreach($animalList as $animal)
            <div class="row mt-3 mb-3">
                <div class="col">
                    {{ $animal->name }}
                </div>
                <div class="col">
                    {{ $animal->age }}
                </div>
                <div class="col">
                    {{ $animal->species }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
