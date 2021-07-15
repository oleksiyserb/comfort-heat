<?php


namespace app\models\forms\product;


use app\models\Product;
use yii\base\Model;

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
 * @property string|null $time_create
 * @property int $subcategoryId
 * @property int|null $status
 *
 * @property Product $product
 */
class UpdateProductForm extends Model
{
    public $id;
    public $title;
    public $price;
    public $model;
    public $maker;
    public $description;
    public $characteristic;
    public $time_update;
    public $subcategoryId;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer', 'length' => [1, 10]],
            [['title', 'price', 'subcategoryId', 'status'], 'required'],
            [['subcategoryId', 'status', 'time_update'], 'integer'],
            [['title', 'model', 'maker'], 'string', 'max' => 255],
            [['description', 'characteristic'], 'string']
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
            'time_create' => 'Time create',
            'time_update' => 'Time update',
            'subcategoryId' => 'Subcategory ID',
            'status' => 'Status',
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $product = Product::findOne($this->id);
            $product->title = $this->title;
            $product->price = $this->price;
            $product->model = $this->model;
            $product->maker = $this->maker;
            $product->description = $this->description;
            $product->characteristic = $this->characteristic;
            $product->time_update = time();
            $product->subcategory_id = $this->subcategoryId;
            $product->status = $this->status;

            if ($product->save()) {
                return true;
            }
        }
    }

}