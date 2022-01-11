
@component('mail::message')
# Student List
<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>

  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
    </tr>
    @component('mail::table')
    @foreach ($students as $student)
    <tr>
      <td>{{$student->name}} </td>
      <td>{{$student->email}} </td>
      <td>{{$student->major_name}}</td>
    </tr>
    @endforeach
    @endcomponent
   </table>
</body>
</html>
@component('mail::button', ['url' => 'http://localhost:8000/students'])
See More Students
@endcomponent
Thanks,<br>
Assginment student list
@endcomponent