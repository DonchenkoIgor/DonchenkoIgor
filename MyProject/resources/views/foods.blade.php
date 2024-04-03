@extends('layout')

@section('title', 'List of all food')

@section ('content')
    <div class="container text-center">
        <div class="row mt-3 mb-3">
            <div class="col">
                Name
            </div>
            <div class="col">
                Brand
            </div>
            <div class="col">
                Type
            </div>
            <div class="col">
                Unit
            </div>
        </div>
        @foreach($foodList as $food)
            <div class="row mt-3 mb-3">
                <div class="col">
                    {{ $food->name }}
                </div>
                <div class="col">
                    {{ $food->brand }}
                </div>
                <div class="col">
                    {{ $food->type }}
                </div>
                <div class="col">
                    {{ $food->unit }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
