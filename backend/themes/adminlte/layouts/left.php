<?php
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?=$this->render(
            'widgets/user-left',
            ['directoryAsset' => $directoryAsset]
        )?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php
        $basicMenu = ArrayHelper::merge(
            [
                ['label'=>'<i class="fa fa-dashboard"></i><span>Dashboard</span>', 'url'=>['//site/index']],
            ],
            \mazurva\helpers\MenuModules::menu());

        $adminMenu=[];
        if(Yii::$app->user->identity->isAdmin){

            $adminMenu = [
                '<li class="header">Admin menu</li>',
                [
                    'label' => '<i class="glyphicon glyphicon-signal"></i><span>Audit</span>', //for basic
                    'url' => ['/audit']
                ],
            ];

            if(YII_DEBUG){
                $adminMenu = ArrayHelper::merge($adminMenu,
                    [
                        '<li class="header">Developer menu</li>',
                        ['label' => '<i class="fa fa-file-code-o"></i><span>Gii</span>', 'url' => ['/gii']],
                        ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
                    ]) ;
            }
        }

        ?>
        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => \yii\helpers\ArrayHelper::merge($basicMenu,$adminMenu),
            ]
        );
        ?>
    </section>

</aside>
