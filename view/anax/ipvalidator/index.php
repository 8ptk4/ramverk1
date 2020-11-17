<?php

namespace Anax\View;

/**
 * Ip Validator
 */
?><h1><?= $title ?></h1>

<p>Tool to check if a ip-adress is of valid ipv4 or ipv6 type. Documentation for the api can be found <a href="<?= url("documentation/ipvalidator"); ?>">here</a>.</p>

<div class="form-wrapper">
    <form method="post">
        IP:<br>
        <input type="text" name="ipAddress" value="<?=$_SERVER['REMOTE_ADDR']; ?>"><br><br>
        <input class="button save" type="submit" name="doSubmit" value="SUBMIT">
    </form>
</div>

<?php if ($ipAddress) : ?>
    <?php include "result.php" ?>
<?php endif ?>