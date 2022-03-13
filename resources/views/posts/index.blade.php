@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-75">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p><span><strong>
                            <a href="/profile/{{ $post->user->id }}" style="text-decoration: none">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </strong></span>
                        {{ $post->caption }}</p>
                </div>
            </div>
        </div>
    @endforeach

        <div class="row justify-content-center">
            <div class="col-4 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
</div>
@endsection
