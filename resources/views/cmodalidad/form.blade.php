@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cmodalidad-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cmodalidad-form-component/>
    </div>
@endsection