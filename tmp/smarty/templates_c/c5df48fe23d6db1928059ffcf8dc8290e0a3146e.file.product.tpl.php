<?php /* Smarty version Smarty-3.1.6, created on 2019-01-30 15:59:59
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284205c5192810ee4a4-92094112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1548853197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284205c5192810ee4a4-92094112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c5192812cae1',
  'variables' => 
  array (
    'rsProduct' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5192812cae1')) {function content_5c5192812cae1($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProduct']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    
<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h3>

<img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>


<a href="#" alt='Добавить в корзину'>Добавить в корзину</a>
<p> Описание <br/><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</p>


<?php } ?><?php }} ?>