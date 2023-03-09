<?php

use yii\db\Migration;

/**
 * Class m230308_152028_address
 */
class m230308_152028_address extends Migration
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
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),

            'address' => $this->string()->Null(),
            'country' => $this->string()->Null(),
            'city' => $this->string()->Null(),
            'state' => $this->string()->Null(),
            'zipcode' => $this->integer()->Null(),

            'created_at' => $this->integer()->Null(),
            'updated_at' => $this->integer()->Null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropTable('address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230308_152028_address cannot be reverted.\n";

        return false;
    }
    */
}
