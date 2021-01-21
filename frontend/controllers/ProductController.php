<?php

namespace frontend\controllers;

use frontend\models\Product;
use frontend\models\Group;
use yii\web\HttpException;
use yii\web\Controller;
use Yii;


/**
 * Контроллер Group 
 */
class ProductController extends Controller
{
    /**
     * Показ главной страницы
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $products = Product::find()->orderBy('id_group')->indexBy('id')->asArray()->all();
        $groups = Group::find()->indexBy('id')->asArray()->all();

        return $this->render('index', ['products' => $products, 'groups' => $groups]);
    }

    /**
     * Показ страницы отдельного товара
     *
     * @return mixed
     */
    public function actionDetails($id_group)
    {
        $products = Product::findAll(['id_group' => $id_group]);
        if (empty($products)) {
            throw new HttpException(404, 'Такого товара не существует.');
        }
        $group = Group::findOne($id_group);

        return $this->render('details', ['products' => $products, 'group' => $group]);
    }
}
