@extends('theme::rathes.layout')

@section('content')
    <div class="container mx-auto blog-list text-grey-darker">
        <div class="px-6 leading-normal max-w-lg md:mt-16 md:px-16">
            {!! $content !!}
        </div>
    </div>
@endsection