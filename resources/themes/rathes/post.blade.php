@extends('theme::rathes.layouts.blog')

@section('content')
    <div class="container mx-auto leading-normal text-grey-darker px-6">
        <header class="font-sans my-4">
            <h1 class="text-3xl font-medium leading-tight text-purple-darkest">
                {{ $meta['title'] }}
            </h1>
            <small class="block text-sm text-grey">
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
            <div class="max-w-md my-2">
                <img src="{{ asset($meta['image']) }}" alt="">
            </div>
        @endif
        <div class="max-w-md font-sans text-grey-darker single-blog-post">
            {!! $content !!}
        </div>
    </div>
@endsection

@push('javascript')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush