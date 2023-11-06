<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        }

        label {
        margin-bottom: 5px;
        }
        .form{
        display: flex;
        flex-direction: column;
        align-items:center;
        }
    </style>
</head>
<body>
    <div class="form">
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