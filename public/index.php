<?php

declare(strict_types= 1);

# VARIÁVEL ROOT = STRING COM O CAMINHO DO DIRETÓRIO RAIZ
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

# define as constantes com o caminho dos diretorios
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('TRANSACTIONS_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require VIEWS_PATH . 'transactions.php';



