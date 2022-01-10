<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    th {
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>

  <h2>Blog Student PDF</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
      <th>Course</th>
    </tr>
    @foreach ($students as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->major_name}}</td>
      <td>{{ $item->course }}</td>
    </tr>
    @endforeach
  </table>

</body>

</html>