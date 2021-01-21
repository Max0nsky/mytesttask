<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * Модель для таблицы "Group".
 *
 * @property int $id
 * @property string $name
 *
 * @property Product[] $products
 */
class Group extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Получить продукты
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_group' => 'id']);
    }
}
