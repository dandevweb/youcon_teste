<?php

class Strapi
{
    public static function getData($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_STRAPI_API . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
        ]);

        $res = curl_exec($curl);
        curl_close($curl);
        return json_decode($res);
    }

    public static function menu()
    {
        return self::getData('/menu');
    }

    public static function carrosselHome()
    {
        return self::getData('/projetos');
    }

    public static function dadosSobre()
    {
        return self::getData('/quem-somos');
    }

    public static function dadosPortfolio()
    {
        return self::getData('/portfolio');
    }

    public static function dadosServicos()
    {
        return self::getData('/servicos');
    }

    public static function dadosContato()
    {
        return self::getData('/contatopage');
    }

    public static function dadosCarreiras()
    {
        return self::getData('/trabalhe-conosco');
    }

    public static function projetos()
    {
        return self::getData('/projetos');
    }

    public static function projetoSingle($id)
    {
        return self::getData('/projetos/' . $id);
    }

    public static function dadosFooter()
    {
        return self::getData('/footer');
    }

    public static function contatos()
    {
        return self::getData('/contato');
    }

    public static function whatsapp()
    {
        $dados = self::getData('/contatopage');
        $numero = $dados->numero_whatsapp;
        $saudacao = $dados->saudacao_whatsapp;

        return "https://api.whatsapp.com/send?phone=" . $numero . "&text=" . $saudacao;
    }
}
