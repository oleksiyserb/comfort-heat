<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property int $product_id
 * @property string $picture
 * @property string $mini
 *
 * @property Product $product
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'picture', 'mini'], 'required'],
            [['product_id'], 'integer'],
            [['picture', 'mini'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'picture' => 'Picture',
            'mini' => 'Mini',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return string
     */
    public function getMini()
    {
        if ($this->mini) {
            return Yii::$app->params['storage'] . $this->mini;
        } else {
            return '/no-image.png';
        }
    }
}
