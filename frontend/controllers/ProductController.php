<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\Group;
use frontend\models\FilterForm;
use yii\web\HttpException;
use yii\web\Controller;
use Yii;


/**
 * Контроллер Group 
 */
class ProductController extends Controller
{
    /**
     * Показ главной страницы c фильтром
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $groups = Group::find()->indexBy('id')->asArray()->all();
        $filterForm = new FilterForm();
        $filterForm->setPropertiesByGet();
        if ($filterForm->validate()) {
            $products = $filterForm->getResultByFilter();
        } else {
            throw new HttpException(404, 'По данному запросу ничего не найдено.');
        }
        return $this->render('index', ['products' => $products, 'groups' => $groups, 'filterForm' => $filterForm]);
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
