@extends ('layout')

@section ('tittle', 'List of animal\'s data')

@section ('content')
    <div class="container text-center">
        <div class="row mt-3 mb-3">
            <div class="col">
                Animal Name
            </div>
            <div class="col">
                data
            </div>
        </div>
        @foreach($animalData as $data)
            @include('components.animalDataRow', ['data' => $data, 'animal' => $animal])
        @endforeach
    </div>
@endsection
