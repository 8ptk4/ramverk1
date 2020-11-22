<?php

namespace Anax\View;

/**
 * Geolocation
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//var_dump($di);
?><h1><?= $title ?></h1>

<p>
    The documentation behind this service can be found <a href="<?= url("documentation/geolocation"); ?>">here</a>
</p>

<div class="form-wrapper">
    <form method="post">
        <label>ipv4 or ipv6</label>
        <input type="text" name="ipAddress" value="<?= $userIp; ?>"><br><br>
        <input class="button save" type="submit" name="doSubmit" value="SUBMIT">
    </form>
</div>

<?php if ($ipAddress) : ?>
    <?php include "result.php" ?>
<?php endif; ?>