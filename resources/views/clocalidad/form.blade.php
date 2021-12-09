@extends('layouts.app')

@section('content')
<div class="container">
    <div id="vue-app">
        <clocalidad-form-component
            scope="{{ $scope }}"
            :id="{{ $id ?? 0 }}"
        >

        </clocalidad-form-component>
    </div>
</div>
@endsection