@extends('layouts.master')


@section('navigation')
    <a href="/items">Return to Items</a>
@stop

@section('content')
    <h1>Remove Item</h1>
    <p>Are you sure you want to delete <em>{{$item->item_name}}</em>?</p>
    <p><a href='/item/delete/{{$item->id}}'>Yes...</a></p>
    <a href="/items"><b>NO! Cancel!</b></a>
    <p>
@stop
