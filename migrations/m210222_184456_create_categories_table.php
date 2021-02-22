<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m210222_184456_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'date_entered' => $this->dateTime()->defaultExpression('NOW()'),
            'name' => $this->string(100),
            'description' => $this->text()->null(),
        ]);

        $this->insert('categories',[
            'name' => 'Nature',
            'description' => 'desc nature',
        ]);

        $this->insert('categories',[
            'name' => 'Education',
            'description' => 'desc education',
        ]);

        $this->insert('categories',[
            'name' => 'Technology',
            'description' => 'desc technology',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
