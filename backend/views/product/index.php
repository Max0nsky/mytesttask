<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Торговые предложения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="row">
        <h1> Детали групп торговых предложений</h1> <br>
        <?php foreach ($groups as $group) : ?>
            <div class="card col-lg-2 group">
                <p>
                    <?= Html::img("/allImages/{$group['name']}.jpg", ['class' => 'img-details-products', 'height' => 100]) ?>
                </p>
                <p>
                    <b>Название:</b> <?= $group['name'] ?>
                </p>
                <p>
                    <b> Id группы:</b> <?= $group['id'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить объект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_group',
            'Widht',
            'Height',
            'Length',
            'Quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>