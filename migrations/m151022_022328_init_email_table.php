<?php

use yii\db\Migration;

class m151022_022328_init_email_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%email}}', [
            'email_id' => $this->primaryKey(),
            //columns
            'purpose' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('customer_email', '{{%email}}', 'customer_id', '{{%customer}}', 'customer_id');
    }

    public function down()
    {
        $this->dropTable('{{%email}}');
        $this->dropForeignKey('customer_email', '{{%email}}');
        // echo "m151022_022328_init_email_table cannot be reverted.\n";

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
