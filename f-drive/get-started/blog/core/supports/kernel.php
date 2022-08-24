<?php

require_once __DIR__.'/helper.php';

if (isset($_POST['action'])) {
    require_once action($_POST['action']);
}
