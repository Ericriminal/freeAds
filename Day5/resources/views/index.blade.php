<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Day 5</title>
</head>
<body>
<div id="container">
    <h1>Day 5</h1>
    @if (session()->has('success'))
        <div class="alert alert_success">
            {{session()->get('success')}}
        </div>
    @endif
        @if (Auth::check())
        <p>You are connected as:</p>
        <p>{{ Auth::user()->username }}</p>
        <a href="logout"><button type="button">Disconnect</button></a>
        <a href="send_message"><button type="button">Send message</button></a>
        <a href="received_messages"><button type="button">Check received message(s)</button></a>
    @else
        <table id="ButtonTable">
            <tr>
                <td>
                    <a href="register"><button type="button">Register</button></a>
                </td>
                <td>
                    <a href="login"><button type="button">Login</button></a>
                </td>
            </tr>
        </table>
    @endif
</div>
</body>
</html>
