@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center">
    @include('components.menu')
    <div class="chat-area">
        <div class="card">
            <div class="card-header">展示版</div>
            <div class="card-body chat-card">
                <div id="comment-data"></div>
            </div>


<form method="POST" action="{{route('add')}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="投稿 (shift + Enter or click)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">投稿</button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/comment.js') }}"></script>
@endsection