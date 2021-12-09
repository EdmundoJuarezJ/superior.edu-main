@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cmotivobaja-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cmotivobaja-form-component/>
    </div>
@endsection