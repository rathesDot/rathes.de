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
	<meta name="description" content="{{ isset($meta['description']) ? $meta['description'] : '' }}"
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

	<link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

    @if($meta && isset($meta['locale']))
        <meta property="og:locale" content="{{ $meta['locale'] }}" />
    @endif
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $meta['title'] }} &mdash; rathes.de" />
    <meta property="og:description" content="{{ isset($meta['description']) ? $meta['description'] : '' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="rathes.de" />
    <meta property="article:author" content="https://www.facebook.com/rathes.de" />
    <meta property="article:section" content="{{ $meta['categories'][0] }}" />
    <meta property="article:published_time" content="{{ $meta['date'] }}" />
    <meta property="article:modified_time"
        content="{{ isset($meta['modified']) ? $meta['modified'] : $meta['date'] }}" />
    <meta property="og:updated_time" content="{{ $meta['date'] }}" />
    @if($meta && isset($meta['image']))
        <meta property="og:image" content="{{ $meta['image'] }}" />
        <meta property="og:image:secure_url" content="{{ $meta['image'] }}" />
        <meta name="twitter:image" content="{{ $meta['image'] }}" />
    @endif
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{ isset($meta['description']) ? $meta['description'] : '' }}" />
    <meta name="twitter:title" content="{{ $meta['title'] }} &mdash; rathes.de" />
    <meta name="twitter:site" content="@rswebdesginer" />
    <meta name="twitter:creator" content="@rswebdesigner" />

</head>

<body>
    @include('theme::rathes.nav')
    @yield('content')
	@include('theme::rathes.footer')
    <script src="{{ asset('/js/app.js') }}"></script>
	@stack('javascript')
</body>

</html>