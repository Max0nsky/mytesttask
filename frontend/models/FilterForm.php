<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

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

    public function rules()
    {
        return [
            [['startPrice', 'finishPrise', 'group', 'startWidht', 'finishWidht', 'startHeight', 'finishHeight', 'startLength', 'finishLength'], 'required'],
            [['startWidht', 'finishWidht', 'startHeight', 'finishHeight', 'startLength', 'finishLength'], 'integer', 'min' => 1, 'max' => 5],
            [['startPrice', 'finishPrise'], 'integer', 'min' => 1, 'max' => 125],
            [['group'], 'integer'],
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
        ];
    }

    /**
     * Установка свойств фильтрации из GET или по умолчанию
     */
    public function setPropertiesByGet()
    {
        $this->startPrice = isset($_GET['startPrice']) ?  $_GET['startPrice'] : 1;
        $this->finishPrise = isset($_GET['finishPrise']) ?  $_GET['finishPrise'] : 125;
        $this->group = isset($_GET['group']) ?  $_GET['group'] : -1;
        $this->startWidht = isset($_GET['startWidht']) ?  $_GET['startWidht'] : 1;
        $this->finishWidht = isset($_GET['finishWidht']) ?  $_GET['finishWidht'] : 5;
        $this->startHeight = isset($_GET['startHeight']) ?  $_GET['startHeight'] : 1;
        $this->finishHeight = isset($_GET['finishHeight']) ?  $_GET['finishHeight'] : 5;
        $this->startLength = isset($_GET['startLength']) ?  $_GET['startLength'] : 1;
        $this->finishLength = isset($_GET['finishLength']) ?  $_GET['finishLength'] : 5;
    }

    /**
     * Поиск товарных предложений в таблице Product согласно свойствам фильтрации
     */
    public function getResultByFilter()
    {
        // Если $this->group == -1, то происходит поиск для всех групп
        if ($this->group == -1) {
            return Yii::$app->db->createCommand('
                SELECT *
                FROM Product 
                WHERE Widht >=:startWidht
                AND Widht <=:finishWidht
                AND Height >=:startHeight
                AND Height <=:finishHeight
                AND Length >=:startLength
                AND Length <=:finishLength
                AND (Height*Length*Widht) >= :startPrice
                AND (Height*Length*Widht) <= :finishPrise
                ')
                ->bindValue(':startWidht', $this->startWidht)
                ->bindValue(':finishWidht', $this->finishWidht)
                ->bindValue(':startHeight', $this->startHeight)
                ->bindValue(':finishHeight', $this->finishHeight)
                ->bindValue(':startLength', $this->startLength)
                ->bindValue(':finishLength', $this->finishLength)
                ->bindValue(':startPrice', $this->startPrice)
                ->bindValue(':finishPrise', $this->finishPrise)
                ->queryAll();
        } else {
            return Yii::$app->db->createCommand('
                SELECT *
                FROM Product 
                WHERE id_group=:id_group 
                AND Widht >=:startWidht
                AND Widht <=:finishWidht
                AND Height >=:startHeight
                AND Height <=:finishHeight
                AND Length >=:startLength
                AND Length <=:finishLength
                AND (Height*Length*Widht) >= :startPrice
                AND (Height*Length*Widht) <= :finishPrise
                ')
                ->bindValue(':id_group', $this->group)
                ->bindValue(':startWidht', $this->startWidht)
                ->bindValue(':finishWidht', $this->finishWidht)
                ->bindValue(':startHeight', $this->startHeight)
                ->bindValue(':finishHeight', $this->finishHeight)
                ->bindValue(':startLength', $this->startLength)
                ->bindValue(':finishLength', $this->finishLength)
                ->bindValue(':startPrice', $this->startPrice)
                ->bindValue(':finishPrise', $this->finishPrise)
                ->queryAll();
        }
    }
}
