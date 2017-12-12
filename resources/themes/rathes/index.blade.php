@extends('theme::rathes.layout')

@section('content')
    <main class="overflow-auto">
        <div class="container mx-auto px-6 leading-normal flex items-center min-h-screen
            sm:px-16 sm:text-xl sm:h-3/4-screen sm:min-h-0">
            <div class="max-w-sm py-8 home">
                {!! $content !!}
            </div>
        </div>
        {{--  <div class="flex flex-wrap">
            <div class="bg-indigo-light w-1/2 h-64">
            </div>
            <div class="bg-indigo-lighter w-1/2">
            </div>
            <div class="bg-indigo-lightest h-64 w-1/2">
                Test
            </div>
            <div class="bg-indigo w-1/2">
                Test
            </div>
        </div>  --}}
    </main>
@endsection