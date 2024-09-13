<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);
?>
<div class="article-list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="article-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <div class="article-image-container">
                        <div class="container-image">
                            <img class="preview_picture" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
                        </div>
                        <div class="container-title-text">
                            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                                <div class="article-title-overlay"><? echo $arItem["NAME"] ?></div>
                            <? endif; ?>
                            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                                <div class="article-text-overlay"><? echo $arItem["PREVIEW_TEXT"]; ?></div>
                            <? endif; ?>
                        </div>
                    </div>
                </a>
            <? endif ?>
        </div>
    <? endforeach; ?>
</div>
