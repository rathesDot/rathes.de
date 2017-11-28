@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal bg-grey-lightest overflow-auto">
        <div class="container mx-auto p-6 leading-loose md:px-16 md:text-xl">
            <div class="max-w-md md:my-32">
                {!! $content !!}
            </div>
        </div>
    </main>
    <div class="p-6 leading-normal leading-loose bg-indigo-darker text-indigo-lightest md:p-16 lg:p-32">
        <div class="container mx-auto p-6 leading-loose md:px-16">
            <h2 class="mt-4 mb-2">My writings</h2>
            <p class="mb-2 lg:max-w-md">
                Time to time, I do write. Sometimes on Medium, but mostly on my own Blog. I do write
                in English, German &amp; my mother tongue Tamil.
            </p>
            <p class="mb-2">
                I do not only write about tech related stuff, but about nearly everything I'm interested in.
            </p>
            <h3 class="mb-2 mt-4">Some of my latest writings:</h3>
            <ul class="list-reset mb-2 mt-4">
                <li><a class="text-indigo-lighter font-light text-xl border-0 mb-4" href="#">Looking forward to 2018</a></li>
                <li><a class="text-indigo-lighter font-light text-xl border-0 mb-4" href="#">Einstieg in Vue mit Vuex</a></li>
                <li><a class="text-indigo-lighter font-light text-xl border-0 mb-4" href="#">Einsatz von JSON Web Token für die Authentifikation in Webanwendungen</a></li>
            </ul>
            <a class="inline-block mt-8 text-indigo border border-indigo rounded py-2 px-4" href="/blog">See all my writings</a>
        </div>
    </div>
@endsection