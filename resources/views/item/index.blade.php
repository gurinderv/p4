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
      <section>
        <ul>
          @foreach($items as $item)
            <li>
              <h2>{{ $item->item_name }}</h2>
              <h3>Location: {{ $item->location->location_name }} </h3>
              <p>Description: {{ $item->item_description }}</p>
              <br>
              <a href='/item/edit/{{ $item->id }}'>Edit</a>
              <br>
            </li>
          @endforeach
        </ul>
      </section>
        </p>

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
