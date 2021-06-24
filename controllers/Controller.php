<?php

abstract class Controller {
    var $state;

    abstract public function error();

    public function loadView($view) {
        ob_start();
        include("views/".$view.".php");
        $content = ob_get_contents();
        ob_clean();

        return $content;
    }
}

?>