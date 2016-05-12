@extends('layouts.master')


@section('head')
@stop

@section('navigation')
  <a href="/locations">Manage Locations</a>
@stop

@section('content')

    @if(sizeof($items) == 0)
        <p class="subheading">You have no items in your list, you can add an item below to get started.</p>
    @else
        <p class="subheading">Below are your existing items</p>

        <p class="returnResult">
      <section>

        <table>
        @foreach($items as $item)
          <tr>
              <td>
                <ul>
                <li class="itemName">{{ $item->item_name }}</li>
                <li class="itemDescription">Description: {{ $item->item_description }}</li>
                <li class="itemLocation">Location: {{ $item->location->location_name }} </li>
              </ul>
              </td>
              <td>
                <a href='/item/edit/{{ $item->id }}'>Edit</a></br>
                <a href='/item/confirm-delete/{{ $item->id}}'>Remove Item</a>
              </td>
          </tr>
        @endforeach
      </table>
      </section>
        </p>
    @endif
@stop
@section('sideContent')
      <section>
        <div>
          <fieldset class="fieldSet">
            <legend class="legendTitle">Add a New Item</legend>
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
                    <li class="errorMessage">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Add Item">
        </fieldset>
        </form>

        </div>
      </section>
@stop
