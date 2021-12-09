@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <centidad-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <centidad-form-component/>
    </div>
@endsection