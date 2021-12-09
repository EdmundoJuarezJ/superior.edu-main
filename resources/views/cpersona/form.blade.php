@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cpersona-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cpersona-form-component/>
    </div>
@endsection