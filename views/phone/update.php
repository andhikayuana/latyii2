<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneRecord */

$this->title = 'Update Phone Record: ' . ' ' . $model->phone_id;
$this->params['breadcrumbs'][] = ['label' => 'Phone Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phone_id, 'url' => ['view', 'id' => $model->phone_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listCustomer' => $listCustomer,
    ]) ?>

</div>
