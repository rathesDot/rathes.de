<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Rathes Sachchithananthan — Web Designer & Web Developer</title>
        <meta name="description" content="I am a former freelancing Web Designer and Web Developer. Currently you can find me working at Aheenam,
                the agency I started to provide digital solutions for anyone. Get in touch with me using social media!" />

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />               
    </head>
    <body class="{{ isset($noFlex) && $noFlex === true ? 'no-flex' : '' }}">
        <main class="main">
            <div class="content">
                <a href="{{ url('/') }}" class="no-hover">
                    <img src="{{ asset('images/rathes.jpg') }}" alt="I am Rathes" title="I am Rathes" width="120px" height="120px" class="circle">
                </a>
                @yield('content')
            </div>
        </main>
        <footer class="footer">
            <a href="{{ url('/imprint') }}">Imprint</a>
        </footer>
    </body>
</html>
