<?php

use yii\db\Migration;

class m151020_085031_init_customer_phone extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%phone}}', [
            'phone_id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'number' => $this->string()->notNull(),
            //columns
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('customer_id', '{{%phone}}', 'customer_id', $unique = true);

        $this->addForeignKey('customer_phone_number', '{{%phone}}', 'customer_id', '{{%customer}}', 'customer_id');
    }

    public function down()
    {
        $this->dropForeignKey('customer_phone_number', '{{%phone}}');
        $this->dropTable('{{%phone}}');

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
