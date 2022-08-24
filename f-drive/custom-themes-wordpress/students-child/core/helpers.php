<?php
function have_action($actions){
    return file_exists($actions);
    }
function action($action){
        $actions = __DIR__.'./actions/'.$action.'.php';
        if(have_action($actions)):
            return realpath($actions);
            else:
                return __DIR__.'./actions/fallback.php';
            endif;
    }
function app(){
    return realpath('./../../bootstrap/app.php');
    }
?>