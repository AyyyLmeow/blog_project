{extends file="layouts/main.tpl"}

{block name="content"}
    <div class="container">
        <h1 class="page-title">Blog</h1>

        {foreach $categories as $category}
            <section class="category-section">
                <div class="category-header">
                    <h2>{$category.name}</h2>
                    <a href="category.php?id={$category.id}" class="view-all">Смотреть Всё</a>
                </div>

                <div class="posts-grid">
                    {foreach $category.posts as $post}
                        <article class="post-card">
                            <div class="post-image">
                                <img src="/images/{$post.image}" alt="{$post.title}">
                            </div>

                            <div class="post-content">
                                <h3>{$post.title}</h3>
                                <div class="post-date">
                                    {$post.created_at|date_format:"%b %e, %Y"}
                                </div>

                                <p>{$post.description}</p>

                                <a href="post.php?id={$post.id}" class="read-more">Читать полностью</a>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/foreach}
    </div>
{/block}
