<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <title>formulaire d'inscription</title>
</head>

<body>
<div id="form">
    <h1>Inscription</h1>
    <form method="POST" role="form" id="form1" name="form1">
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
                    <input type="text" id="password" name="password" placeholder="Your password..">
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
        <input type="button" value="Create account" onClick="length_check();">
        <a href="/"><button type="button">Back to Index</button></a>
    </form>
</div>
</body>

<script>
    function length_check() {
        var element = document.getElementById('password');

        if (element.value.length < 5) {
            window.alert("The password needs to be at least 5 letter long");
        }
        else
            document.getElementById('form1').submit();
    }
</script>
</html>
