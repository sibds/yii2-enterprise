<?php
use yii\helpers\Html;

$user = Yii::$app->user->identity;

$name = $user->profile->name==''?$user->username:$user->profile->name;
?>
<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="http://gravatar.com/avatar/<?= $user->profile->gravatar_id ?>?s=160" class="img-circle" alt="<?=$name?>"/>
    </div>
    <div class="pull-left info">
        <p><?= $name ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>