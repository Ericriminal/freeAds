<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/admin.css">
    <title>Day 3</title>
</head>
<body>
<div id="container">
    <h1>Day 3</h1>
        <p>You are connected as:</p>
        <p>{{ Auth::user()->email }}</p>
        <a href="/"><button type="button">Go back to index</button></a>
        <a href="admin_create_account"><button type="button">Create an account</button></a>
    <div id="account_container">
        ACCOUNT :
            <div class="account">
                <table class="account_table">
                    <thead>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                Admin?
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_account as $data)
                        </tr>
                            <td>
                                {{$data->email}}
                            </td>
                            <td>
                                @if($data->admin == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                <form method="POST" role="form">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="post_action" value="edit" class="edit_button">
                                    <input type="hidden" name="id_account" value="{{$data->id}}">
                                    <button type="submit" class="edit_button">Edit this account</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" role="form">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="post_action" value="delete" class="delete_button">
                                    <input type="hidden" name="id_account" value="{{$data->id}}">
                                    <button type="submit" class="delete_button">delete this account</button>
                                </form>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
</body>
</html>
