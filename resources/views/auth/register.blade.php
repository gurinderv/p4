@extends('layouts.master')

@section('content')

    <p>Already have an account? <a href='/login'>Login here...</a></p>

    <p class="subheading">Register</p>
    Registration is simple. Simply input your name, email and a password to get started. All fields are required.<p>

    @if(count($errors) > 0)
        <ul class='errorMessage'>
            @foreach ($errors->all() as $error)
                <li> ! {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <fieldset class="fieldSet">
      <legend>Register</legend>
    <form method='POST' action='/register'>
        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' name='name' id='name' value='{{ old('name') }}'>
        </div>

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password'>
        </div>

        <div class='form-group'>
            <label for='password_confirmation'>Confirm Password</label>
            <input type='password' name='password_confirmation' id='password_confirmation'>
        </div>

        <button type='submit'>Register</button>

    </form>
  </fieldset>
@stop
