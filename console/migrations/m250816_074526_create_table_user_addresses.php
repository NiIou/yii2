<?php

use yii\db\Migration;

class m250816_074526_create_table_user_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_addresses', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(255),
            'state' => $this->string(255),
            'country' => $this->string(45),
            'zipcode' => $this->string(45),
        ]);
        $this->addForeignKey('fk_user_addresses_user', 'user_addresses', 'user_id', 'users', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250816_074526_create_table_user_addresses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250816_074526_create_table_user_addresses cannot be reverted.\n";

        return false;
    }
    */
}
