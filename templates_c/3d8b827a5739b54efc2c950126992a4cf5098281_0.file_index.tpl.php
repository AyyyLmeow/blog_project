<?php
/* Smarty version 5.7.0, created on 2026-01-25 16:27:03
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697644571ef261_54947813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d8b827a5739b54efc2c950126992a4cf5098281' => 
    array (
      0 => 'index.tpl',
      1 => 1769357446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697644571ef261_54947813 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_177217323969764457033509_22796326', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_177217323969764457033509_22796326 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?>

    <h1>Блог</h1>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
        <section>
            <h2><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h2>
            <p><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>

            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('category')['posts'], 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
                    <li>
                        <strong><?php echo $_smarty_tpl->getValue('post')['title'];?>
</strong><br>
                        <?php echo $_smarty_tpl->getValue('post')['description'];?>
<br>
                        <a href="post.php?id=<?php echo $_smarty_tpl->getValue('post')['id'];?>
">Читать полностью</a>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>

            <a href="category.php?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
" class="btn">Все статьи</a>
        </section>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
