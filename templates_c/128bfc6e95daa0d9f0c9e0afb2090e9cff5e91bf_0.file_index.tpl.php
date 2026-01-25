<?php
/* Smarty version 5.7.0, created on 2026-01-25 14:48:09
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69762d29e51613_52733582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '128bfc6e95daa0d9f0c9e0afb2090e9cff5e91bf' => 
    array (
      0 => 'index.tpl',
      1 => 1769351726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69762d29e51613_52733582 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_126649515469762d299a7fa4_98254713', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_126649515469762d299a7fa4_98254713 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates/layouts';
?>

    <h2>Категории</h2>

    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
            <li>
                <strong><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</strong><br>
                <?php echo $_smarty_tpl->getValue('cat')['description'];?>

            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php
}
}
/* {/block "content"} */
}
