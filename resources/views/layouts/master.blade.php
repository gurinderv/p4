<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to "Hacker's Best Friend" --}}
        @yield('title', "Where did I put my stuff?!")
    </title>

    <meta charset='utf-8'>
    <link href="/css/view.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

    <style>
    body
        {

        }
    </style>

</head>
<body>
    <div>
      @if(Session::get('message') != null)
          {{ Session::get('message') }}
      @endif
    </div>

    <header>


        <h1>Where did I put my stuff inventory manager</h1>

        {{-- Variable subheading for each page --}}
        <h2>@yield('subheadline')</h2>
    </header>

    <nav>
      <ul>
        @if(Auth::check())
          <li><a href="/locations">View/Manage Your Locations</a></li>
          <li><a href="/logout">Logout</a></li>
        @else
          <li><a href="/register">Register for FREE!</a></li>
          <li><a href="/login">Login</a></li>
        @endif

      </ul>
    </nav>
    <section>
        {{-- Main page content will be yielded here --}}

        <p>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} Gurinder Virdi  |  Note: This site is for entertainment purposes only. Your privacy is not protected on this site.
    </footer>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')


   {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}


</body>
</html>
