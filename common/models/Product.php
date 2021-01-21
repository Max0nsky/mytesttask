<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * Модель для таблицы "Product".
 *
 * @property int $id
 * @property int $id_group
 * @property int $Widht
 * @property int $Height
 * @property int $Length
 * @property int $Quantity
 *
 * @property Group $group
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'Widht', 'Height', 'Length', 'Quantity'], 'required'],
            [['id_group', 'Widht', 'Height', 'Length', 'Quantity'], 'integer'],
            [['Widht', 'Height', 'Length'], 'integer', 'min' => 1, 'max' => 5],
            [['Quantity'], 'integer', 'min' => 1, 'max' => 999],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['id_group' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group' => 'Id группы',
            'Widht' => 'Ширина',
            'Height' => 'Высота',
            'Length' => 'Длина',
            'Quantity' => 'Количество',
        ];
    }

    /**
     * Получить группу
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'id_group']);
    }

}
