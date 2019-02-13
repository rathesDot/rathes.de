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

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48222009-4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-48222009-4');
	</script>

	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>


</head>

<body>
	<div class="flex justify-between flex-col min-h-screen">
		@include('theme::rathes.nav')
		@yield('content')
		@include('theme::rathes.footer')
	</div>
    <script src="{{ asset('/js/app.js') }}"></script>
	@stack('javascript')
</body>

</html>