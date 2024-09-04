<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add Users</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Add New Student
            @if (Session::has('fail'))
                <span class="text-danger">{{Session::get('fail') }}</span>
            @endif
        </div>
        <div class="card-body mt-2">
            <form action="{{route('store')}}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Full Name</label>
                    <input type="text" name="name" id="formGroupExampleInput" value="{{ old('full_name') }}" placeholder="Full Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="email" name="email" class="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                    <input type="number" name="phone_number" class="phone_number" value="{{ old('phone_number') }}" placeholder="Email">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="number" name="password" class="password" value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Registration Date</label>
                    <input type="date" name="register_date" class="register_date" value="{{ old('register_date') }}" placeholder="Fill Register Date">
                    @error('register_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
