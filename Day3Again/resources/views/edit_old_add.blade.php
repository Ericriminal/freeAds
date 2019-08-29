<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <title>Create your add</title>
</head>

<body>
<div id="form">
    <h1>Edit form</h1>
    <form method="POST" role="form" id="form1" name="form1">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="id_add" value="{{$data->id}}">
        <table>
            <tr>
                <td>
                    <label for="image">Image URL : </label>
                </td>
                <td>
                    <input type="text" id="image" name="image" placeholder="Your image URL.." value="{{$data->image}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image_type">image type : </label>
                </td>
                <td>
                    <select name="image_type">
                        <option value="DOG">Dog</option>
                        <option value="CAT">Cat</option>
                        <option value="SPOON">Spoon</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="title">Title : </label>
                </td>
                <td>
                    <input type="text" id="title" name="title" placeholder="Title .." value="{{$data->title}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">description : </label>
                </td>
                <td>
                    <input type="text" id="description" name="description" placeholder="Your description.." value="{{$data->description}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">price in euro: </label>
                </td>
                <td>
                    <input type="number" id="price" name="price" placeholder="Your The price in euro.." min="1" value="{{$data->price}}">
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
        <button type="form">edit this add</button>
        <a href="edit_adds"><button type="button">Back to edit adds</button></a>
    </form>
</div>
</body>
</html>
