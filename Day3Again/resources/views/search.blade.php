<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <title>Search for add</title>
</head>

<body>
<div id="form">
    <h1>Search</h1>
    <form method="POST" role="form">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <table>
            <tr>
                <td>
                    <label for="image_type">image type : </label>
                </td>
                <td>
                    <select name="image_type" id="image_type" onchange="image_type_check();">
                        <option value="select" selected="selected">select</option>
                        <option value="DOG">Dog</option>
                        <option value="CAT">Cat</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>race animal : </label>
                </td>
                <td>
                    <select name="race_dog" id="race_dog">
                        <option value="NONE">None</option>
                        <option value="SHIBA">Shiba</option>
                        <option value="BULLDOG">Bulldog</option>
                        <option value="HUSKY">Husky</option>
                    </select>
                </td>
                <td>
                    <select name="race_cat" id="race_cat">
                        <option value="NONE">None</option>
                        <option value="RAGDOLL">Ragdoll</option>
                        <option value="PERSAN">Persan</option>
                        <option value="BOMBAY">Bombay</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="color">color animal : </label>
                </td>
                <td>
                    <select name="color">
                        <option value="NONE">None</option>
                        <option value="WHITE">White</option>
                        <option value="BLACK">Black</option>
                        <option value="BROWN">Brown</option>
                    </select>
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
        <button type="submit">Search with this criteria</button>
        <a href="/"><button type="button">Back to index</button></a>
    </form>
</div>
</body>
<script>
    function image_type_check() {
        var element = document.getElementById('image_type');
        if (element.value == 'DOG') {
            document.getElementById("race_cat").style.display = "none";
            document.getElementById("race_cat").value = "NONE";
            document.getElementById("race_dog").style.display = "block";
        }
        else if (element.value == 'CAT') {
            document.getElementById("race_dog").style.display = "none";
            document.getElementById("race_dog").value = "NONE";
            document.getElementById("race_cat").style.display = "block";
        }
        else {
            document.getElementById("race_dog").style.display = "none";
            document.getElementById("race_cat").style.display = "none";
            document.getElementById("race_dog").value = "NONE";
            document.getElementById("race_cat").value = "NONE";
        }
    }
</script>
</html>
