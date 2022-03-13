@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-75">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="px-1">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 50px"> <!--method is post so we have to grab the img like this-->
                    </div>
                    <div class="px-3">
                        <p><strong>
                                <a href="/profile/{{ $post->user->id }}" style="text-decoration: none">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a> |
                                <a href="#" class="px-3">Follow</a>
                            </strong></p>
                    </div>
                </div>
                <hr>
                <p><span><strong>
                            <a href="/profile/{{ $post->user->id }}" style="text-decoration: none">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </strong></span>
                    {{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
