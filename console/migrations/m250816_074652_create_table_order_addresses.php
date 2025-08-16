<?php

use yii\db\Migration;

class m250816_074652_create_table_order_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_addresses', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(255),
            'state' => $this->string(255),
            'country' => $this->string(45),
            'zipcode' => $this->string(45),
        ]);
        $this->addForeignKey('fk_order_addresses_order', 'order_addresses', 'order_id', 'orders', 'id', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250816_074652_create_table_order_addresses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250816_074652_create_table_order_addresses cannot be reverted.\n";

        return false;
    }
    */
}
