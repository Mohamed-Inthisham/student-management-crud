<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; 
        }
        .container {
            margin-top: 50px;
        }
        .table-container {
            margin-top: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
            font-weight: 700;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 12px;
        }
        th {
            
            color: black;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e3f2fd; 
        }
        .btn-create {
            margin-bottom: 3px;
            background-color: #28a745;
            color: white;
        }
        .btn-create:hover {
            background-color: #218838;
        }
        .btn-edit {
            background-color: #ffc107;
            color: white;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Students List</h1>
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        
 
        <a href="{{ route('createStudent.index') }}" class="btn btn-create">Create Student</a>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->address }}</td>
                            <td>
                                <a href="{{ route('student.edit', ['student' => $student]) }}" class="btn btn-edit btn-sm">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('student.destroy', ['student' => $student]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-delete btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
