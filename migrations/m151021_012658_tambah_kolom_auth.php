<?php

use yii\db\Migration;

class m151021_012658_tambah_kolom_auth extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'auth_key', $this->string()->notNull());
    }

    public function down()
    {
        // echo "m151021_012658_tambah_kolom_auth cannot be reverted.\n";

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
