<?php

abstract class AbstractController
{
    protected function render($view, $data = []) {
        extract($data);

        include_once './views/layout.php';
    }
}