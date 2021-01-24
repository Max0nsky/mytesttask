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
                <form method="GET">
                    <h2>Фильтры</h2>
                    <p>Сортировка результата: <br>
                        <select name="sort" id="selectSort">
                            <?php foreach ($sortValues as $sortValue => $sortName) : ?>
                                <option value="<?= $sortValue ?>" <?php if(isset($_GET['sort']) && ($sortValue == $_GET['sort'])) echo "selected"?>> <?= $sortName ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p>Цена: <br>
                        от <input type="number" size="3" name="startPrice" min="1" max="125" value="<?= $filterForm->startPrice ?>">
                        до <input type="number" size="3" name="finishPrise" min="1" max="125" value="<?= $filterForm->finishPrise ?>">
                    </p>
                    <p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="group" value="-1" id="-1" <?php if ($filterForm->group == -1) echo "checked" ?> />
                        <label class="form-check-label" for="group"> Все товары </label>
                    </div>
                    <?php foreach ($groups as $group) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="group" id="<?= $group['id'] ?>" value="<?= $group['id'] ?>" <?php if ($filterForm->group == $group['id']) echo "checked" ?> />
                            <label class="form-check-label" for="group"> Товары вида <?= $group['name'] ?> </label>
                        </div>
                    <?php endforeach; ?>
                    </p>
                    <p>Ширина: <br>
                        от <input type="number" size="3" name="startWidht" min="1" max="5" value="<?= $filterForm->startWidht ?>">
                        до <input type="number" size="3" name="finishWidht" min="1" max="5" value="<?= $filterForm->finishWidht ?>">
                    </p>
                    <p>Высота: <br>
                        от <input type="number" size="3" name="startHeight" min="1" max="5" value="<?= $filterForm->startHeight ?>">
                        до <input type="number" size="3" name="finishHeight" min="1" max="5" value="<?= $filterForm->finishHeight ?>">
                    </p>
                    <p>Длина: <br>
                        от <input type="number" size="3" name="startLength" min="1" max="5" value="<?= $filterForm->startLength ?>">
                        до <input type="number" size="3" name="finishLength" min="1" max="5" value="<?= $filterForm->finishLength ?>">
                    </p>
                    <?= Html::submitButton('Показать', ['class' => 'btn btn-primary']) ?>
                </form>
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
                                <a href="<?= Url::to(['product/details', 'id_group' => $product['id_group'], 'Widht' => $product['Widht'], 'Height' => $product['Height'], 'Length' => $product['Length']]) ?>" class="btn btn-primary">Переход на страницу товара</a>
                            </div>
                            <br>
                        </div>
                    <?php endforeach; ?>
                    <?php if (empty($products)) : ?>
                        <h3>Ничего не найдено. Пожалуйста, измените параметры поиска.</h3>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>