<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $price
 * @property string|null $model
 * @property string|null $maker
 * @property string|null $description
 * @property string|null $characteristic
 * @property string|null $picture
 * @property int $subcategory_id
 * @property int|null $status
 *
 * @property Subcategory $subcategory
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'subcategory_id', 'status'], 'integer'],
            [['description', 'characteristic'], 'string'],
            [['subcategory_id'], 'required'],
            [['title', 'model', 'maker', 'picture'], 'string', 'max' => 255],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['subcategory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'model' => 'Model',
            'maker' => 'Maker',
            'description' => 'Description',
            'characteristic' => 'Characteristic',
            'picture' => 'Picture',
            'subcategory_id' => 'Subcategory ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Subcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::className(), ['id' => 'subcategory_id']);
    }
}
