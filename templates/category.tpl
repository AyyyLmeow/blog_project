{extends file="layouts/main.tpl"}

{block name="content"}
    <div class="container">

        <div class="category-page-header">
            <h1>{$category.name}</h1>
            <p>{$category.description}</p>
        </div>

        <div class="category-toolbar">
            <div class="sort">
                Сортировать:
                <a href="?id={$category.id}&sort=date" class="{if $sort=='date'}active{/if}">По дате</a> |
                <a href="?id={$category.id}&sort=views" class="{if $sort=='views'}active{/if}">По просмотрам</a>
            </div>
        </div>

        <div class="posts-grid">
            {foreach $posts as $post}
                <article class="post-card">
                    <div class="post-image">
                        <img src="/images/{$post.image}" alt="{$post.title}">
                    </div>

                    <div class="post-content">
                        <h3>{$post.title}</h3>
                        <div class="post-date">
                            {$post.created_at|date_format:"%b %e, %Y"} · 👁 {$post.views}
                        </div>

                        <p>{$post.description}</p>

                        <a href="post.php?id={$post.id}" class="read-more">Continue Reading</a>
                    </div>
                </article>
            {/foreach}
        </div>

        {* ПАГИНАЦИЯ *}
        {if $total_pages > 1}
            <div class="pagination">
                {section name=p start=1 loop=$total_pages+1}
                    <a href="?id={$category.id}&sort={$sort}&page={$smarty.section.p.index}"
                       class="{if $page == $smarty.section.p.index}active{/if}">
                        {$smarty.section.p.index}
                    </a>
                {/section}
            </div>
        {/if}

    </div>
{/block}
