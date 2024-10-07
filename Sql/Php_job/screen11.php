<?php

require_once 'init.php';

$data = Query11::all();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css"">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <?php require 'templates/admin_header.php' ?>

    <div class="d-flex">
        <?php require 'templates/admin_navbar.php' ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <span class="h5">En aldığı maaşın en az 2 katıyla iş başvurusu kabul edilen 10 adayı listeler</span>
                    <hr />

                    <?php displayFlashMessage('show_sql') ?>
                    
                    <table id="productsTable" class="table table-hover">
                        <thead>
                            <tr class="table-info">
                                <th>Adı Soyadı</th>
                                <th>Telefon No</th>
                                <th>Talep Edilen Maaş</th>
                                <th>Son Alınan Maaş</th>
                                <th>Başvuru Tarihi</th>
                                <th>Şirket</th>
                                <th>Şehir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->phone ?></td>
                                    <td><?= $item->salary ?></td>
                                    <td><?= $item->oldsalary ?></td>
                                    <td><?= $item->adate ?></td>
                                    <td><?= $item->firm ?></td>
                                    <td><?= $item->city ?></td>
                                <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>