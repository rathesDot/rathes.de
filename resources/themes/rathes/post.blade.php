@extends('theme::rathes.layout')

@section('content')
    <div class="container mx-auto leading-normal md:mt-16">
        @if(isset($meta['image']))
            <div class="max-w-lg mx-auto">
                <img src="{{ asset($meta['image']) }}" alt="">
            </div>
        @endif
        <header class="font-sans mt-8 p-4 text-center">
            <h1 class="text-3xl font-medium leading-tight">
                {{ $meta['title'] }}
            </h1>
            <small class="block mt-1 text-sm text-grey">
                posted {{ \Illuminate\Support\Carbon::createFromTimestamp($meta['date'])->diffForHumans() }} 
                in {{ implode(',', $meta['categories']) }}
            </small>
        </header>
        <div class="max-w-md mx-auto font-serif px-4 single-blog-post">
            {!! $content !!}
        </div>
    </div>
@endsection