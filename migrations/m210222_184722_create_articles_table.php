<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m210222_184722_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'date_entered' => $this->dateTime()->defaultExpression('NOW()'),
            'name' => $this->string(100),
            'description' => $this->text()->null(),
            'category_id' => $this->integer(),
        ]);

        $this->createIndex('idx-articles-category_id','articles','category_id');

        $this->addForeignKey('fk-articles-category_id','articles','category_id','categories',
'id','SET NULL');

        $this->insert('articles',[
            'name' => 'Top 10 films about artificial intelligence',
            'description' => 'description article 1',
            'category_id' => 3,
        ]);

        $this->insert('articles',[
            'name' => '7 annoying mistakes I made as a JS developer',
            'description' => 'description article 2',
            'category_id' => 3,
        ]);

        $this->insert('articles',[
            'name' => 'Top 10: GitHub appreciated the popularity of programming languages',
            'description' => 'description article 3',
            'category_id' => 3,
        ]);

        $this->insert('articles',[
            'name' => 'Life Above an Abyss: How Spain Got a City on a Rock with a Single Street',
            'description' => 'description article 4',
            'category_id' => 1,
        ]);

        $this->insert('articles',[
            'name' => 'Admission to a top British university in the Chevening program',
            'description' => 'description article 5',
            'category_id' => 2,
        ]);

        $this->insert('articles',[
            'name' => 'World crisis - is it time to enter a foreign university?',
            'description' => 'description article 6',
            'category_id' => 2,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-articles-category_id',
            'articles'
        );

        $this->dropIndex(
            'idx-articles-category_id',
            'articles'
        );

        $this->dropTable('{{%articles}}');
    }
}
