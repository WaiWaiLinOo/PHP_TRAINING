<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_02</title>
  <style>
    table {
      border: 1px solid black;
    }

    td {
      height: 50px;
      width: 50px;
    }

    .black {
      background-color: black;
    }
  </style>
</head>

<body>
  <table>
    <?php
    for ($rows = 1; $rows <= 8; $rows++) {
      echo "<tr>";
      for ($columns = 1; $columns <= 8; $columns++) {
        if (($rows + $columns) % 2 == 0) {
          echo "<td class='black'></td>";
        } else {
          echo "<td></td>";
        }
      }
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>