<?php

use yii\db\Migration;

class m151022_021043_init_address_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%address}}', [
            'address_id' => $this->primaryKey(),
            //columns
            'purpose' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'state' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'building' => $this->string()->notNull(),
            'apartment' => $this->string()->notNull(),
            'reciever_name' => $this->string()->notNull(),
            'postal_code' => $this->string()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->addForeignKey('customer_address', '{{%address}}', 'customer_id', '{{%customer}}', 'customer_id');
    }

    public function down()
    {
        // echo "m151022_021043_init_address_table cannot be reverted.\n";

        $this->dropTable('{{%address}}');
        $this->dropForeignKey('customer_address', '{{%address}}');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
