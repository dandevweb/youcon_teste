<?php

class Utils
{

    private static $uri;

    public static function carregarPagina()
    {
        self::$uri = $_SERVER['REQUEST_URI'];
        $url = explode('/', self::$uri);
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $fisrtPos = 2;
        } else {
            $fisrtPos = 1;
        }
        if (!empty($url[$fisrtPos])) {
            if ($url[$fisrtPos] == 'painel') {
                ?>
                <script>window.location.href = "<?= PATH_STRAPI ?>/admin";</script>
                <?php
            } elseif (file_exists('pages/' . $url[$fisrtPos] . '.php')) {
                if (isset($url[$fisrtPos + 1])) {
                    include('pages/projeto-detalhe.php');
                } else {
                    include('pages/' . $url[$fisrtPos] . '.php');
                }
            } else {
                include('pages/404.php');
            }
        } else {
            include('pages/home.php');
        }
    }


    public static function mediumImg($path)
    {
        if (isset($path->formats->medium->url)) {
            $url = $path->formats->medium->url;
        } elseif (isset($path->url)) {
            $url = $path->url;
        } else {
            $url = '';
        }

        return $url;
    }

    public static function smallImg($path)
    {
        if (isset($path->formats->small->url)) {
            $url = $path->formats->small->url;
        } elseif (isset($path->url)) {
            $url = $path->url;
        } else {
            $url = '';
        }

        return $url;
    }

    public static function validarArquivo($arquivo)
    {
        if (
            $arquivo['type'] == 'application/pdf' ||
            $arquivo['type'] == 'application/msword' ||
            $arquivo['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ) {
            $tamanho = intval($arquivo['size'] / 1024);
            if ($tamanho < 5000) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function uploadFile($file)
    {
        $formatoArquivo = explode('.', $file['name']);
        $arquivoNome = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
        if (move_uploaded_file($file['tmp_name'], DIR_UPLOAD . '/' . $arquivoNome)) {
            return $arquivoNome;
        } else {
            return false;
        }
    }

    public static function deleteFile($file)
    {
        @unlink(DIR_UPLOAD . '/' . $file);
    }
}
