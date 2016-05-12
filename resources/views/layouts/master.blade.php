<!doctype html>
<html>
<head>
    <title>
        Where's My Stuff? Home item tracker
    </title>

    <meta charset='utf-8'>
    <link href="/css/skeleton.css" type="text/css" rel="stylesheet">
    <link href="/css/view.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

      @if(Session::get('message') != null)
          <div class="message">
              {{ Session::get('message') }}
          </div>
      @endif

    <header>
      <div class="row">
        <div class="nine columns">
          <h1>Where's my stuff? Logo</h1>
        </div>
        <nav class="three columns">
          <ul class="nav">
            @if(Auth::check())
              <li><a href="/logout">Logout</a></li>
            @else
              <li><a href="/register">Register for FREE!</a></li>
              <li><a href="/login">Login</a></li>
            @endif
          </ul>
        </nav>
      </div>
    </header>

    <div class="row">
        <aside class="nine columns">
            @yield('content')
        </aside>

        <aside class="three columns">
            <article>
              @yield('sideContent')
            </article>
            <article>
              <ul class="nav">
                @if(Auth::check())
                  <li>@yield('navigation')</li>
                @endif
              </ul>
            </article>
        </aside>
    </div>

    <div class="row">
        <footer class="twelve columns">
            &copy; {{ date('Y') }} Gurinder Virdi  |  Note: This site is for entertainment purposes only. Your privacy is not protected on this site.
        </footer>
    </div>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
  </body>
</html>
