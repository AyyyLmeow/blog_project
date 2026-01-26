<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{$title|default:"My Blog"}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <div class="logo">
            <a href="/">MyBlog</a>
        </div>
    </div>
</header>

<main class="site-content">
    {block name="content"}{/block}
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <p>© {$smarty.now|date_format:"%Y"} MyBlog. Все права защищены.</p>
    </div>
</footer>

</body>
</html>
