{extends file="layouts/main.tpl"}

{block name="content"}
    <div class="container post-page">

        <article class="single-post">
            <div class="single-post-image">
                <img src="/images/{$post.image}" alt="{$post.title}">
            </div>

            <h1 class="single-post-title">{$post.title}</h1>
            <h2 class="single-post-title">Категории: {$post.categories}</h2>

            <div class="single-post-meta">
                {$post.created_at|date_format:"%b %e, %Y"} · Просмотров 👁 {$post.views}
            </div>

            <div class="single-post-content">
                {$post.content nofilter}
            </div>
        </article>

        {if $similar}
            <section class="related-posts">
                <h2>Похожие статьи</h2>

                <div class="posts-grid">
                    {foreach $similar as $sim}
                        <article class="post-card">
                            <div class="post-image">
                                <img src="/images/{$sim.image}" alt="{$sim.title}">
                            </div>

                            <div class="post-content">
                                <h3>{$sim.title}</h3>
                                <div class="post-date">
                                    {$sim.created_at|date_format:"%b %e, %Y"}
                                </div>

                                <p>{$sim.description}</p>

                                <a href="post.php?id={$sim.id}" class="read-more">Continue Reading</a>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/if}

    </div>
{/block}
