<!-- resources/views/users/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit User Role</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User Role</h1>
        <form action="{{ route('assign') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                dd($user);
                {{--<input type="hidden" name="user_id" value="{{ $user->id }}">--}}
                <label for="role">Role:</label>
                <x-drop-select />
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
</body>
</html>

