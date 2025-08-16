<?php

use yii\db\Migration;

class m250816_074621_create_table_cart_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cart_items', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_cart_items_product', 'cart_items', 'product_id', 'products', 'id', 'CASCADE');
        $this->addForeignKey('fk_cart_items_user', 'cart_items', 'user_id', 'users', 'id', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250816_074621_create_table_cart_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250816_074621_create_table_cart_items cannot be reverted.\n";

        return false;
    }
    */
}
