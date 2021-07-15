<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

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
    const STATUS_VISIBLE = 1;
    const STATUS_UNVISIBLE = 2;
    const SHOW_LIMIT_PRODUCTS = 8;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
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

    /**
     * Gets query for [[Picture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPicture()
    {
        return $this->hasMany(Picture::className(), ['product_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getSubcategoriesArray()
    {
         return ArrayHelper::map(Subcategory::find()->all(), 'id', 'title');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return ($this->status == '1') ? 'Видно на сайті'  : 'Не видно на сайті';
    }

    /**
     * @return mixed
     */
    public static function getProducts()
    {
        $query = Product::find()
            ->with('picture')
            ->where(['status' => self::STATUS_VISIBLE]);
        $countProducts = $query->count();
        $pages = new Pagination(['totalCount' => $countProducts, 'pageSize' => self::SHOW_LIMIT_PRODUCTS]);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $data['products'] = $products;
        $data['pages'] = $pages;

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getSubcategoryProducts($id)
    {
        $query = Product::find()
            ->where(['subcategory_id' => $id, 'status' => self::STATUS_VISIBLE]);

        $countProducts = $query->count();
        $pages = new Pagination(['totalCount' => $countProducts, 'pageSize' => self::SHOW_LIMIT_PRODUCTS]);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $data['subcategoryProducts'] = $products;
        $data['pages'] = $pages;

        return $data;
    }
}
