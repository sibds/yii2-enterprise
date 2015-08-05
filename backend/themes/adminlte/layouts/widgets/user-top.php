<?php
use yii\helpers\Html;

$user = Yii::$app->user->identity;

$name = $user->profile->name==''?$user->username:$user->profile->name;

?>
<!-- User Account: style can be found in dropdown.less -->

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="http://gravatar.com/avatar/<?= $user->profile->gravatar_id ?>?s=160" class="user-image" alt="<?=$name?>"/>

        <span class="hidden-xs"><?=$name?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="http://gravatar.com/avatar/<?= $user->profile->gravatar_id ?>?s=160"
                 class="user-image"
                 alt="<?=$name?>"/>

            <p>
                <?=$name?> <?php //- Web Developer ?>
                <small>Member since <?=Yii::$app->formatter->asDatetime($user->created_at, 'MMM. yyyy')?></small>
            </p>
        </li>
        <!-- Menu Body -->
        <?php /*
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        */ ?>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <?= Html::a(
                    'Profile',
                    ['/user/settings/profile'],
                    ['class' => 'btn btn-default btn-flat']
                ) ?>
            </div>
            <div class="pull-right">
                <?= Html::a(
                    'Sign out',
                    ['/user/security/logout'],
                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                ) ?>
            </div>
        </li>
    </ul>
</li>

<!-- User Account: style can be found in dropdown.less -->