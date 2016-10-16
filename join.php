<pre>
  <?php
    require_once('connection.php');

    $sql = 'SELECT user.*, status.name, user_type.name as type_name FROM user INNER JOIN status ON status.id = user.status_id 
            INNER JOIN user_type ON user_type.id = user.user_type_id';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();

//    var_dump($results);

    $sql_log = 'SELECT * FROM user INNER JOIN user_log ON user.id = user_id';

    $statement_log = $pdo->prepare($sql_log);
    $statement_log->execute();
    $results_log = $statement_log->fetchAll();
  ?>
</pre>
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
      <h2>JOIN</h2>
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
            <td><?php echo $rs['id']; ?></td>
            <td><?php echo $rs['email']; ?></td>
            <td><?php echo $rs['name']; ?></td>
            <td><?php echo $rs['type_name']; ?></td>
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
                <td><?php echo $rs[0]; ?></td>
                <td><?php echo $rs[1]; ?></td>
                <td><?php echo $rs[2]; ?></td>
                <td><?php echo $rs[3]; ?></td>
                <td><?php echo $rs[4]; ?></td>
                <td><?php echo $rs[5]; ?></td>
                <td><?php echo $rs[6]; ?></td>
                <td><?php echo $rs[7]; ?></td>

              </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>

    <hr>

    <div>
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
