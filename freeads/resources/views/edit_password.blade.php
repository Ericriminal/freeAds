<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/form.css">
    <title>Edit account</title>
</head>



<body>
    <div id="form">
        <h1>Edit account</h1>
        <form method="POST" role="form" id="form1" name="form1">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <table>
                <tr>
                    <td>
                        <label for="current_password">current password : </label>
                    </td>
                    <td>
                        <input type="text" id="current_password" name="current_password" placeholder="Your current password..">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password : </label>
                    </td>
                    <td>
                        <input type="text" id="password" name="password" placeholder="Your new password..">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="check_password">Check Password : </label>
                    </td>
                    <td>
                        <input type="text" id="check_password" name="check_password" placeholder="Rewrite your new password..">
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
                <input type="button" value="save password" onClick="length_check();">
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
