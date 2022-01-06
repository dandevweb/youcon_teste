<?php

include('config.php');


// if (mb_strpos($_SERVER['HTTP_HOST'], 'www') !== false || $_SERVER["REQUEST_SCHEME"] != 'https') {
//     header('Location: ' . INCLUDE_PATH);
// }

$menu = Strapi::menu();
$contato = Strapi::contatos();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- color of address bar in mobile browser -->
    <meta name="theme-color" content="#28292C">
    <!-- favicon  -->
    <link rel="shortcut icon" href="<?= INCLUDE_PATH ?>/img/favicon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/plugins/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/plugins/font-awesome.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/plugins/swiper.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/plugins/fancybox.min.css">
    <!-- mapbox css -->
    <link href="<?= INCLUDE_PATH ?>/css/plugins/mapbox-style.css" rel='stylesheet'>
    <!-- main css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/style-light.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/css/style.css">

    <title><?= ucfirst($page) ?> - Youcon</title>

    <!-- Google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= SITE_KEY ?>"></script>
    
</head>

<body>
    <div class="overlay-loading">
        <img src="<?= INCLUDE_PATH ?>/img/ajax-loader.gif" />
    </div> <!--overlay-loading-->
    <div class="mry-app">
        <!-- preloader -->
        <div class="mry-preloader mry-active">
            <div class="mry-preloader-content">
                <img class="mry-logo mry-mb-20" src="<?= Utils::smallImg($menu->logo) ?>" alt="Youcon">
                <div class="mry-loader-bar">
                    <div class="mry-loader"></div>
                </div>
                <div class="mry-label">Por favor, espere</div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- cursor -->
        <!-- <div class="mry-magic-cursor">
            <div class="mry-ball">
                <div class="mry-loader">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                        xml:space="preserve">
                        <path
                            d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25"
                                to="360 25 25" dur="0.6s" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>
            </div>
        </div> -->
        <!-- cursor end -->

        <!-- top panel -->
        <div class="mry-top-panel">
            <div class="mry-logo-frame">
                <a href="<?= INCLUDE_PATH ?>" class="mry-default-link mry-anima-link">
                    <img class="mry-logo" src="<?= Utils::smallImg($menu->logo) ?>" alt="Youcon">
                </a>
            </div>
            <div class="mry-menu-button-frame">
                <div class="mry-label">Menu</div>

                <div class="mry-menu-btn mry-magnetic-link">
                    <div class="mry-burger mry-magnetic-object">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- top panel end -->

        <!-- menu -->
        <div class="mry-menu">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <nav id="mry-dynamic-menu">
                            <ul>
                                <?php foreach ($menu->link as $link) : ?>
                                <li class="menu-item"><a href="<?= INCLUDE_PATH . $link->url ?>" class="mry-anima-link mry-default-link"><?= $link->label ?></a>
                                </li>
                                
                                <?php endforeach ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="mry-info-box-frame">
                            <div class="mry-info-box">
                                <div class="mry-mb-20">
                                    <div class="mry-label mry-mb-5">Estado:</div>
                                    <div class="mry-text"><?= $contato->estado ?></div>
                                </div>
                                <?php foreach ($contato->lougradouro as $endereco) : ?>
                                <div class="mry-mb-20">
                                    <div class="mry-label mry-mb-5">Endereço <?= $endereco->id ?>:</div>
                                    <div class="mry-text"><?= $endereco->enderecos ?></div>
                                    <div class="mry-text"><?= $endereco->cidades ?></div>
                                </div>
                                <?php endforeach ?>
                                <div class="mry-mb-20">
                                    <div class="mry-label mry-mb-5">Email:</div>
                                    <a class="mry-text" href="mailto:<?= $contato->email ?>"><?= $contato->email ?></a>
                                </div>
                                <div class="mry-mb-20">
                                    <div class="mry-label mry-mb-5">Telefone:</div>
                                    <a class="mry-text" href="tel:<?= $contato->telefone ?>"><?= $contato->telefone ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu end -->

  <?php
    Utils::carregarPagina();

    ?>

</div>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('<?= SITE_KEY ?>', {action: 'submit'}).then(function(token) {
            document.getElementById('g-token').value = token;
        });
    })
    
</script>


<!-- jquery js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- tween max js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/tween-max.min.js"></script>
<!-- scroll magic js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/scroll-magic.js"></script>
<!-- scroll magic gsap plugin js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/scroll-magic-gsap-plugin.js"></script>
<!-- swiper js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/swiper.min.js"></script>
<!-- isotope js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/isotope.min.js"></script>
<!-- fancybox js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/fancybox.min.js"></script>
<!-- mapbox js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/mapbox.min.js"></script>
<!-- smooth scrollbar js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/smooth-scrollbar.min.js"></script>
<!-- overscroll js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/overscroll.min.js"></script>
<!-- canvas js -->
<!-- <script src="<?= INCLUDE_PATH ?>/js/plugins/canvas.js"></script> -->
<!-- parsley js -->
<script src="<?= INCLUDE_PATH ?>/js/plugins/parsley.min.js"></script>
<!-- main js -->
<script src="<?= INCLUDE_PATH ?>/js/main.js"></script>
<script src="<?= INCLUDE_PATH ?>/js/jquery.mask.js"></script>
<script src="<?= INCLUDE_PATH ?>/js/scripts.js"></script>


</body>

</html>