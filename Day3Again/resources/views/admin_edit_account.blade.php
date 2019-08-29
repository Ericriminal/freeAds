<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/edit.css">
    <title>Edit account admin</title>
</head>

<body>
<div id="form">
    <h1>Edit account</h1>
    <form method="POST" role="form">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="id_account" type="hidden" value="{{$data->id}}"/>
        <table>
            <tr>
                <td>
                    <label for="email">Email : </label>
                </td>
                <td>
                    <input type="text" id="email" name="email" placeholder="Email.." value="{{$data->email}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password : </label>
                </td>
                <td>
                    <input type="text" id="password" name="password" placeholder="Password..">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="admin">Admin?</label>
                </td>
                <td>
                    <input type="checkbox" id="admin" name="admin" placeholder="Admin?" value="{{ $data->admin }}">
                </td>
            </tr>
        </table>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br/>
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <input type="submit" value="save account">
        <a href="admin"><button type="button">Back to admin</button></a>
    </form>
</div>
</body>
</html>
