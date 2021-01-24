<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

class FilterForm extends Model
{
    public $startPrice;
    public $finishPrise;
    public $group;
    public $startWidht;
    public $finishWidht;
    public $startHeight;
    public $finishHeight;
    public $startLength;
    public $finishLength;
    public $sort;

    public function rules()
    {
        return [
            [['startPrice', 'finishPrise', 'group', 'startWidht', 'finishWidht', 'startHeight', 'finishHeight', 'startLength', 'finishLength', 'sort'], 'required'],
            [['startWidht', 'finishWidht', 'startHeight', 'finishHeight', 'startLength', 'finishLength'], 'integer', 'min' => 1, 'max' => 5],
            [['startPrice', 'finishPrise'], 'integer', 'min' => 1, 'max' => 125],
            [['group'], 'integer',  'min' => -1, 'max' => 5],
            [['sort'], 'string', 'max' => 30],
        ];
    }
    public function attributeLabels()
    {
        return [
            'startPrice' => 'Цена от',
            'finishPrise' => 'Цена до',
            'group' => 'Группа товаров',
            'startWidht' => 'Ширина от',
            'finishWidht' => 'Ширина до',
            'startHeight' => 'Высота от',
            'finishHeight' => 'Высота до',
            'startLength' => 'Длина от',
            'finishLength' => 'Длина до',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * Установка свойств фильтрации из GET или по умолчанию для безопасности
     */
    public function setPropertiesByGet()
    {
        $sortMethod = [
            'pa' => '(Height*Length*Widht) ASC',
            'pd' => '(Height*Length*Widht) DESC',
            'wa' => 'Widht ASC',
            'wd' => 'Widht DESC',
            'ha' => 'Height ASC',
            'hd' => 'Height DESC',
            'la' => 'Length ASC',
            'ld' => 'Length DESC'
        ];

        $this->startPrice = isset($_GET['startPrice']) ?  $_GET['startPrice'] : 1;
        $this->finishPrise = isset($_GET['finishPrise']) ?  $_GET['finishPrise'] : 125;
        $this->group = isset($_GET['group']) ?  $_GET['group'] : -1;
        $this->startWidht = isset($_GET['startWidht']) ?  $_GET['startWidht'] : 1;
        $this->finishWidht = isset($_GET['finishWidht']) ?  $_GET['finishWidht'] : 5;
        $this->startHeight = isset($_GET['startHeight']) ?  $_GET['startHeight'] : 1;
        $this->finishHeight = isset($_GET['finishHeight']) ?  $_GET['finishHeight'] : 5;
        $this->startLength = isset($_GET['startLength']) ?  $_GET['startLength'] : 1;
        $this->finishLength = isset($_GET['finishLength']) ?  $_GET['finishLength'] : 5;
        $this->sort = '(Height*Length*Widht) ASC';
        foreach ($sortMethod as $key => $value) 
        {
            if ((isset($_GET['sort'])) && ($key == $_GET['sort'])) {
                    $this->sort = $value;
            }
        }
    }

    /**
     * Получение массива всех методов сортировки
     */
    public static function getSortArray()
    {
        return [
            'pa' => 'Цена (возрастание)',
            'pd' => 'Цена (убывание)',
            'wa' => 'Ширина (возрастание)',
            'wd' => 'Ширина (убывание)',
            'ha' => 'Высота (возрастание)',
            'hd' => 'Высота (убывание)',
            'la' => 'Длина (возрастание)',
            'ld' => 'Длина (убывание)'
        ];
    }

    /**
     * Поиск товарных предложений в таблице Product согласно свойствам фильтрации
     */
    public function getResultByFilter()
    {
        // Если $this->group == -1, то происходит поиск для всех групп
        $whereGroup = ($this->group == -1) ? "" : 'id_group=' . $this->group . ' AND';
        $query = new Query();
        $query->select('*')
            ->from('Product')
            ->where($whereGroup . '
                    Widht >=:startWidht
                    AND Widht <=:finishWidht
                    AND Height >=:startHeight
                    AND Height <=:finishHeight
                    AND Length >=:startLength
                    AND Length <=:finishLength
                    AND (Height*Length*Widht) >= :startPrice
                    AND (Height*Length*Widht) <= :finishPrise')
            ->orderBy($this->sort)
            ->addParams([
                ':startWidht' =>  $this->startWidht,
                ':finishWidht' =>  $this->finishWidht,
                ':startHeight' =>  $this->startHeight,
                ':finishHeight' =>  $this->finishHeight,
                ':startLength' =>  $this->startLength,
                ':finishLength' =>  $this->finishLength,
                ':startPrice' =>  $this->startPrice,
                ':finishPrise' =>  $this->finishPrise
            ]);
        return $query->createCommand()->queryAll();
    }
}
