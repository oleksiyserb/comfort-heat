<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

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
    const STATUS_SEE = 1;
    const SHOW_LIMIT_ARTICLES = 8;
    const LIMIT_PROPOSITIONS = 2;
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

    /**
     * @return mixed
     */
    public static function getArticles()
    {
        $query = News::find()
            ->where(['status' => self::STATUS_SEE]);
        $countArticles = $query->count();
        $pages = new Pagination(['totalCount' => $countArticles, 'pageSize' => self::SHOW_LIMIT_ARTICLES]);

        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pages'] = $pages;

        return $data;
    }
}
