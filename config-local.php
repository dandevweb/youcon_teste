<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');
$autoload = function ($class) {
    if ($class == 'Email') {
        require_once('classes/phpmailer/PHPMailerAutoload.php');
    }
    include('classes/' . $class . '.php');
};

spl_autoload_register($autoload);

$page = explode('/', $_SERVER['REQUEST_URI'])[2] == '' ? 'home' : explode('/', $_SERVER['REQUEST_URI'])[2];



/**
 * Endereço do Site
 */
define('INCLUDE_PATH', 'http://' . $_SERVER['SERVER_NAME'] . '/youcon');

/**
 * Endereço do STRAPI
 */
const PATH_STRAPI = 'http://localhost:1337';

const DIR_UPLOAD = __DIR__ . '/uploads';

/**
 * Endereço API STRAPI
 */
const URL_STRAPI_API = PATH_STRAPI;


/*CONSTANTES DE EMAIL */
const MAIL_SENDER = 'contato@youconprojetos.com.br';
const MAIL_PASS = 'Alterar*123';
const SMTP_HOST = 'smtp.uni5.net';
const MAIL_TITLE = 'Nova mensagem do Site YOUCON';
const MAIL_RECEIVE = 'magrao.dan@gmail.com';
const NAME_RECEIVE = 'Comercial Youcon';
const MAIL_RECEIVE_CARREIRAS = 'magrao.dan@gmail.com';
const NAME_RECEIVE_CARREIRAS = 'RH Youcon';




 /**CONEXÃO COM O BANCO DE DADOS*/
const HOST = '';
const DATABASE = '';
const USER = '';
const PASSWORD = '';

    /**
 * CHAVES GOOGLE RECAPTCHA
 * Criadas para o domínio ""
 */
const SITE_KEY = '6LcJr_IdAAAAAD835UqqmtM5LcEZzxDg51WCEpG1';

const SECRET_KEY = '6LcJr_IdAAAAAMvvKMFov9bVfaTfCL2L1smV4W4E';
