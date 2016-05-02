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

  <!-- lightbox stuff -->
   <link href="{{ asset('css/lightbox.css') }}" type="text/css" rel="stylesheet" media="screen" />
   <script src="{{ asset('js/lightbox.js') }}" type="text/javascript" ></script>


</head>
<body>
  <header class="inv">
    <nav id="navi" class="minimal">
      <ul>
        <li id="logo"><a href="{{ url('') }}" class="main">Hopeapajun <span class="pink">Kartano</span></a></li>
        <li><a href="{{ url('puoliveriset') }}">Puoliveriset</a></li>
        <li><a href="{{ url('suomenhevoset') }}">Suomenhevoset</a></li>
        <li><a href="{{ url('kasvatus') }}">Kasvatus</a></li>
        <li><a href="mailto:virtuaali@illuusion.net">Sähköposti</a></li>
      </ul>
    </nav>
  </header>

  <main class="h_page">

    <div id="content">
      @yield('content')
    </div>

  </main>
  <footer>
  &copy; Hopeapajun Kartano 2009-2016<br />
  virtuaalitalli | a sim-game stable</footer>

  <script>

  //Lightbox
  $(document).ready(function() {
  	$('.popup-gallery').magnificPopup({
  		delegate: 'a',
  		type: 'image',
  		tLoading: 'Loading image #%curr%...',
  		mainClass: 'mfp-img-mobile',
  		gallery: {
  			enabled: true,
  			navigateByImgClick: true,
  			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  		},
  		image: {
  			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
  			titleSrc: function(item) {
  				return item.el.attr('title');
  			}
  		}
  	});
  });

  //Tabs
  $(document).ready(function() {
    $('#tabs li span:not(:first)').addClass('inactive');
    $('.tabc').hide();
    $('.tabc:first').show();

    $('#tabs li span').click(function(){
        var t = $(this).attr('class').replace(" inactive", "");
        console.log(t);
        if($(this).hasClass('inactive')){ //this is the start of our condition
          $('#tabs li span').addClass('inactive');
          $(this).removeClass('inactive');

          $('.tabc').hide();
          $('#' + t).fadeIn(300);
        }
    });
  });


  </script>



</body>
</html>
