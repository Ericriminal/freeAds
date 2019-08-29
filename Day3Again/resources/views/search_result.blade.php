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
    <h1>Search result</h1>
    <a href="/"><button type="button">Back to index</button></a>
    <a href="search_add"><button type="button">Research again</button></a>
    <form method="POST" role="form">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="check" value="1">
        <button type="submit">Set by most recent</button>
    </form>
    <div id="adds_container">
        ADDS RESULT:
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
