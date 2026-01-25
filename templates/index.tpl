{extends file="layouts/main.tpl"}

{block name="content"}
    <h1>Блог</h1>

    {foreach $categories as $category}
        <section>
            <h2>{$category.name}</h2>
            <p>{$category.description}</p>

            <ul>
                {foreach $category.posts as $post}
                    <li>
                        <strong>{$post.title}</strong><br>
                        {$post.description}<br>
                        <a href="post.php?id={$post.id}">Читать полностью</a>
                    </li>
                {/foreach}
            </ul>

            <a href="category.php?id={$category.id}" class="btn">Все статьи</a>
        </section>
    {/foreach}
{/block}
