<!DOCTYPE html>
<html>
<head>
    <title>SCMC TEACHERS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>