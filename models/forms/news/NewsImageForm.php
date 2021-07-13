<?php


namespace app\models\forms\news;


use app\components\Storage;
use app\models\News;
use Yii;
use yii\base\Model;

class NewsImageForm extends Model
{
    public $image;
    public $newsId;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true],
            [['newsId'], 'integer'],
            [['image'], 'required']
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'news/';

        $fileUpload->imageWidth = 900;
        $fileUpload->imageHeight = 700;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = News::findOne($this->newsId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->picture = $fileTableName;
            if ($image->save()) {
                return true;
            }
        }
    }

}