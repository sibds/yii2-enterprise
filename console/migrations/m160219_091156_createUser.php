<?php

use yii\db\Migration;

class m160219_091156_createUser extends Migration
{
    public function up()
    {

        $user = \Yii::createObject([
            'class'    => \dektrium\user\models\User::className(),
            'scenario' => 'create',
            'username' => 'webmaster',
            'password' => 'webmaster',
            'email' => 'webmaster@yii2enterprise.dev',
        ]);

        return $user->create();
    }

    public function down()
    {
        echo "m160219_091156_createUser cannot be reverted.\n";

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
