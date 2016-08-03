<?php
require_once 'define.php';
include_once 'html/header.php';
?>
<div class="theme-showcase" role="main">
    <div class="page-header">
        <h1><i class="fa fa-envelope-o"></i>Svatební oznámení</h1>
    </div>
    <p>Ti, co nedostali oznámení do ruky, si můžou aspoň kliknout na obrázek, aby o nic nepřišli.</p>
    <div class="pozvanka text-center">
        <img src="soubory/oznameni_bez_obalky.png" id="pozvani" alt="Pozvání k obřadu" title="Klikni" />
        <img src="soubory/oznameni_obalka.png" id="obalka" alt="Pozvání k obřadu - obálka" title="Klikni" />
    </div>
</div>
<?php
include_once 'html/footer.php';
?>