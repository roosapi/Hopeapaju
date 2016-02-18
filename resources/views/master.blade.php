<!DOCTYPE html>
<html>
<head>
  <title>Hopeapajun Kartano</title>
  <meta http-equiv="content-type" content="text/html; charset=utf8" />
  <link href="{{ asset('css/general.css') }}" type="text/css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <!-- font styles -->
  <link href="{{ asset('css/fonts/stylesheet.css') }}" type="text/css" rel="stylesheet" />

  <!-- formstone -->
  <script src="{{ asset('js/core.js') }}"></script>
  <link href="{{ asset('css/grid/grid.css') }}" type="text/css" rel="stylesheet" />


</head>
<body class="fs-grid">
  <header>
    <nav id="navi">
      <ul>
        <li id="logo"><a href="{{ url('') }}" class="main">Hopeapajun <span class="pink">Kartano</span></a></li>
        <li><a href="{{ url('puoliveriset')}}">Puoliveriset</a></li>
        <li><a href="/suomenhevoset">Suomenhevoset</a></li>
        <li><a href="/kasvatus">Kasvatus</a></li>
        <li><a href="mailto:virtuaali@illuusion.net">Sähköposti</a></li>
      </ul>
    </nav>

    <div id="head_imgs">
      <img src="{{ asset('img/4.jpeg') }}" alt="" title="&copy; SPreischlPhotography / by-sa" class="header_img" />
      <img src="{{ asset('img/6.jpeg') }}" alt="" title="&copy; President Dressage Stables" class="header_img" />
      <img src="{{ asset('img/7.jpeg') }}" alt="" title="&copy; SL" class="header_img" />
      <img src="{{ asset('img/2.jpeg') }}" alt="" title="&copy; infomatique / by-sa" class="header_img" />
      <img src="{{ asset('img/8.jpeg') }}" alt="" title="&copy; Stutteri Firford" class="header_img" />
    </div>
  </header>

  <main>

    <div id="content">
      @yield('content')
    </div>

  </main>
  <footer>
  &copy; Hopeapajun Kartano 2009-2016<br />
  virtuaalitalli | a sim-game stable</footer>

  <script type="text/javascript">
  $(window).on("scroll touchmove", function () {
    $('#navi').toggleClass('minimal', $(document).scrollTop() > 0);
  });
  </script>
  @yield('footer')

</body>
</html>
