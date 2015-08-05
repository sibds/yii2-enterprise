<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 13.07.15
 * Time: 23:25
 */

namespace backend\helpers;

use Yii;
use yii\helpers\ArrayHelper;

class MenuModules {
    public $theme = false;

    public function __construct(){

    }

    public static function menu(){
        return (new MenuModules())->run();
    }

    public function run(){
        $menu = [];
        $theme = $this->checkOnTheme();

        foreach(\Yii::$app->modules as $moduleName => $module){
            $moduleMenu = [];
            if($theme){
                $moduleMenu = $this->findMenuFileInTheme($moduleName);
            }
            if($moduleMenu==[]){
                $moduleMenu = $this->findMenuFileInViewsPath($moduleName);
                if($moduleMenu==[])
                    $moduleMenu = $this->findMenuFileInModule($moduleName);
            }
            if($moduleMenu!=[])
                $menu = ArrayHelper::merge($menu, $moduleMenu);
        }

        return $menu;
    }

    private function findMenuFileInModule($moduleName){
        $fileMenu = Yii::getAlias('@backend/modules/'.$moduleName.'/views/_menu.php');

        if(file_exists($fileMenu))
            return require($fileMenu);

        return [];
    }

    private function findMenuFileInViewsPath($moduleName){
        $fileMenu = Yii::getAlias('@backend/views/'.$moduleName.'/_menu.php');

        if(file_exists($fileMenu))
            return require($fileMenu);

        return [];
    }

    private function findMenuFileInTheme($moduleName){
        foreach($this->theme as $path){
            $fileMenu = Yii::getAlias($path.'/'.$moduleName.'/_menu.php');

            if(file_exists($fileMenu))
                return require($fileMenu);
        }
        return [];
    }

    private function checkOnTheme(){
        if(is_object(\Yii::$app->view->theme)){
            $this->theme = \Yii::$app->view->theme->pathMap;
            return true;
        }

        return false;
    }
} 