@extends('layouts.master')


@section('title')
    Where did I put my stuff?!
@stop

@section('head')
    <link href="/css/view.css" type='text/css' rel='stylesheet'>
@stop

@section('subheadline')

@stop

@section('content')
Welcome to your personal inventory tracker.<p>

    <a href="/byitem">Show items and their location</a><p>
    <a href="/locations">Manage your locations</a><p>
    <a href="/items">Manage your items</a>


@stop
