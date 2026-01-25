{extends file="layouts/main.tpl"}

{block name="content"}
    <h2>{$post.title}</h2>

    {if $post.image}
        <img src="/images/{$post.image}" alt="{$post.title}" style="max-width:400px;">
    {/if}

    <p><strong>Категории:</strong>
        {foreach $categories as $cat}
            <a href="category.php?id={$cat.id}">{$cat.name}</a>{if !$cat@last}, {/if}
        {/foreach}
    </p>

    <p><strong>Просмотры:</strong> {$post.views}</p>
    <p>{$post.content|nl2br}</p>

    <h3>Похожие статьи</h3>
    <ul>
        {foreach $similar as $s}
            <li><a href="post.php?id={$s.id}">{$s.title}</a></li>
        {/foreach}
    </ul>
{/block}
