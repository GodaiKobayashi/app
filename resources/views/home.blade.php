@extends('layouts.app')

@section('content')
<div class="Gird">
    <div class="menu">
        @include('components.menu')
    </div>
    <div class="chat">
        <div class="card">
            <div class="card-header">展示版</div>
                <div class="card-body chat-card">
                        <div id="comment-data"></div>
                </div>
                
            <form method="POST" action="{{route('add')}}">
                @csrf
                <div class="comment-container">
                    <div class="input-group comment-area">
                        <textarea class="form-control" id="comment" name="comment" placeholder="投稿 (shift + Enter or click)"
                            aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                        <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">投稿</button>
                    </div>
                </div>
            </form>
        </div>
        
    
     @section('js')
    <script src="{{ asset('js/comment.js') }}"></script>
    
    @endsection
    </div>
</div>
@endsection
    
   