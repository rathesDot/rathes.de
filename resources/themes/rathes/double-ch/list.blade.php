@extends('theme::rathes.double-ch.layout')

@section('content')
    <div class="container mx-auto article-list text-grey-darker">
        <div class="p-6 max-w-md leading-normal md:ml-16 md:px-16">
            {!! $content !!}
        </div>
    </div>
@endsection