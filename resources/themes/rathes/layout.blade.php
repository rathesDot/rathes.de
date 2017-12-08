<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		@if(isset($meta['title']))
			{{ $meta['title'] }} &mdash; Rathes Sachchithananthan
		@else
			Rathes Sachchithananthan — Web Designer & Web Developer
		@endif
	</title>
	<meta name="description" content="I am a former freelancing Web Designer and Web Developer. Currently you can find me working at Aheenam,
                the agency I started to provide digital solutions for anyone. Get in touch with me using social media!"
	/>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head>

<body>
    @include('theme::rathes.nav')
    @yield('content')
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>