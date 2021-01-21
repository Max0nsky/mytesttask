<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * Модель для таблицы "Product".
 *
 * @property int $id
 * @property int $id_group
 * @property int $Widht
 * @property int $Height
 * @property int $Lenght
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
            [['id_group', 'Widht', 'Height', 'Lenght', 'Quantity'], 'required'],
            [['id_group', 'Widht', 'Height', 'Lenght', 'Quantity'], 'integer'],
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
            'id_group' => 'Id Group',
            'Widht' => 'Widht',
            'Height' => 'Height',
            'Length' => 'Lenght',
            'Quantity' => 'Quantity',
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
