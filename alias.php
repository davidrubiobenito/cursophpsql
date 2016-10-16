<?php
require_once('connection.php');

$sql = 'SELECT user.id as id_usuario, user.email as correo, status.name as nombre_status, user_type.name as nombre_tipo
        FROM user 
        INNER JOIN status ON user.status_id = status.id 
        INNER JOIN user_type ON user_type.id = user.user_type_id';

$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();

//var_dump($results);
$error = $statement->errorInfo();
if($error[1])
{
  echo '<pre>';
  var_dump($error[2]);
  echo '</pre>';
}

$sql_log = 'SELECT * FROM user as u LEFT JOIN user_log as ul ON u.id = ul.user_id';

$statement_log = $pdo->prepare($sql_log);
$statement_log->execute();
$results_log = $statement_log->fetchAll();

$error = $statement_log->errorInfo();
if($error[1])
{
  echo '<pre>';
  var_dump($error[2]);
  echo '</pre>';
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PHP & SQL</title>
<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
 
<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text">Curso PHP & SQL</li>
</ul>
</div>
</div>
 
<div class="row column text-center">
<h2>Renombrando campos y tablas</h2>
<hr>
</div>
<div class="row column">
<div class="callout primary">
<h3>Usuarios con tipo y status</h3>
</div>
<table width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th width="150">Status</th>
      <th width="150">Tipo</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  foreach($results as $rs)
  {
  ?>
    <tr>
      <td><?php echo $rs['id_usuario']; ?></td>
      <td><?php echo $rs['correo']; ?></td>
      <td><?php echo $rs['nombre_status']; ?></td>
      <td><?php echo $rs['nombre_tipo']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
<hr>
<div class="row column">
<div class="callout secondary">
<h3>Usuarios con bitacora</h3>
</div>
<table width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Fecha</th>
      <th width="150">Contraseña</th>
      <th width="150">Status</th>
      <th width="150">Tipo</th>
      <th>ID</th>
      <th>Fecha</th>
      <th>Usuario</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  foreach($results_log as $rs)
  {
  ?>
    <tr>
      <td><?php echo $rs['id']; ?></td>
      <td><?php echo $rs['email']; ?></td>
      <td><?php echo $rs['password']; ?></td>
      <td><?php echo $rs['status_id']; ?></td>
      <td><?php echo $rs['user_type_id']; ?></td>
      <td><?php echo $rs['id']; ?></td>
      <td><?php echo $rs['date_logged_in']; ?></td>
      <td><?php echo $rs['user_id']; ?></td>
      
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
<hr>

</div>
<div class="large-3 large-offset-2 columns">
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
