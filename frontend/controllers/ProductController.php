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
        $sortValues = FilterForm::getSortArray();
        $filterForm = new FilterForm();
        $filterForm->setPropertiesByGet();
        if ($filterForm->validate()) {
            $products = $filterForm->getResultByFilter();
        } else {
            throw new HttpException(404, 'По данному запросу ничего не найдено.');
        }
        return $this->render('index', ['products' => $products, 'groups' => $groups, 'filterForm' => $filterForm, 'sortValues' => $sortValues]);
    }

    /**
     * Показ страницы отдельного товара
     *
     * @return mixed
     */
    public function actionDetails($id_group = 0, $Widht = 0, $Height = 0, $Length = 0)
    {
        // Если пришел Post от Ajax, то считаем и возвращаем результат
        if (Yii::$app->request->isPost && Yii::$app->request->isAjax) {
            $ajaxAnswer = Product::calculateForAjax(Yii::$app->request->post());
            return json_encode(['price' => $ajaxAnswer['price'], 'quantityOnStore' => $ajaxAnswer['quantityOnStore']]);
        }

        // Получение информации о товарном предложении для рендера страницы
        $productsById = Product::findAll(['id_group' => $id_group]);
        $product = Product::findOne(['id_group' => $id_group, 'Widht' => $Widht, 'Height' => $Height, 'Length' => $Length]);
        if (empty($productsById) || empty($product)) {
            throw new HttpException(404, 'Такого товара не существует.');
        }
        $group = Group::findOne($id_group);
        return $this->render('details', ['product' => $product, 'productsById' => $productsById, 'group' => $group]);
    }
}
