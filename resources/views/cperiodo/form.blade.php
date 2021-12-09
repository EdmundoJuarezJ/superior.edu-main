@extends('layouts.app')
@section('content')

    <div id="vue-app">
        <cperiodo-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        <cperiodo-form-component/>
    </div>
@endsection