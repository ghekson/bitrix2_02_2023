<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<table border="1">
    <tr>
        <?php
        foreach ($arResult['HEADER'] as $header) {
            ?>
            <td><?= $header ?></td>
            <?php
        }
        ?>
    </tr>
    <?php
    foreach ($arResult['PROFILES'] as $profile) {
        ?>
        <tr>
            <td><?= $profile['ID'] ?></td>
            <td><?= $profile['NAME'] ?></td>
            <td><?= $profile['EMAIL'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
