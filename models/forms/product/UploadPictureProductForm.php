<?php


namespace app\models\forms\product;

use Yii;
use app\components\Storage;
use app\models\Picture;
use yii\base\Model;

class UploadPictureProductForm extends Model
{
    public $image;
    public $productId;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true],
            [['productId'], 'integer'],
            [['image'], 'required']
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = '/uploads/product/';

        $fileUpload->imageWidth = 900;
        $fileUpload->imageHeight = 700;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = new Picture();

        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->picture = $fileTableName;
            $image->product_id = $this->productId;
            $image->mini = 'mini';
            if ($image->save()) {
                $id = Yii::$app->db->getLastInsertID();
                if ($this->addMini($file, $id)) {
                    return true;
                }
            }
        }
    }

    public function addMini($file, $id)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = '/product/mini/';
        $fileUpload->imageWidth = 200;
        $fileUpload->imageHeight = 200;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = Picture::findOne($id);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->mini = $fileTableName;

            if ($image->save()) {
                return true;
            }
        }
    }
}