<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2> <b> Администрирование</b></h2>
        <p class="lead">Доступны следующие возможности:</p>
        <p> <a href="<?= Url::to(['product/index']); ?>"> Управление торговыми предложениями</a></p>
    </div>

</div>