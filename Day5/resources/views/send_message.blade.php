<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <title>Send message</title>
</head>

<body>
<div id="form">
    <h1>Send message</h1>
    <form method="POST" role="form">
        <input type="hidden" name="username_sender" value="{{Auth::user()->username}}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <table>
            <tr>
                <td>
                    <label for="Title">Title : </label>
                </td>
                <td>
                    <input type="text" id="email" name="title" placeholder="Your title..">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="message">Message : </label>
                </td>
                <td>
                    <textarea id="message" name="message" placeholder="Your message.."></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="send_to">Send to : </label>
                </td>
                <td>
                    <input type="text" id="send_to" name="send_to" placeholder="Send to..">
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
        <button type="submit">Send your message</button>
        <a href="/"><button type="button">Back to Index</button></a>
    </form>
</div>
</body>
</html>
