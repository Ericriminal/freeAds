<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/edit_add.css">
    <link rel="stylesheet" href="css/adds.css">
    <title>Day 3</title>
</head>
<body>
<div id="container">
    <h1>
        Edit or create your add
    </h1>
    <table id="ButtonTable">
        <tr>
            <td>
                <a href="create_add"><button type="button">Create add</button></a>
            </td>
            <td>
                <a href="/"><button type="button">Back to Index</button></a>
            </td>
        </tr>
    </table>
    <div id="adds_container">
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
                <form method="POST" role="form">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="post_action" value="edit" class="edit_button">
                    <input type="hidden" name="id_add" value="{{$data->id}}">
                    <button type="submit" class="edit_button">Edit this add</button>
                </form>
                <form method="POST" role="form">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="post_action" value="delete" class="delete_button">
                    <input type="hidden" name="id_add" value="{{$data->id}}">
                    <button type="submit" class="delete_button">delete this add</button>
                </form>
            </div>
        @endforeach
        </div>
</div>
</body>
</html>
