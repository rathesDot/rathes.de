@extends('theme::default.layout', [
    'noFlex' => $meta['noFlex']
])

@section('content')
    {!! $content !!}
    @if(isset($meta['social']) && $meta['social'] === true)
        <p class="social">
            <a href="https://twitter.com/rswebdesigner" class="twitter" target="_blank">Twitter</a>
            <a href="https://www.facebook.com/rathes.de" class="facebook" target="_blank">Facebook</a>
            <a href="https://www.linkedin.com/in/rathes-sachchithananthan-28893620" class="linkedin" target="_blank">LinkedIn</a>
            <a href="https://www.instagram.com/tamizhographer/" class="instagram" target="_blank">Instagram</a>
        </p>
    @endif
@endsection