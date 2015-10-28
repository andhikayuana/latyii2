<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phone Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->can('manager')): ?>
            <?= Html::a('Create Phone Record', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'customer.name',

            ],
            'number',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => (Yii::$app->user->can('manager'))?'{view} {update} {delete}':'{view}',
            ],
        ],
    ]); ?>

</div>
