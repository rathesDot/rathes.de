@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto container mx-auto text-grey-darker">
        <div class="px-6 leading-normal max-w-md md:mt-16">
            <h1 class="text-purple-darker">{{ $meta['title'] }}</h1>
            {!! $content !!}
        </div>
    </main>
@endsection