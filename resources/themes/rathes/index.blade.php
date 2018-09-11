@extends('theme::rathes.layout')

@section('content')
    <main class="overflow-auto text-grey-darker">
        <div class="container mx-auto px-6 leading-normal flex items-center min-h-screen
            sm:px-16 sm:text-lg sm:h-3/4-screen sm:min-h-0">
            <div class="max-w-sm py-8 home">
                {!! $content !!}
            </div>
        </div>
    </main>
@endsection