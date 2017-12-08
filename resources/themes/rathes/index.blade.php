@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto">
        <div class="container mx-auto px-6 leading-loose
            md:px-16 md:text-xl md:h-3/4-screen md:flex items-center">
            <div class="max-w-md">
                {!! $content !!}
            </div>
        </div>
    </main>
@endsection