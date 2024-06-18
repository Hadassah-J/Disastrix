@include('admin/header');
<!-- resources/views/users/index.blade.php -->
<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
    table,tr,th,td{
        border: 1px solid black;
        border-collapse:collapse;

    }
    a{
        border: 1px solid black;
        color:blue;
        border-collapse:collapse;
    }
    a::hover{
        color:red;
    }
    </style>
<body>
    <div class="container mt-5">
        <h1>Users</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role_id</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td> <a href="{{ route('show') }}">Assign role</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

