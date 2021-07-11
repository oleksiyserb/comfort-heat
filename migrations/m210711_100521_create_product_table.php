<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subcategory}}`
 */
class m210711_100521_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'price' => $this->integer(10),
            'model' => $this->string(),
            'maker' => $this->string(),
            'description' => $this->text(),
            'characteristic' => $this->text(),
            'picture' => $this->string(),
            'subcategory_id' => $this->integer()->notNull(),
            'status' => $this->integer(10),
        ]);

        // creates index for column `subcategory_id`
        $this->createIndex(
            '{{%idx-product-subcategory_id}}',
            '{{%product}}',
            'subcategory_id'
        );

        // add foreign key for table `{{%subcategory}}`
        $this->addForeignKey(
            '{{%fk-product-subcategory_id}}',
            '{{%product}}',
            'subcategory_id',
            '{{%subcategory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%subcategory}}`
        $this->dropForeignKey(
            '{{%fk-product-subcategory_id}}',
            '{{%product}}'
        );

        // drops index for column `subcategory_id`
        $this->dropIndex(
            '{{%idx-product-subcategory_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
