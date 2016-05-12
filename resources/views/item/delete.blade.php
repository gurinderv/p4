@extends('layouts.master')


@section('navigation')
    <a href="/items">Return to Items</a>
@stop

@section('content')
    <p class="subheading">Remove Item</p>
    <p>Are you sure you want to delete <em>{{$item->item_name}}</em>?</p>
    <p><a href='/item/delete/{{$item->id}}'>Yes I would like to delete this item.</a></p>
    <a href="/items"><b>NO! Cancel!</b></a>
    <p>
@stop
