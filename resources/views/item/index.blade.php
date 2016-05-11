@extends('layouts.master')


@section('title')
    Where did I put my stuff?!
@stop

@section('head')
    <link href="/css/view.css" type='text/css' rel='stylesheet'>
@stop

@section('navigation')
  <a href="/locations">Manage Locations</a>
@stop

@section('content')

    @if(sizeof($items) == 0)
        You have no items in your list, you can add an item below to get started.
    @else
      Item view

        <p>Below are your existing items</p>

        <p class="returnResult">
      <section>
        <ul>
          @foreach($items as $item)
            <li>
              <h2>{{ $item->item_name }}</h2>
              <h3>Location: {{ $item->location->location_name }} </h3>
              <p>Description: {{ $item->item_description }}</p>
              <br>
              <a href='/item/edit/{{ $item->id }}'>Edit</a>
              <a href='/item/confirm-delete/{{ $item->id}}'>Remove Item</a><br>
              <br>
            </li>
          @endforeach
        </ul>
      </section>
        </p>
    @endif
      <section>
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

          <label for='location_id'>Where is the item located?2:</label>
          <select name='location_id' id='location_id'>
              @foreach($locations_for_dropdown as $location_id => $location_name)
                  <option value='{{ $location_id }}'>{{ $location_name }}</option>
              @endforeach
          </select>

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
      </section>

@stop
