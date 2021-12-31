<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
    </head>
    <body>
      <div id="tweet">
        <header>
          <div class="contents">
            <section class="submit-form">
              <input v-model="tweet">
              <button @click="postTweet">送信</button>
            </section>
          </div>
        </header>
        <main>
          <div class="contents">
            <ul>
              @foreach ($tweets as $tweet)
                <li>{{ $tweet->tweet }}</li>
              @endforeach
            </ul>
          </div>
        </main>
        <footer>
        </footer>
      </div>
        <script src="{{ asset('js/tweet.js') }}"></script>
    </body>
</html>