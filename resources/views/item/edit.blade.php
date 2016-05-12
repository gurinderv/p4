@extends('layouts.master')



@section('head')

@stop

@section('navigation')
  <a href="/locations">Manage Locations</a>
@stop

@section('content')

        <div>
          <fieldset class="fieldSet">
            <legend>Edit Item Details</legend>
          <form method="post" action="/item/edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name='id' value='{{ $item->id }}'>

          <label>Item Name (20 char max)*:</label>
          <input
            type="text"
            name="item_name"
            alt="Name of a new item"
            value='{{ $item->item_name }}'
          >

          <label>Item Description (20 char max)*:</label>
          <input
            type="text"
            name="item_description"
            alt="Describe the item"
            value='{{ $item->item_description }}'
          >

          <label for='location_id'>Item Location:</label>
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
                    <li class="errorMessage">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Save Changes">
        </form>
      </fieldset>
        </div>

@stop
