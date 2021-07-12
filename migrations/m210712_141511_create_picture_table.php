<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%picture}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m210712_141511_create_picture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%picture}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'picture' => $this->string()->notNull(),
            'mini' => $this->string()->notNull()
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-picture-product_id}}',
            '{{%picture}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-picture-product_id}}',
            '{{%picture}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-picture-product_id}}',
            '{{%picture}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-picture-product_id}}',
            '{{%picture}}'
        );

        $this->dropTable('{{%picture}}');
    }
}
