@extends('layouts.app')

@section('content')
<div class="container">
    <div id="vue-app">
        <ccarrera-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        </ccarrera-form-component>
    </div>
</div>
@endsection