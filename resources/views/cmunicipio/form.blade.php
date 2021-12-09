@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cmunicipio-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cmunicipio-form-component/>
    </div>
@endsection