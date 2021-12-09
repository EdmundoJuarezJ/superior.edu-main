@extends('layouts.app')

@section('content')

    <div id="vue-app">
        <cplanestudio-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cplanestudio-form-component/>
    </div>
@endsection