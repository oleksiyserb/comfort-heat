<?php


namespace app\models\forms\news;

use app\models\News;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $picture
 * @property string|null $text
 */
class NewsForm extends Model
{
    public $title;
    public $description;
    public $text;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'text'], 'string']
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
            'description' => 'Description',
            'picture' => 'Picture',
            'text' => 'Text',
        ];
    }

    public function save()
    {
        $news = new News();
        $news->title = $this->title;
        $news->description = $this->description;
        $news->text = $this->text;
        $news->time_create = time();

        if ($news->save()) {
            return Yii::$app->db->lastInsertID;
        }
    }

}