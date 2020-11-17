<?php

namespace Anax\View;

/**
 * Geolocation
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//var_dump($di);
?><h1><?= $title ?></h1>

<p>Med denna tjänst kan du få fram detaljer utav ditt ip så som närmsta huvudstad, vilket land, longitud, latitud samt kontinent
den innefattar. Till vänster om dessa detaljer visas även en karta med longitud och latitud som parametrar. Dokumentation över
RESTAPI:et finner du <a href="<?= url("documentation/ipvalidator"); ?>">här</a>.</p>

<div class="form-wrapper">
    <form method="post">
        IP:<br>
        <input type="text" name="ipAddress" value="<?= $userIp; ?>"><br><br>
        <input class="button save" type="submit" name="doSubmit" value="SUBMIT">
    </form>
</div>

<?php if ($ipAddress) : ?>
    <?php include "result.php" ?>
<?php endif; ?>