<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/message.css">
    <title>Day 5</title>
</head>
<body>
<div id="container">
    <h1>Search result</h1>
    <a href="/"><button type="button">Back to index</button></a>
    <div id="message_container">
        All messages received:
        @foreach($data_messages as $data)
            <div class="message">
                <table class="message_table">
                    <tr>
                        <td class="name_position">
                            <p>
                                title :
                            </p>
                        </td>
                        <td class="title">
                            <p>
                                {{$data->title}}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="name_position">
                            <p>
                                message :
                            </p>
                        </td>
                        <td class="message">
                            <p>
                                {{$data->message}}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="name_position">
                            <p>
                                author :
                            </p>
                        </td>
                        <td class="username_sender">
                            <p>
                                {{$data->username_sender}}
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
