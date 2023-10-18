<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Document</title>
</head>
<body>
    <h1>Welcome to the Simple CRUD in Laravel by <a href="https://nuezaweb.com/" target="_blank">NuezaWeb</a></h1>
  @auth
  <div class="card">
  <p class="text-center">Congrats you are logged in.</p>
  <form action="/logout" method="POST" class="text-center">
    @csrf
    <button>Log out</button>
  </form>
</div>
  <div class="card">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="post title">
      <br />
      <textarea name="body" placeholder="body content..."></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div class="card">
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div style="background-color: rgb(212, 197, 197); padding: 10px; margin: 10px;">
      <h3>{{$post['title']}} by {{$post->user->name}}</h3>
      {{$post['body']}}
      <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
      </form>
    </div>
    @endforeach
  </div>

  @else
  <div class="card">
    <h2>Register</h2>
    <br />
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="Name"> <br />
      <input name="email" type="text" placeholder="Email"><br />
      <input name="password" type="password" placeholder="Password">
      <br />
      <button>Register</button>
    </form>
  </div>
  <div class="card">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
        <br />
      <input name="loginpassword" type="password" placeholder="password">
      <button>Log in</button>
    </form>
  </div>
  @endauth

  
</body>
</html>