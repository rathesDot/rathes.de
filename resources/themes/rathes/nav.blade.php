<div>
	<div class="container mx-auto flex flex-wrap items-center p-6 justify-between  md:px-16 md:content-end">
        <div class="w-1/3 flex-no-shrink">
            <a href="{{ url('/') }}" class="font-logo text-indigo font-bold no-underline inline-block
                md:text-lg">
                |) <br>
                |\
            </a>
        </div>
        <div class="block md:hidden">
            <button class="js-toggle flex items-center px-2 py-2 border rounded text-indigo border-indigo">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <nav class="w-full text-center bg-indigo-lightest rounded mt-4 js-menu md:bg-transparent md:w-auto md:mt-0">
            <a class="menu-link" href="/about">About</a>
            <a class="menu-link" href="/now">Now</a>
            <a class="menu-link" href="/writings">Writings</a>
            <a class="menu-link" href="/talks">Talks</a>
        </nav>
	</div>
</div>