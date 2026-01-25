<?php
/* Smarty version 5.7.0, created on 2026-01-25 15:51:14
  from 'file:category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69763bf2cac533_33605472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33ed071852d8bb58195f879d52c3b49a75105f57' => 
    array (
      0 => 'category.tpl',
      1 => 1769355310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69763bf2cac533_33605472 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_58318899569763bf2a64435_87215914', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_58318899569763bf2a64435_87215914 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?>

    <h2><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h2>
    <p><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>

    <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=date">Сортировать по дате</a> |
    <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=views">Сортировать по просмотрам</a>

    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
            <li>
                <strong><?php echo $_smarty_tpl->getValue('post')['title'];?>
</strong><br>
                <?php echo $_smarty_tpl->getValue('post')['description'];?>
<br>
                Просмотры: <?php echo $_smarty_tpl->getValue('post')['views'];?>
<br>
                Дата: <?php echo $_smarty_tpl->getValue('post')['created_at'];?>
<br>
                <a href="post.php?id=<?php echo $_smarty_tpl->getValue('post')['id'];?>
">Читать полностью</a>
            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>

    <div>
        <?php if ($_smarty_tpl->getValue('page') > 1) {?>
            <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('sort');?>
&page=<?php echo $_smarty_tpl->getValue('page')-1;?>
">← Назад</a>
        <?php }?>

        Страница <?php echo $_smarty_tpl->getValue('page');?>
 из <?php echo $_smarty_tpl->getValue('totalPages');?>


        <?php if ($_smarty_tpl->getValue('page') < $_smarty_tpl->getValue('totalPages')) {?>
            <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('sort');?>
&page=<?php echo $_smarty_tpl->getValue('page')+1;?>
">Вперед →</a>
        <?php }?>
    </div>
<?php
}
}
/* {/block "content"} */
}
