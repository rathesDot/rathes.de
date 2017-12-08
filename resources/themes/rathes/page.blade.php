@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto">
        <div class="container mx-auto px-6 leading-loose max-w-md md:mt-16">
            {!! $content !!}
        </div>
    </main>
@endsection