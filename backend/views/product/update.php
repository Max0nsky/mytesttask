<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Изменить товарное предложение: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>