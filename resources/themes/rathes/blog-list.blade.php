@extends('theme::rathes.layout')

@section('content')
    <div class="container mx-auto blog-list text-grey-darker">
        <div class="p-6 max-w-lg md:px-16">
            {!! $content !!}
        </div>
    </div>
@endsection