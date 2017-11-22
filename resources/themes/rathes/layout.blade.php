<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Rathes Sachchithananthan — Web Designer & Web Developer</title>
	<meta name="description" content="I am a former freelancing Web Designer and Web Developer. Currently you can find me working at Aheenam,
                the agency I started to provide digital solutions for anyone. Get in touch with me using social media!"
	/>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head>

<body>
	<div class="flex flex-wrap items-center p-6 justify-between bg-indigo md:px-16 md:bg-grey-lightest md:content-end">
        <div class="w-1/3 flex-no-shrink">
            <img src="{{ asset('images/rathes.jpg') }}" alt="I am Rathes" title="I am Rathes"
                class="rounded-full w-auto h-10 md:h-16">
        </div>
        <div class="block md:hidden">
            <button class="js-toggle flex items-center px-2 py-2 border rounded text-white border-white">
                <svg class="h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <nav class="w-full mt-4 js-menu md:w-auto md:mt-0">
            <a class="menu-link" href="/resume">Resume</a>
            <a class="menu-link" href="/about">About</a>
            <a class="menu-link" href="/work">Work</a>
            <a class="menu-link" href="/blog">Blog</a>
        </nav>
	</div>
    @yield('content')
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>