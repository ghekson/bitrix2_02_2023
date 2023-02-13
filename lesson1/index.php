<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>

<?php
$APPLICATION->IncludeComponent(
    'ylab:element.list',
    '',
    [
        'CALC_TOTAL' => 'Y'
    ]
);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
