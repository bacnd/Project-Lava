<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravels') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/asset/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/asset/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('/asset/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('/asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/asset/css/style-responsive.css') }}" rel="stylesheet" />

</head>
<body class="lock-screen" onload="startTime()">
    <div class="lock-wrapper">
        <div id="time"></div>
        <div class="lock-box text-center">
            @if($errors->count())

                @foreach($errors->all() as $error)
                    <div class="errorMessage">
                        {{ $error }}
                    </div>
                @endforeach            

            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="lock-name form-group">
                    <input id="name" type="text" class="form-control lock-input" name="name" value="{{ old('name') }}" placeholder="username" required autofocus />
                </div>
                <img src="{{ asset('/asset/images/lock.jpg') }}" alt="lock avatar"/>
                <div class="lock-pwd form-group">
                    <input id="password" type="password" class="form-control lock-input" name="password" placeholder="password" required />
                    <button class="btn btn-lock" type="submit"> <i class="fa fa-arrow-right"></i> </button>
                </div>
            </form> 
        </div>
        
        
    </div>
    <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>
</body>
</html>