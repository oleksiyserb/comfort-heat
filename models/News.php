<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $picture
 * @property string|null $text
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @return string
     */
    public function getImage()
    {
        if ($this->picture) {
            return Yii::$app->params['storage'] . $this->picture;
        } else {
            return '/no-image.png';
        }
    }
}
