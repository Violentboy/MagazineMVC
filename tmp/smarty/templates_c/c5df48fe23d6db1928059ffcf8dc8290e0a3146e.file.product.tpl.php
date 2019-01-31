<?php /* Smarty version Smarty-3.1.6, created on 2019-01-31 17:54:47
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284205c5192810ee4a4-92094112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1548946482,
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
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5192812cae1')) {function content_5c5192812cae1($_smarty_tpl) {?><h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img width="175" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value){?>class="hideme"<?php }?> href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt='Удалить из корзины'>Удалить из корзины</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value){?>class="hideme"<?php }?> href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt='Добавить в корзину'>Добавить в корзину</a>

<p> Описание <br/><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
<?php }} ?>