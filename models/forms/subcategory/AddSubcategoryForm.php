<?php

namespace app\models\forms\subcategory;

use app\models\Subcategory;
use yii\base\Model;

class AddSubcategoryForm extends Model
{
    public $categoryId;
    public $title;

    public function rules()
    {
        return [
            [['categoryId', 'title'], 'required'],
            [['categoryId'], 'integer'],
            [['title'], 'string', 'length' => [2, 100]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryId' => 'Category',
            'title' => 'Title',
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $subcategory = new Subcategory();

            $subcategory->title = $this->title;
            $subcategory->category_id = $this->categoryId;

            if ($subcategory->save()) {
                return \Yii::$app->db->lastInsertID;
            }
        }
    }
}