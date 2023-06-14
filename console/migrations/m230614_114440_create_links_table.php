<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m230614_114440_create_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'url' => $this->text(),
            'hash' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
