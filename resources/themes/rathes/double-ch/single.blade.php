@extends('theme::rathes.double-ch.layout')

@section('content')
    <div class="container mx-auto article-single text-grey-darker">
        <div class="p-6 max-w-md leading-normal md:ml-16 md:px-16">
            {!! $content !!}
        </div>
        <div class="p-6 max-w-md leading-normal md:ml-16 md:px-16">
            <a href="/with-double-ch" class="text-grey-dark no-underline tracking-wide border-b border-grey
                hover:border-black">
                &#10229; Back
            </a>
        </div>
    </div>
@endsection