<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/adds.css">
    <title>Day 3</title>
</head>
<body>
    <div id="container">
        <h1>Day 3</h1>
        @if (Auth::check())
            <p>You are connected as:</p>
            <p>{{ Auth::user()->email }}</p>
            <a href="logout"><button type="button">Disconnect</button></a>
            <a href="edit"><button type="button">Edit your account</button></a>
            <a href="edit_adds"><button type="button">Create or edit your adds</button></a>
            @if (Auth::user()->admin)
                <a href="admin"><button type="button">Create or edit account</button></a>
            @endif
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
        <a href="search_add"><button type="button">Search Add</button></a>
        <div id="adds_container">
            ADDS :
            @foreach($data_adds as $data)
                <div class="add">
                    <table class="adds_table">
                        <tr>
                            <td rowspan="3">
                                <img class="img_add" src="{{$data->image}}">
                            </td>
                            <td class="name_position">
                                <p>
                                    title :
                                </p>
                            </td>
                            <td class="title_add">
                                <p>
                                    {{$data->title}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="name_position">
                                <p>
                                    description :
                                </p>
                            </td>
                            <td class="description_add">
                                <p>
                                    {{$data->description}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="name_position">
                                <p>
                                    price :
                                </p>
                            </td>
                            <td class="price_add">
                                <p>
                                    {{$data->price}}€
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
