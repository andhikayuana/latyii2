<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (Yii::$app->user->can('manager')): ?>
            <?= Html::a('Create Customer Record', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'attribute' => 'birth_date',
                'format' => ['date', 'dd-MMMM-Y'],
                'options' => ['style' => 'width:240px'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'birth_date',
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd',
                    ],
                ]),
            ],
            [
                'attribute' => 'phones.number',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => (Yii::$app->user->can('manager'))?'{view} {update} {delete}':'{view}',
            ],
        ],
    ]); ?>

</div>
