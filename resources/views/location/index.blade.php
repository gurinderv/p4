@extends('layouts.master')


@section('title')
    Where did I put my stuff?!
@stop

@section('head')
    <link href="/css/view.css" type='text/css' rel='stylesheet'>
@stop

@section('navigation')
  <a href="/items">Return to Items</a>
@stop

@section('content')

Location view

        <p>Below are your existing locations</p>

        <p class="returnResult">

          @foreach($locations as $location)
            {{ $location->location_name }}
            <a href='/location/edit/{{ $location->id }}'>Edit</a>
            <br>
          @endforeach

        </p>
<P>

        <div>
          <form method="post" action="/location/add">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <label>Add a new location (20 char max):</label>
          <input
            type="text"
            name="newLocation"
            alt="Name of a new location"
          >
          <p>

           @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

          <input type="submit" class="submit" value="Add Location">
        </form>
        </div>


@stop
