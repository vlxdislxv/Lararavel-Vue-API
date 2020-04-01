@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <router-view name="placesIndex"></router-view>
        <router-view></router-view>
    </div>
@endsection
