{extends file="parent:widgets/emotion/index.tpl"}

{block name="widgets/emotion/index/attributes"}{strip}
    {if $emotion.attributes.core && $emotion.attributes.core.heptacom_emotion_resizer_unify_height}
        data-heptacom-emotion-resizer-unify-height="true"
    {/if}
{/strip} {$smarty.block.parent}{/block}

{block name="widgets/emotion/index/inner-element"}
    {if $emotion.attributes.core && $emotion.attributes.core.heptacom_emotion_resizer_unify_height}
        <div class="heptacom_emotion_resizer_unify_height">
            {$smarty.block.parent}
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
