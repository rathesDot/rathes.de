@extends('theme::rathes.layout')

@section('content')
    <main class="overflow-auto text-grey-darker">
        <div class="container mx-auto px-6 leading-normal flex items-center
            sm:text-lg sm:h-3/4-screen sm:min-h-0">
            <div class="max-w-sm home">
                {!! $content !!}
            </div>
        </div>
    </main>
@endsection