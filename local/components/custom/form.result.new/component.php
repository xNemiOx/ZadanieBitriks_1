<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult = array("MESSAGE" => "Это вывод компонента form.result.new");

$this->IncludeComponentTemplate();

if (!CModule::IncludeModule("form")) {
    ShowError("Модуль веб-форм не установлен.");
    return;
}
?>
