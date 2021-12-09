@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cescalaeval-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cescalaeval-form-component/>
    </div>
@endsection