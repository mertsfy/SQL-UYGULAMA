<?php

require_once 'init.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css"">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<?php require 'templates/admin_header.php' ?>

<div class="d-flex">
    <?php require 'templates/admin_navbar.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <span class="h5">Tablolar</span>
                <hr/>
                <img src="dbsema.jpg"/>

            </div>
        </div>
    </div>
</div>

</body>
</html>