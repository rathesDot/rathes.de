@extends('theme::rathes.layout')

@section('content')
    <main class="leading-normal bg-grey-lightest overflow-auto">
        <div class="p-6 leading-loose md:px-16 md:my-16 max-w-md md:text-xl lg:max-w-lg">
            {!! $content !!}
        </div>
    </main>
@endsection