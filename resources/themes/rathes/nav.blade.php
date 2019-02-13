<div class="container mx-auto flex flex-wrap items-center px-6 pt-8 pb-4 justify-between md:content-end md:pt-16">
    <div class="w-1/3 flex-no-shrink">
        <a href="{{ url('/') }}" class="font-logo text-indigo text-lg font-bold no-underline inline-block">
            <svg class="w-16 h-16" viewBox="0 0 157 157" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M78.5 152c40.593 0 73.5-32.907 73.5-73.5S119.093 5 78.5 5 5 37.907 5 78.5 37.907 152 78.5 152zm0 5c43.354 0 78.5-35.146 78.5-78.5S121.854 0 78.5 0 0 35.146 0 78.5 35.146 157 78.5 157z" fill="#6574CD"/>
                <path d="M66.692 75.352H60v-28.84h6.692v28.84zM92.439 61.011c0-2.563-.668-4.843-2.003-6.84-1.305-2.016-3.505-4.202-6.6-6.555L87.977 45c3.854 2.29 6.767 4.717 8.74 7.28 2.003 2.543 3.004 5.453 3.004 8.731 0 3.278-1.001 6.199-3.004 8.762-1.973 2.543-4.886 4.959-8.74 7.25l-4.142-2.617c2.215-1.68 3.93-3.194 5.143-4.538 1.245-1.366 2.125-2.742 2.64-4.13.547-1.386.82-2.962.82-4.727zM66.692 112.779H60V83.94h6.692v28.839zM83.927 83.72L103 111.203 97.4 113 78.328 85.516l5.6-1.796z" fill="#6574CD"/>
            </svg>
        </a>
    </div>
    <div class="block md:hidden">
        <button class="js-toggle flex items-center px-2 py-2 text-indigo">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <nav class="w-full hidden text-center bg-indigo-lightest rounded mt-4 js-menu md:bg-transparent md:w-auto md:mt-0">
        <a class="menu-link" href="/about">About</a>
        <a class="menu-link" href="/now">Now</a>
        <a class="menu-link" href="/writings">Writings</a>
        <a class="menu-link" href="/talks">Talks</a>
    </nav>
</div>