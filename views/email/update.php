<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmailRecord */

$this->title = 'Update Email Record: ' . ' ' . $model->email_id;
$this->params['breadcrumbs'][] = ['label' => 'Email Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email_id, 'url' => ['view', 'id' => $model->email_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="email-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listCustomer' => $listCustomer,
    ]) ?>

</div>
