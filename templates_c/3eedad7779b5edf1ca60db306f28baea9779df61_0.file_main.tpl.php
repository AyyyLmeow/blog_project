<?php
/* Smarty version 5.7.0, created on 2026-01-25 16:32:21
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69764595491938_88448764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eedad7779b5edf1ca60db306f28baea9779df61' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1769358739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69764595491938_88448764 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? "Блог" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>My Blog</h1>
<hr>
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_196722945169764595400a59_27589386', "content");
?>

</body>
</html>
<?php }
/* {block "content"} */
class Block_196722945169764595400a59_27589386 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates/layouts';
}
}
/* {/block "content"} */
}
