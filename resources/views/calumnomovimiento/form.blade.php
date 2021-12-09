@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <calumnomovimiento-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <calumnomovimiento-form-component/>
    </div>
@endsection