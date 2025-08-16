<?php

use yii\db\Migration;

class m250816_074640_create_table_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'total_price' => $this->decimal(10,2)->notNull(),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'firstname' => $this->string(45)->notNull(),
            'lastname' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull(),
            'transaction_id' => $this->string(45),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
        ]);
        $this->addForeignKey('fk_orders_user', 'orders', 'created_by', 'users', 'id', 'SET NULL');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250816_074640_create_table_orders cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250816_074640_create_table_orders cannot be reverted.\n";

        return false;
    }
    */
}
