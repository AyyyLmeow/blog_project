{extends file="layouts/main.tpl"}

{block name="content"}
    <div class="container post-page">

        <article class="single-post">
            <div class="single-post-image">
                <img src="/images/{$post.image}" alt="{$post.title}">
            </div>

            <h1 class="single-post-title">{$post.title}</h1>

            <div class="single-post-meta">
                {$post.created_at|date_format:"%b %e, %Y"} · 👁 {$post.views}
            </div>

            <div class="single-post-content">
                {$post.content nofilter}
            </div>
        </article>

        {if $related_posts}
            <section class="related-posts">
                <h2>Похожие статьи</h2>

                <div class="posts-grid">
                    {foreach $related_posts as $rel}
                        <article class="post-card">
                            <div class="post-image">
                                <img src="/images/{$rel.image}" alt="{$rel.title}">
                            </div>

                            <div class="post-content">
                                <h3>{$rel.title}</h3>
                                <div class="post-date">
                                    {$rel.created_at|date_format:"%b %e, %Y"}
                                </div>

                                <p>{$rel.description}</p>

                                <a href="post.php?id={$rel.id}" class="read-more">Continue Reading</a>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/if}

    </div>
{/block}
