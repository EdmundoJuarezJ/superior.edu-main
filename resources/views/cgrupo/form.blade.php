@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cgrupo-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cgrupo-form-component/>
    </div>
@endsection