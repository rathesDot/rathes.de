<!doctype html>
@if($meta && isset($meta['locale']))
<html lang="{{ explode('_', $meta['locale'])[0] }}">
@else
<html lang="{{ app()->getLocale() }}">
@endif
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

	<link href="{{ asset('/css/double-ch.css') }}" rel="stylesheet" />

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
    @if(!isset($meta['is_list']) || !$meta['is_list'])
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $meta['title'] }} &mdash; rathes.de" />
        <meta property="og:description" content="{{ isset($meta['description']) ? $meta['description'] : '' }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="rathes.de" />
        <meta property="article:author" content="https://www.facebook.com/rathes.de" />
        <meta property="article:section" content="With Double CH" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="{{ isset($meta['description']) ? $meta['description'] : '' }}" />
        <meta name="twitter:title" content="{{ $meta['title'] }} &mdash; rathes.de" />
        <meta name="twitter:site" content="@rswebdesginer" />
        <meta name="twitter:creator" content="@rswebdesigner" />
    @endif

</head>

<body>
    @yield('content')
	@include('theme::rathes.double-ch.footer')
	@stack('javascript')
</body>

</html>