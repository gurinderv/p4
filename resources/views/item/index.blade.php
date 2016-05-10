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
<div>
  @if(Session::get('message') != null)
      {{ Session::get('message') }}
  @endif
</div>

Item view

        <p>Below are your existing items</p>

        <p class="returnResult">

          @foreach($items as $item)
            {{ $item->item_name }}
            <a href='/item/edit/{{ $item->id }}'>Edit</a>
            <br>
          @endforeach

        </p>
<P>

        <div>
          <form method="post" action="/item/add">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <label>Add a new item (20 char max):</label>
          <input
            type="text"
            name="newItem"
            alt="Name of a new item"
          >
          <p>
          <label>Describe the item (20 char max):</label>
          <input
            type="text"
            name="newItemDescription"
            alt="Describe the item"
          >

           @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Add Item">
        </form>
        </div>


@stop
