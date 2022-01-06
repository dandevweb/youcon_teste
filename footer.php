<?php

$footer = Strapi::dadosFooter();

?>
            <div class="mry-footer-copy">
                <div class="container">
                    <div><?= $footer->copyright ?></div>
                    <ul class="mry-social">
                    <?php foreach ($footer->socialLink as $social) : ?>
                        <li><a href="<?= $social->url ?>" target="_blank"><i
                                    class="fab fa-<?= strtolower($social->socialNetwork) ?>"></i></a></li>
                    <?php endforeach ?>

                    </ul>
                    <div>Desenvolvido por <a href="https://agenciaecos.com/" class="text-primary" target="_blank">Agência
                            Ecos</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

    </div>

</div>
<a href="<?= Strapi::whatsapp() ?>" class="float-whats" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
</div>