<?php

list($controller,$action) = ["site","index"]; //$controller = site,$action = index
$controller = ucfirst($controller); //首字母大写 site=>Site

//call_user_func