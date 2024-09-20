<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$formID = 4;

if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
    $arValues = array(
        "name" => trim($_POST["name"] ?? ""),
        "job_title" => trim($_POST["job_title"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
        "number" => trim($_POST["number"] ?? ""),
        "message" => trim($_POST["message"] ?? "")
    );

    $name = $_POST['name'] ?? '';

    if (is_array($name)) {
        error_log('Ошибка: $name — это массив');
    }

    if (!empty($arValues["name"]) && !empty($arValues["job_title"]) && !empty($arValues["email"]) && !empty($arValues["number"])) {
        if (CModule::IncludeModule('form')) {
            $result = CFormResult::Add($formID, $arValues, $arErrors);
            if ($result) {
                $arResult["isFormNote"] = "Y";
                $arResult["FORM_NOTE"] = "Форма успешно отправлена!";
            } else {
                $arResult["FORM_ERRORS_TEXT"] = "Ошибка отправки формы: " . implode(", ", $arErrors);
                $arResult["isFormErrors"] = "Y";

                AddMessage2Log("Ошибка отправки формы: " . implode(", ", $arErrors), "form");
            }
        }
    } else {
        $arResult["FORM_ERRORS_TEXT"] = "Пожалуйста, заполните все обязательные поля.";
        $arResult["isFormErrors"] = "Y";
    }
}

var_dump($arValues);

if ($arResult["isFormErrors"] == "Y"): ?>
    <div class="form-message error"><?= $arResult["FORM_ERRORS_TEXT"]; ?></div>
<?php endif; ?>

<?php if ($arResult["isFormNote"] == "Y"): ?>
    <div class="form-message success"><?= $arResult["FORM_NOTE"]; ?></div>
<?php else: ?>
    <div class="contact-form">
        <div class="contact-form__head">
            <div class="contact-form__head-title"><?= $arResult["FORM_TITLE"] ?: 'Связаться'; ?></div>
            <div class="contact-form__head-text"><?= $arResult["FORM_DESCRIPTION"] ?: 'Наши сотрудники помогут выполнить подбор услуги и расчет цены с учетом ваших требований'; ?></div>
        </div>

        <form class="contact-form__form" id="contact-form" method="POST">
            <?= bitrix_sessid_post() ?>
            <input type="hidden" name="WEB_FORM_ID" value="<?= htmlspecialchars($formID) ?>">

            <div class="contact-form__form-inputs">
                <div class="input contact-form__input">
                    <label class="input__label" for="NAME">
                        <div class="input__label-text">Ваше имя*</div>
                        <input class="input__input" type="text" id="4" name="name" value="" required>
                    </label>
                </div>
                <div class="input contact-form__input">
                    <label class="input__label" for="COMPANY">
                        <div class="input__label-text">Компания/Должность*</div>
                        <input class="input__input" type="text" id="6" name="job_title" value="" required>
                    </label>
                </div>
                <div class="input contact-form__input">
                    <label class="input__label" for="EMAIL">
                        <div class="input__label-text">Email*</div>
                        <input class="input__input" type="email" id="5" name="email" value="" required>
                    </label>
                </div>
                <div class="input contact-form__input">
                    <label class="input__label" for="PHONE">
                        <div class="input__label-text">Номер телефона*</div>
                        <input class="input__input" type="tel" id="7" name="number" value="" required>
                    </label>
                </div>
            </div>

            <div class="contact-form__form-message">
                <div class="input">
                    <label class="input__label" for="MESSAGE">
                        <div class="input__label-text">Сообщение</div>
                        <textarea class="input__input" id="8" name="message"></textarea>
                    </label>
                </div>
            </div>

            <div class="contact-form__bottom">
                <div class="contact-form__bottom-policy">
                    Нажимая «Отправить», Вы подтверждаете, что ознакомлены, полностью согласны и принимаете условия «Согласия на обработку персональных данных».
                </div>
                <button type="submit" class="form-button contact-form__bottom-button" name="web_form_submit" value="Y">
                    <div class="form-button__title">Оставить заявку</div>
                </button>
            </div>
        </form>
    </div>

<?php endif; ?>