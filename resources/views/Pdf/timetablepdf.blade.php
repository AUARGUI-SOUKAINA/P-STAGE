<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    <table class="table table-bordered">
        <tr>
            <th>day</th>
            <th>start_time</th>
            <th>End_time</th>
            <th>Teacher</th>

        </tr>
        @foreach($group->timetables as $timetable)
        <tr>
            <td>{{ $timetable->day }}</td>
            <td>{{ $timetable->start_time }}</td>
            <td>{{ $timetable->end_time }}</td>
            <td>{{ $timetable->teacher->name}}</td>

        </tr>
        @endforeach
    </table>
  
</body>
</html>