<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
    <script type="text/javascript">
        (function($) { // Begin jQuery
          $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
              $(this).siblings('.nav-dropdown').toggle();
              // Close one dropdown when selecting another
              $('.nav-dropdown').not($(this).siblings()).hide();
              e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
              $('.nav-dropdown').hide();
            });
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
              $('nav ul').slideToggle();
            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
              this.classList.toggle('active');
            });
          }); // end DOM ready
        })(jQuery); // end jQuery
    </script> 
    <style>
      body{
        
      }
      p{
        font-size: 17px !important;
      }
      body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
      .fs{
        padding-top: 20px;
      }
      @media only screen and (max-width: 600px) {
        p{
          font-size: 15px !important;
        }
        h1,h2,h3,h4,h5,h6{
          font-size: 18px !important;
        }
        .fs{
          padding-top: 0px !important;
        }
      }
      #searchMenu {
    position: relative;
}

#searchMenu:hover .search-dropdown  {
    display: block;
}

.search-dropdown {
    position: absolute;
    width: 300px;
    background: #fff;
    border: 1px solid #eaeaea;
    padding: 16px;
    right: 0;
    box-shadow: 0 9px 12px -10px #989898;
    border-radius: 1px;
    display: none;
    z-index: 99999;
}

.search-dropdown label {
    font-size: 0.96rem;
}

.search-dropdown form:not(:first-child) {
    display: none;
}





.subscribe-box {
    border: 1px solid #eaeaea;
    padding: 15px;
    margin: 5px;
}
    </style>
</head>
<body>
    <div id="app">
        <div>
            @include('inc.navbar')
            @include('inc.messages')
            @yield('content')
                @include('inc.footer')
           
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    let e = document.getElementById("filter");

    let toggleForms = function() {
        let option = e.options[e.selectedIndex];
        let attr = option.getAttribute("data-search");

        document.getElementById("sba").style.display = "none";
        document.getElementById("sbw").style.display = "none";

        document.getElementById(attr).style.display = "block";
    }

    e.addEventListener('change', toggleForms);

    toggleForms();
</script>
</body>
</html>
