<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <a href='/posts/{{$post->id}}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return fdelete(this);">delete</button> 
                    </form>
                </div>
            @endforeach
            [<a href='/posts/create'>create</a>]
        </div>
    </body>
    <footer>
        <script>
            "use strict";
            function fdelete(e){
                if(confirm("Delete?")){
                    document.getElementById("form_{{ $post->id }}").submit();
                }
            }
        </script>
    </footer>
</html>
