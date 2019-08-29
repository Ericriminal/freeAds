<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Day 3</title>
</head>
<body>
    <div id="container">
        <h1>Day 3</h1>
        @if (Auth::check())
            <p>You are connected as:</p>
            <p>{{ Auth::user()->email }}</p>
            <a href="logout"><button type="button">Disconnect</button></a>
            <a href="{{ url('edit/'.Auth::id().'/') }}"><button type="button">Edit your account</button></a>
        @else
            <table id="ButtonTable">
                <tr>
                    <td>
                        <a href="register"><button type="button">Register</button></a>
                    </td>
                    <td>
                        <a href="login"><button type="button">Login</button> </a>
                    </td>
                </tr>
            </table>
        @endif

        <div id="adds_container">
            SUUUUP
        </div>
    </div>
</body>
</html>
