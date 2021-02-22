<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags}}`.
 */
class m210222_185628_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'date_entered' => $this->dateTime()->defaultExpression('NOW()'),
            'name' => $this->string(100),
            'description' => $this->text()->null(),
            'article_id' => $this->integer(),
        ]);

        $this->createIndex('idx-tags-tags','tags','article_id');

        $this->addForeignKey('fk-tags-tags','tags','article_id','articles',
'id','SET NULL');

        $this->insert('tags',[
            'name' => '#savenature',
            'description' => '',
            'article_id' => 1,
        ]);

        $this->insert('tags',[
            'name' => '#travel',
            'description' => '',
            'article_id' => 1,
        ]);

        $this->insert('tags',[
            'name' => '#naturephotography',
            'description' => '',
            'article_id' => 1,
        ]);

        $this->insert('tags',[
            'name' => '#php',
            'description' => '',
            'article_id' => 3,
        ]);

        $this->insert('tags',[
            'name' => '#js',
            'description' => '',
            'article_id' => 3,
        ]);

        $this->insert('tags',[
            'name' => '#github',
            'description' => '',
            'article_id' => 3,
        ]);

        $this->insert('tags',[
            'name' => '#frameworks',
            'description' => '',
            'article_id' => 3,
        ]);

        $this->insert('tags',[
            'name' => '#education',
            'description' => '',
            'article_id' => 2,
        ]);

        $this->insert('tags',[
            'name' => '#learning',
            'description' => '',
            'article_id' => 2,
        ]);

        $this->insert('tags',[
            'name' => '#students',
            'description' => '',
            'article_id' => 2,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-tags-article_id',
            'tags'
        );

        $this->dropIndex(
            'idx-tags-article_id',
            'tags'
        );

        $this->dropTable('{{%tags}}');
    }
}
