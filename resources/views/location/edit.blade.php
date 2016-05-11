@extends('layouts.master')


@section('title')
    Where did I put my stuff?!<br>
    Edit Location Name
@stop

@section('head')
    <link href="/css/view.css" type='text/css' rel='stylesheet'>
@stop

@section('navigation')
  <a href="/locations">Manage Locations</a>
@stop

@section('content')
<div>
  @if(Session::get('message') != null)
      {{ Session::get('message') }}
  @endif
</div>

Edit Location

        <div>
          <form method="post" action="/location/edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name='id' value='{{ $location->id }}'>

          <label>Edit a location (20 char max):</label>
          <input
            type="text"
            name="location_name"
            alt="Name of a new location"
            value='{{ $location->location_name }}'
          >
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
