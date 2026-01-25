{extends file="layouts/main.tpl"}

{block name="content"}
    <h2>{$category.name}</h2>
    <p>{$category.description}</p>

    <a href="?id={$category.id}&sort=date">Сортировать по дате</a> |
    <a href="?id={$category.id}&sort=views">Сортировать по просмотрам</a>

    <ul>
        {foreach $posts as $post}
            <li>
                <strong>{$post.title}</strong><br>
                {$post.description}<br>
                Просмотры: {$post.views}<br>
                Дата: {$post.created_at}<br>
                <a href="post.php?id={$post.id}">Читать полностью</a>
            </li>
        {/foreach}
    </ul>

    <div>
        {if $page > 1}
            <a href="?id={$category.id}&sort={$sort}&page={$page-1}">← Назад</a>
        {/if}

        Страница {$page} из {$totalPages}

        {if $page < $totalPages}
            <a href="?id={$category.id}&sort={$sort}&page={$page+1}">Вперед →</a>
        {/if}
    </div>
{/block}
