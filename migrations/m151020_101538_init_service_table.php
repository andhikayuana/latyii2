<?php

use yii\db\Migration;

class m151020_101538_init_service_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%service}}', [
            'service_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'hourly_rate' => $this->integer()->notNull(),
            //columns
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        // echo "m151020_101538_init_service_table cannot be reverted.\n";

        $this->dropTable('{{%service}}');
        
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
