<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            text-align: center;
        }

        .container form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: rgb(107, 132, 232);
        }

        .container form label, .container form input, .container form button {
            display: block;
            margin-bottom: 10px;
        }
    
        .container form button {
            margin: 0 auto;
            background-color:black;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{route('admin.login.post')}}" method="POST">
             @csrf
            <label>Email Adress: </label><input type="email" name="email">
            <label>Pasword : </label><input type="password" name="password"><br>
            <button type="submit" name="send">Gönder</button>
        </form>
    </div>
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif
</body>
</html>