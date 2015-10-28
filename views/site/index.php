<?php

/* @var $this yii\web\View */

$this->title = 'Yuana CRM';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang <?=(isset(Yii::$app->user->identity->username))?ucfirst(Yii::$app->user->identity->username):''; ?></h1>

        <!-- <p class="lead"></p> -->

        <p><a class="btn btn-lg btn-success" href="#">Ayo Gabung !</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <!-- <p><a class="btn btn-default" href="#">Satu</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <!-- <p><a class="btn btn-default" href="#">Dua</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <!-- <p><a class="btn btn-default" href="#">Tiga</a></p> -->
            </div>
        </div>

    </div>
</div>
