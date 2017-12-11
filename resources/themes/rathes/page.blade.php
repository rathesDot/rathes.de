@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto container mx-auto">
        <div class="px-6 leading-normal max-w-lg md:mt-16 md:px-16">
            <h1>{{ $meta['title'] }}</h1>
            {!! $content !!}
        </div>
    </main>
@endsection