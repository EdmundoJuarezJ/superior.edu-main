@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <casignatura-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <casignatura-form-component/>
    </div>
@endsection