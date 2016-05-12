@extends('layouts.master')


@section('navigation')
    <a href="/items">Return to Items</a><br>
    <a href="/locations">Return to Locations</a>

@stop

@section('content')
    <p class="subheading">Remove a location</p>
    <p><b> PLEASE READ!</b> Deleting a location will remove all items associated with that location. Please change the location of any item you wish to maintain BEFORE deleting it's location.</p>

    @if($items->count() > 0)
    In order to proceed, you must edit the following items to change their location or remove them from your item list. Please edit the items then return to remove this location. You may proceed with removing this location after all items have been removed.
      <table>
        @foreach($items as $item)
          <tr>
              <td>
                <ul>
                <li class="itemName">{{ $item->item_name }}</li>
                <li class="itemDescription">Description: {{ $item->item_description }}</li>
              </ul>
              </td>
              <td>
                <a href='/item/edit/{{ $item->id }}'>Edit</a></br>
              </td>
          </tr>
        @endforeach
      </table>
    @else
      <p>Are you sure you want to delete <em>{{$location->location_name}}</em>?</p>
      <p><a href='/location/delete/{{$location->id}}' id="deleteLocation">Yes, I am ready!</a></p>
      <a href="/locations"><b>NO! Cancel!</b></a>
    @endif



    <p>


@stop
