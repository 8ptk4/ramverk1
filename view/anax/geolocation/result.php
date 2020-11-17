<?php

namespace Anax\View;

/**
 * Result.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

//var_dump($data);
?>
<?php if ($status) : ?>
    <div style="display: flex; justify-content: space-between;">
        <div>
            <h1>
                <?= $ipAddress ?>
            </h1>

            <iframe width="425" height="350" frameborder="0" scrolling="no"
            marginheight="0" marginwidth="0" zoom="-10"
            src="https://www.openstreetmap.org/export/embed.html?bbox=<?= $data['longitude']; ?>%2C<?= $data['latitude']; ?>%2C<?= $data['longitude']; ?>%2C<?= $data['latitude']; ?>&amp;layer=mapnik&amp;marker=<?= $data['longitude']; ?>%2C<?= $data['latitude']; ?>"
            style="border: 1px solid #4b57b7; box-shadow: 0 0 10px 2px #34065c;"></iframe>
            <br/><small>
            <a href="https://www.openstreetmap.org/?mlat=53.5627&amp;mlon=-2.3700#map=12/53.5626/-2.3698">
            Större karta</a></small>
        </div>
        <div>
            <h1>Information</h1>
            <p>Typ: <span style="color: rgb(52, 101, 164);"><?= $data['type']; ?></span></p>
            <p>Longitud: <span style="color: rgb(52, 101, 164);"><?= $data['longitude']; ?></span></p>
            <p>Latitud: <span style="color: rgb(52, 101, 164);"><?= $data['latitude']; ?></span></p>
            <p>Land: <span style="color: rgb(52, 101, 164);"><?= $data['country_name']; ?></span></p>
            <p>Kontinent: <span style="color: rgb(52, 101, 164);"><?= $data['continent_name']; ?></span></p>
            <p>Huvudstad: <span style="color: rgb(52, 101, 164);"><?= $data['location']['capital']; ?></span><p>
        </div>
    </div>
<?php else : ?>
    <div>
        <span style="color: rgb(52, 101, 164);">Inte en giltig ip-address!</span>
    </div>
<?php endif; ?>
