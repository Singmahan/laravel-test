<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>index</title>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Students Data</h2>
            </div>
            <div>
                <a href="{{ route('students.create') }}" class="btn btn-success">Add Data</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="text-center">{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="text-center">
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-success btn-sm">edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $students->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</body>
</html>
