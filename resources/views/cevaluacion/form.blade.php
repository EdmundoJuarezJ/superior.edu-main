@extends('layouts.app')

@section('content')
<div class="container">
    <div id="vue-app">
        <cevaluacion-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        </cevaluacion-form-component>
    </div>
</div>
@endsection