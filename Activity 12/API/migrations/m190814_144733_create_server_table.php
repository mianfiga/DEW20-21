<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%server}}`.
 */
class m190814_144733_create_server_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%server}}', [
            'id' => $this->primaryKey(),
            'URL'=> $this->string(),
            'service_id' =>$this->integer()->notNull(),
        ]);
        $this->addForeignKey('FKService', '{{%server}}', 'service_id', '{{%service}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%server}}');
    }
}
