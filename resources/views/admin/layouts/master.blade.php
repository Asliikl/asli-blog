<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @stack('page_title','Admin Panel') | Aslı  Blog</title>
    @stack('css')
    <style>
        .header ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
      
        .header li{
            float: left;
        }
    
        .header li a{
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
       }
       .header li a:hover{
        background-color: #111;
       } 
      
    </style>
</head>
<body> 
    <div class="header">
        <ul>
            <li><a href="{{route('admin.home')}}">Home</a></li>
            <li><a href="{{route('admin.blog')}}">İçerikler</a></li>
            <li><a href="{{route('admin.blogAdd')}}">İçerik Ekle</a></li>
        </ul>
    </div>
    <br>
    @yield('content')
    @stack('js') <!-- stack -->
    
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

</body>
</html>