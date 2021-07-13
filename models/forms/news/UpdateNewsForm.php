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
class UpdateNewsForm extends Model
{
    public $id;
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
        if ($this->validate()) {
            $news = News::findOne($this->id);
            $news->title = $this->title;
            $news->description = $this->description;
            $news->text = $this->text;
            $news->time_update = time();

            if ($news->save()) {
                return true;
            }
        }
    }

}