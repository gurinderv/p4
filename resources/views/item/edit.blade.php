@extends('layouts.master')


@section('title')
    Where did I put my stuff?!<br>
    Edit Item Name
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

Edit item

        <div>
          <form method="post" action="/item/edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name='id' value='{{ $item->id }}'>

          <label>Edit a item (20 char max):</label>
          <input
            type="text"
            name="item_name"
            alt="Name of a new item"
            value='{{ $item->item_name }}'
          >

          <label>Describe the item (20 char max):</label>
          <input
            type="text"
            name="item_description"
            alt="Describe the item"
            value='{{ $item->item_description }}'
          >

          <label for='location_id'>Where is the item located?2:</label>
          <select name='location_id' id='location_id'>
              @foreach($locations_for_dropdown as $location_id => $location_name)
                  <?php $selected = ($item->location_id == $location_id) ? 'SELECTED' : '' ?>
                  <option value='{{ $location_id }}' {{ $selected }}>{{ $location_name }}</option>
              @endforeach
          </select>
          <p>

           @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Save Changes">
        </form>
        </div>



@stop
