<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Address Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (Yii::$app->user->can('manager')): ?>
            <?= Html::a('Create Address Record', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address_id',
            'purpose',
            'country',
            'state',
            'city',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => (Yii::$app->user->can('manager'))?'{view} {update} {delete}':'{view}',
            ],
        ],
    ]); ?>

</div>
