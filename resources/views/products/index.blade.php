@extends('_layouts.main')

@section('heading')
    Products
@endsection

@section('content')
    <div id="app">
        <router-view></router-view>
        <!--<products-index></products-index>-->
    </div>
@endsection