<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>
    <h1>petit test</h1>
    @if (Auth::check())
        <p>You are connected as:</p>
        <p>{{ Auth::user()->email }}</p>
        <a href="logout"><button type="button">Disconnect</button></a>
        <a href="{{ url('edit/'.Auth::id().'/') }}"><button type="button">Edit your account</button></a>
    @else
        <a href="register"><button type="button">Inscrit toi!</button></a>
        <a href="login"><button type="button">Connecte toi!</button></a>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Email</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($new_users as $key)
        <tr>
            <td>{{ $key->id }}</td>
            <td>{{ $key->email }}</td>
            <td><a href="{{ url('delete/'.$key->id.'/') }}"><button type="button">Delete</button></a></td>
            <td><a href="{{ url('edit/'.$key->id.'/') }}"><button type="button">Edit</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>
