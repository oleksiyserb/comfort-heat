<?php


namespace app\models\forms\subcategory;

use app\models\Subcategory;
use yii\base\Model;

class UpdateSubcategoryForm extends Model
{
    public $id;
    public $categoryId;
    public $title;

    public function rules()
    {
        return [
            [['id', 'categoryId', 'title'], 'required'],
            [['id', 'categoryId'], 'integer'],
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
            $subcategory = Subcategory::findOne($this->id);
            $subcategory->title = $this->title;
            $subcategory->category_id = $this->categoryId;

            if ($subcategory->save()) {
                return true;
            }
        }
    }
}