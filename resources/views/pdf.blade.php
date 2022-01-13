<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 7 Generate PDF From View Example Tutorial - NiceSnippets</title>
</head>
<body>
<div class="row">
    <a href="{{ URL::to('/student/pdf') }}">Export PDF</a>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->email }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>


