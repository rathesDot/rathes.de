@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal overflow-auto container mx-auto text-grey-darker">
        <div class="px-6 leading-normal max-w-lg md:mt-16 md:px-16">
            {!! $content !!}
        </div>
    </main>
@endsection