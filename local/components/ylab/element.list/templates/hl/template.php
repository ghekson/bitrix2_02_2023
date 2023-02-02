<div class="list">
    <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div>
            <p>CODE order -  <b><?= $arItem['UF_CODE'] ?></b></p>
            <p>SUN order -  <i><?= $arItem['UF_SUM'] ?></i></p>
        </div>
        <hr>
    <?php } ?>
</div>