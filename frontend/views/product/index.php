<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Тестовое задание</h1>

        <p class="lead">Вы можете выбрать необходимые фильтры для показа товаров или перейти к детальному просмотру.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <h2>Фильтры</h2>

                <p>Цена: <br>
                    от <input type="number" size="3" name="num" min="3" max="15" value="3">
                    до <input type="number" size="3" name="num" min="3" max="15" value="15">
                </p>
                <p>
                <ul>
                    <li><a href="#" class="btn">Все товары</a></li>
                    <li><a href="#" class="btn">Товары вида A</a></li>
                    <li><a href="#" class="btn">Товары вида B</a></li>
                    <li><a href="#" class="btn">Товары вида C</a></li>
                    <li><a href="#" class="btn">Товары вида D</a></li>
                    <li><a href="#" class="btn">Товары вида E</a></li>
                </ul>
                </p>
                <p> Ширина: <input type="number" size="3" name="num" min="1" max="5" value="1"> </p>
                <p>Высота: <input type="number" size="3" name="num" min="1" max="5" value="1"></p>
                <p>Длина: <input type="number" size="3" name="num" min="1" max="5" value="1"></p>
                <a href="#" class="btn btn-primary">Применить</a>
            </div>
            <div class="col-lg-9">
                <h2>Товары</h2>
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <div class="card col-lg-4">
                            <?= Html::img("/images/{$groups[$product['id_group']]['name']}.jpg", ['class' => 'img-products', 'alt' => 'test', 'height' => 210]) ?>
                            <div class="card-body">
                                <p>
                                    <b>Цена: <?= $product['Widht'] * $product['Height'] * $product['Length'] ?></b>
                                    Товар: <?= $groups[$product['id_group']]['name'] ?>
                                </p>
                                <p>Ш: <?= $product['Widht'] ?>, В: <?= $product['Height'] ?>, Д: <?= $product['Length'] ?>.</p>
                                <a href="<?= Url::to(['product/details', 'id_group' => $product['id_group']]) ?>" class="btn btn-primary">Переход на страницу товара</a>
                            </div>
                            <br>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>