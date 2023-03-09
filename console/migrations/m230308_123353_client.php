<?php

use yii\db\Migration;

/**
 * Class m230308_123353_client
 */
class m230308_123353_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        // Creacion de la tabla del cliente
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'phone' => $this->string()->Null(),

            'created_at' => $this->integer()->Null(),
            'updated_at' => $this->integer()->Null(),
        ], $tableOptions);
    }
    // 'username' => $this->string()->notNull()->unique(),

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('client');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230308_123353_client cannot be reverted.\n";

        return false;
    }
    */
}
