<?php


namespace app\models\forms\project;


use app\models\Project;
use yii\base\Model;

class UpdateProjectForm extends Model
{
    public $id;
    public $title;
    public $text;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'picture' => 'Picture',
            'text' => 'Text',
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $project = Project::findOne($this->id);
            $project->title = $this->title;
            $project->text = $this->text;
            $project->time_update = time();

            if ($project->save()) {
                return true;
            }
        }
    }

}