<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <title>formulaire d'inscription admin</title>
</head>

<body>
<div id="form">
    <h1>Inscription</h1>
    <form method="POST" role="form">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <table>
            <tr>
                <td>
                    <label for="email">Email : </label>
                </td>
                <td>
                    <input type="text" id="email" name="email" placeholder="Your Email..">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password : </label>
                </td>
                <td>
                    <input type="text" id="password" name="password" placeholder="Your password.." >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="admin">admin? </label>
                </td>
                <td>
                    <input type="checkbox" id="admin" name="admin" placeholder="Admin?">
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
        <input type="submit" value="Create account">
        <a href="admin"><button type="button">Back to admin</button></a>
    </form>
</div>
</body>
</html>
