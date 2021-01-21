<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Детали ' . $group->name;
?>
<div class="site-details">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <?= Html::img("/images/{$group->name}.jpg", ['class' => 'img-details-products', 'alt' => 'test', 'height' => 350]) ?>
            </div>
            <div class="col-lg-8">
                <h3>Товар вида <?= $group->name ?></h3>
                <p>Ширина:
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="1" autocomplete="off" checked> 1
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="2" autocomplete="off"> 2
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="3" autocomplete="off"> 3
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="4" autocomplete="off"> 4
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="5" autocomplete="off"> 5
                    </label>
                </div>
                </p>
                <p>Высота:
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="1" autocomplete="off"> 1
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="2" autocomplete="off"> 2
                    </label>
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="3" autocomplete="off" checked> 3
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="4" autocomplete="off"> 4
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="5" autocomplete="off"> 5
                    </label>
                </div>
                </p>
                <p>Длина:
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="1" autocomplete="off"> 1
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="2" autocomplete="off"> 2
                    </label>
                    <label class="btn btn-info ">
                        <input type="radio" name="options" id="3" autocomplete="off"> 3
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="4" autocomplete="off"> 4
                    </label>
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="5" autocomplete="off" checked> 5
                    </label>
                </div>
                </p>
                <p>Количество: <input type="number" size="3" name="num" min="1" max="5" value="1">

                </p>
                <p> <b>На складе: 0</b> </p>
                <h4>Итоговая стоимость: 0</h4>
            </div>
        </div>

    </div>
</div>