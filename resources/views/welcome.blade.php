<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>tech.pjin.jp HTML5 Template</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1><i class="fa fa-check-square"></i> PHP問題１２</h1>
            </div>
            <div class="jumbotron">
                <?php
                    if (!empty($_POST['btn'])) {
                ?>

                    <h1><?= $_POST['btn'] ?></h1>

                <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form action="./" method="post">
                        <button type="submit" name="btn" value="Unityでゲームを作るならＳＡＫ！" class="btn btn-default">何を送るかな～</a>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
