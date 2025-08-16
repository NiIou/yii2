<?php

use yii\db\Migration;

class m250816_074819_create_table_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(255)->notNull(),
            'product_id' => $this->integer()->notNull(),
            'unit_price' => $this->decimal(10,2)->notNull(),
            'order_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_order_items_product', 'order_items', 'product_id', 'products', 'id', 'CASCADE');
        $this->addForeignKey('fk_order_items_order', 'order_items', 'order_id', 'orders', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250816_074819_create_table_order_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250816_074819_create_table_order_items cannot be reverted.\n";

        return false;
    }
    */
}
