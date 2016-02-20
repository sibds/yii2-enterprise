<?php

use yii\db\Migration;

class m160219_091156_createUser extends Migration
{
    public function up()
    {
        if(isset($_SERVER['TRAVIS'])||(isset($_SERVER['PWD'])&&strpos($_SERVER['PWD'], '/tests/')))
            return null;

        $userName = 'webmaster';

        $tableName = \dektrium\user\models\User::tableName();
        $query = 'SELECT COUNT(*) FROM '.$tableName.' WHERE `username`=:username';
        $count = \Yii::$app->db->createCommand($query, [':username'=>$userName])->queryScalar();
        if($count>0)
            return null;

        $user = \Yii::createObject([
            'class'    => \dektrium\user\models\User::className(),
            'scenario' => 'create',
            'username' => $userName,
            'password' => $userName,
            'email' => $userName.'@yii2enterprise.dev',
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
