<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин 'Одежда'");
?>

<?php
$APPLICATION->IncludeComponent(
    "custom:form.result.new",
    ".default",
    array(
        "WEB_FORM_ID" => 4,
        "AJAX_MODE" => "Y",
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    ),
    false
);
?>

