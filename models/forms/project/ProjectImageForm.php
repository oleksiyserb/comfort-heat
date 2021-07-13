<?php


namespace app\models\forms\project;


use app\components\Storage;
use app\models\Project;
use Yii;
use yii\base\Model;

class ProjectImageForm extends Model
{
    public $image;
    public $projectId;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true],
            [['projectId'], 'integer'],
            [['image'], 'required']
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/';

        $fileUpload->imageWidth = 900;
        $fileUpload->imageHeight = 700;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = Project::findOne($this->projectId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->picture = $fileTableName;
            if ($image->save()) {
                return true;
            }
        }
    }

}