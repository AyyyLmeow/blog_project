<?php
/* Smarty version 5.7.0, created on 2026-01-25 15:00:07
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69762ff7e8ba91_39074048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d8b827a5739b54efc2c950126992a4cf5098281' => 
    array (
      0 => 'index.tpl',
      1 => 1769352877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69762ff7e8ba91_39074048 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_206611003569762ff7cd4132_60836938', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_206611003569762ff7cd4132_60836938 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?>

    <h2>Категории и последние посты</h2>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
        <h3><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h3>
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
                    Просмотры: <?php echo $_smarty_tpl->getValue('post')['views'];?>

                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>

        <a href="category.php?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
">Все статьи</a>
        <hr>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
