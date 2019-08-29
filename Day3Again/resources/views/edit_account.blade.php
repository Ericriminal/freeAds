<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/edit.css">
    <title>Edit account</title>
</head>

<body>
<div id="form">
    <h1>Edit account</h1>
    <form method="POST" role="form">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <table>
            <tr>
                <td>
                    <label for="email">Email : </label>
                </td>
                <td>
                    <input type="text" id="email" name="email" placeholder="Your email.." value="{{ Auth::user()->email}}">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="edit_password"><button type="button">Change password</button></a>
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
        <a href="/"><button type="button">Back to Index</button></a>
    </form>
</div>
</body>
</html>
