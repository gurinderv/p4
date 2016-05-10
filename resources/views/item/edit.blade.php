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
