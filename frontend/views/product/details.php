<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Детали ' . $group->name;
?>
<div class="site-details">
    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <?= Html::img("/images/{$group->name}.jpg", ['class' => 'img-details-products', 'alt' => 'test', 'height' => 350]) ?>
                <input type="hidden" name="IdGroup" value="<?= $group->id ?>">
            </div>

            <div class="col-lg-8">
                <h3>Товар вида <?= $group->name ?></h3>
                <h4>Id предложения: <span class="idThisProduct" id="idThisProduct"><?=$product->id?></span></h4>
                <!-- Widht-->
                    <p>Ширина:
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <label class="btn btn-info 
                                <?php
                                // Закрыть кнопку Widht если нет на складе
                                $disabled = "disabled";
                                foreach ($productsById as $productById) {
                                    if ($productById->Widht == $i) {
                                        $disabled = "";
                                        break;
                                    }
                                }
                                echo $disabled;
                                // Сделать кнопку Widht нажатой при первом показе
                                if ($product->Widht == $i) echo " active" ?>">
                                <input class="calc" type="radio" name="Widht" id="w" value="<?= $i ?>" autocomplete="on" <?php if ($product->Widht == $i) echo "checked" ?>> <?= $i ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                    </p>
                <!-- /Widht-->

                <!-- Height-->
                    <p>Высота:
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <label class="btn btn-info  
                            <?php
                            // Закрыть кнопку Height если нет на складе
                            $disabled = "disabled";
                            foreach ($productsById as $productById) {
                                if ($productById->Height == $i) {
                                    $disabled = "";
                                    break;
                                }
                            }
                            echo $disabled;
                            // Сделать кнопку Height нажатой при первом показе
                            if ($product->Height == $i) echo " active" ?>">
                                <input class="calc" type="radio" name="Height" id="w" value="<?= $i ?>" autocomplete="on" <?php if ($product->Height == $i) echo "checked" ?>> <?= $i ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                    </p>
                <!-- /Height-->

                <!-- Length-->
                    <p>Длина:
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <label class="btn btn-info  
                            <?php
                            // Закрыть кнопку Length если нет на складе
                            $disabled = "disabled";
                            foreach ($productsById as $productById) {
                                if ($productById->Length == $i) {
                                    $disabled = "";
                                    break;
                                }
                            }
                            echo $disabled;
                            // Сделать кнопку Length нажатой при первом показе
                            if ($product->Length == $i) echo " active" ?>">
                                <input class="calc" type="radio" name="Length" id="w" value="<?= $i ?>" autocomplete="on" <?php if ($product->Length == $i) echo "checked" ?>> <?= $i ?>
                            </label>
                     <?php endfor; ?>
                    </div>
                    </p>
                <!-- /Length-->

                <p>Количество: <input class="calc" type="number" name="Quantity" id="q" size="3" min="0" max="<?= $product->Quantity ?>" value="0"> </p>
                <p> <b>На складе: <span class="quantityOnStore" id="quantityOnStore"><?= $product->Quantity ?></span></b> </p>
                <h4>Итоговая стоимость: <span class="price" id="price">0</span> </h4>
            </div>

        </div>

    </div>
</div>