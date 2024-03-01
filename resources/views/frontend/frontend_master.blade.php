<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> @yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/assets/css/slider.css">
		<!-- fontawsome css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/brands.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/solid.min.css">

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />

	<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

	<!-- pagination css -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/pagination.css" />

</head>
<body>

<div class="section">
	<div class="container">
		<div class="wrapper">

			<div class="header-area">
				@include('frontend.body.top_header')




				@include('frontend.body.menu')
			</div>



{{-- main content  --}}
@yield('content')
{{-- main content end --}}



 {{-- footer start --}}
@include('frontend.body.footer')





  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/slider.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/pagination.js"></script>

  <!-- fontawssome js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/brands.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/fontawesome.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/regular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/solid.min.js"></script>

  <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/navbar.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/bootstrapNavbar.js"></script>


  <!-- pagination js -->
  <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->
  <script src="{{ asset('/') }}frontend/assets/js/pagination1.js"></script>



  <script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
      $('#myTable').DataTable();
  } );
  </script>

  <!-- <script type="text/javascript" src="https://skillbasedit.com/demoschool/public/frontend/js/jquery.nivo.slider.js"></script> -->

  <script type="text/javascript">

      $(document).ready(function() {

        $("#slider1").sliderResponsive({
    // Using default everything
      // slidePause: 5000,
      // fadeSpeed: 800,
      // autoPlay: "on",
      // showArrows: "off",
      // hideDots: "off",
      // hoverZoom: "on",
      // titleBarTop: "off"
    });

        $("#slider2").sliderResponsive({
          fadeSpeed: 300,
          autoPlay: "off",
          showArrows: "on",
          hideDots: "on"
        });

        $("#slider3").sliderResponsive({
          hoverZoom: "off",
          hideDots: "on"
        });

      });
    </script>

   <!--  <script type="text/javascript">

        $(".dropdown-menu").on('mouseover',function(e){
            $('.nav-link.dropdown-toggle').addClass("active");
        });

    </script>

    <script type="text/javascript">

        $(".dropdown-menu").on('mouseout',function(e){
            $('.nav-link.dropdown-toggle').removeClass("active");
        });

    </script> -->



  </body>
  </html>
 {{-- footer end --}}
