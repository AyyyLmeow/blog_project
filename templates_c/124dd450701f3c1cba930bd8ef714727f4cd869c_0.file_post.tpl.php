<?php
/* Smarty version 5.7.0, created on 2026-01-25 15:57:40
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69763d74b4d149_59124552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '124dd450701f3c1cba930bd8ef714727f4cd869c' => 
    array (
      0 => 'post.tpl',
      1 => 1769356659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69763d74b4d149_59124552 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_119569755769763d747f60b9_12856637', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_119569755769763d747f60b9_12856637 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?>

    <h2><?php echo $_smarty_tpl->getValue('post')['title'];?>
</h2>

    <?php if ($_smarty_tpl->getValue('post')['image']) {?>
        <img src="/images/<?php echo $_smarty_tpl->getValue('post')['image'];?>
" alt="<?php echo $_smarty_tpl->getValue('post')['title'];?>
" style="max-width:400px;">
    <?php }?>

    <p><strong>Категории:</strong>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat', true);
$_smarty_tpl->getVariable('cat')->iteration = 0;
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
$_smarty_tpl->getVariable('cat')->iteration++;
$_smarty_tpl->getVariable('cat')->last = $_smarty_tpl->getVariable('cat')->iteration === $_smarty_tpl->getVariable('cat')->total;
$foreach0Backup = clone $_smarty_tpl->getVariable('cat');
?>
            <a href="category.php?id=<?php echo $_smarty_tpl->getValue('cat')['id'];?>
"><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</a><?php if (!$_smarty_tpl->getVariable('cat')->last) {?>, <?php }?>
        <?php
$_smarty_tpl->setVariable('cat', $foreach0Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </p>

    <p><strong>Просмотры:</strong> <?php echo $_smarty_tpl->getValue('post')['views'];?>
</p>
    <p><?php echo nl2br((string) $_smarty_tpl->getValue('post')['content'], (bool) 1);?>
</p>

    <h3>Похожие статьи</h3>
    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('similar'), 's');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach1DoElse = false;
?>
            <li><a href="post.php?id=<?php echo $_smarty_tpl->getValue('s')['id'];?>
"><?php echo $_smarty_tpl->getValue('s')['title'];?>
</a></li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php
}
}
/* {/block "content"} */
}
