@extends('layouts.master')



@section('head')

@stop

@section('navigation')
  <a href="/items">Return to Items</a>
@stop

@section('content')

        <p class="subheading">Below are your existing locations.</p>

        <table>
          @foreach($locations as $location)
            <tr>
              <td>
                {{ $location->location_name }}
              </td>
              <td>
                <a href='/location/edit/{{ $location->id }}'>Edit</a><br>
                <a href='/location/confirm-delete/{{ $location->id}}'>Remove</a>
              </td>
            <tr>
          @endforeach
        </table>
<P>

        <div>
          <fieldset class="fieldSet">
            <legend>Add a New Location</legend>
          <form method="post" action="/location/add">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <label>Location Name (20 char max):</label>
          <input
            type="text"
            name="newLocation"
            alt="Name of a new location"
          >
          <p>

           @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="errorMessage">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Add Location">
        </form>
      </fieldset>
        </div>


@stop
