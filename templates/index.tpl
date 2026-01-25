{extends file="layouts/main.tpl"}

{block name="content"}
    <h2>Категории и последние посты</h2>

    {foreach $categories as $category}
        <h3>{$category.name}</h3>
        <p>{$category.description}</p>

        <ul>
            {foreach $category.posts as $post}
                <li>
                    <strong>{$post.title}</strong><br>
                    {$post.description}<br>
                    Просмотры: {$post.views}
                </li>
            {/foreach}
        </ul>

        <a href="category.php?id={$category.id}">Все статьи</a>
        <hr>
    {/foreach}
{/block}
