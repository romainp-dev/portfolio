<?php
session_start();

if ($_SESSION['username']) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql = 'SELECT * FROM `projects` WHERE `id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        /*  var_dump($result); */
    } else {
        echo 'id manquant';
    }
} else {
    echo 'identifiez-vous';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

   <h1><?= $result['project_title'] ?></h1> <br><br>
    <img src="../assets/images/<?= $result['project_picture'] ?>" alt=""><br>
    <?= $result['project_context'] ?><br>
    <?= $result['project_specs'] ?><br><br>

<a href="home.php"><button>retour</button></a>

</body>

</html>