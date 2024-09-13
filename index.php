<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин 'Одежда'");
?>

<?$APPLICATION->IncludeComponent(
    "custom:form.result.new",
    "",
    Array()
);?>