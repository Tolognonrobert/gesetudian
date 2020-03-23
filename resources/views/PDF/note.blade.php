<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOtes</title>
</head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<h2>Notes par matière </h2>
<p>Tableau de notes</p>
<table style="width:100%">
  <tr>
    <th>Matières</th>
    <th>notes</th> 
  </tr>
  @foreach ($notes as $note )
  <tr>
        <td >{{$note->lib_mat}}</td>
        <td>{{$note->note}}</td>
 </tr>
 @endforeach
</table>

</body>
</html>
