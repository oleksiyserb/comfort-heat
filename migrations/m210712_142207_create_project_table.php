<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m210712_142207_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'picture' => $this->string(),
            'text' => $this->text(),
            'time_create' => $this->integer(),
            'time_update' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}
