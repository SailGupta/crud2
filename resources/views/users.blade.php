<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Crud</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Crud For Test
            <a href="/add/user" class="btn btn-success btn-sm float-end">Add Student</a>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success') }}</span>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-border">
                <thead>
                    <td>S no:</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Phone Number</td>
                    <td>Register Date</td>
                    <td>Password</td>
                    <td>Address</td>
                    <td class="text-center">Action</td>
                </thead>
                <tbody>
                    @if (count($all_users)>0)
                    @foreach ($all_users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->register_date }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->address }}</td>
                        <td><a href="{/edit/{{ $item->id }}" class="btn btn-primary btn-sm ">Edit</a></td>
                        <td><a href="/delete/{{ $item->id }}" class="btn btn-secondary btn-sm ">Delete</a></td>
                    </tr>

                    @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
