<?php
    require_once('connection.php');

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = 'DELETE FROM news WHERE id = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($id));
$results = $statement->fetchAll();

header('Location: delete.php');

?>
