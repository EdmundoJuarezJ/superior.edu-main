@extends('layouts.app')

@section('content')
<div class="container">
    <div id="vue-app">
        <cmovimiento-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        </cmovimiento-form-component>
    </div>
</div>
@endsection