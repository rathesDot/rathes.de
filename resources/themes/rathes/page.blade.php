@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto">
        <div class="container mx-auto px-6 leading-normal
            md:mt-16 md:px-16">
            <h1>{{ $meta['title'] }}</h1>
            {!! $content !!}
        </div>
    </main>
@endsection