<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('/asset/images/logo.jpg') }}">
    
    <!--Core CSS -->
    <link href="{{ url('/asset/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/asset/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/asset/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!--dynamic table-->
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/css/bootstrap-switch.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/data-tables/DT_bootstrap.css') }}" />
    
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/bootstrap-datepicker/css/datepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/bootstrap-datetimepicker/css/datetimepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/select2/select2.css') }}" />
    
    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/morris-chart/morris.css') }}" />

    <title>@yield('title')</title>
    <!-- Custom styles for this template -->
    <link href="{{ url('/asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/asset/css/style-responsive.css') }}" rel="stylesheet" />
</head>
<body>
<section id="container" >

    @include('layouts.header')

    @include('layouts.sidebar')

    <section id="main-content">
        <section class="wrapper">
            
            @yield('content')

        </section>
    </section>
	
	<div class="right-sidebar">
		<div class="search-row">
		    <input type="text" placeholder="Search" class="form-control">
		</div>
	</div>
</section>

<footer><<!-->Đây là footer</!--></footer>

<!--Core js-->
<script type="text/javascript" src="{{ url('/asset/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/bs3/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/jquery.scrollTo.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/jquery.nicescroll.js') }}"></script>

<!--common script init for all pages-->
<script type="text/javascript" src="{{ url('/asset/js/scripts.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/common.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/bootstrap-switch.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
<script type="text/javascript" src="{{ url('/asset/js/advanced-form.js') }}"></script>
<script type="text/javascript">
/*<![CDATA[*/
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.thumb_img').attr('src', e.target.result);
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#NhanvienAvatar').change(function() {
            readURL(this);
        });
/*]]>*/
</script>
</body>
</html>
