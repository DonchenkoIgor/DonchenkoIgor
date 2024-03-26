@extends('layout')

@section('title', 'List of all employees')

@section ('content')
    <div class="container text-center">
        <div class="row mt-3 mb-3">
            <div class="col">
                Name
            </div>
            <div class="col">
                Position
            </div>
            <div class="col">
                Start date
            </div>
            <div class="col">
                Salary
            </div>
        </div>
        @foreach($employeesList as $emloyee)
            <div class="row mt-3 mb-3">
                <div class="col">
                    {{ $emloyee->name }}
                </div>
                <div class="col">
                    {{ $emloyee->position }}
                </div>
                <div class="col">
                    {{ $emloyee->start_date }}
                </div>
                <div class="col">
                    {{ $emloyee->salary }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
