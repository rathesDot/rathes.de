@extends('theme::rathes.layouts.blog')

@section('content')
    <div class="container mx-auto leading-normal md:mt-16 text-grey-darker">
        <header class="font-sans mt-8 p-4 text-center">
            <h1 class="text-3xl font-medium leading-tight">
                {{ $meta['title'] }}
            </h1>
            <small class="block mt-1 text-sm text-grey">
                @if(isset($meta['updated']))
                    updated {{ \Illuminate\Support\Carbon::createFromTimestamp($meta['updated'])->diffForHumans() }} 
                @else
                    posted {{ \Illuminate\Support\Carbon::createFromTimestamp($meta['date'])->diffForHumans() }} 
                @endif
                in {{ implode(',', $meta['categories']) }} | 
                @readingTime($content) min read
            </small>
        </header>
        @if(isset($meta['image']))
            <div class="max-w-lg mx-auto">
                <img src="{{ asset($meta['image']) }}" alt="">
            </div>
        @endif
        <div class="max-w-md mx-auto font-sans px-4 single-blog-post">
            {!! $content !!}
        </div>
    </div>
@endsection

@push('javascript')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush