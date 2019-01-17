<?php /* Smarty version Smarty-3.1.6, created on 2019-01-17 14:09:43
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213095c3eff5ed42ee3-77466910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1547722978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213095c3eff5ed42ee3-77466910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c3eff5edeed0',
  'variables' => 
  array (
    'pageTitle' => 0,
    'TemplateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3eff5edeed0')) {function content_5c3eff5edeed0($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/main.css" type="text/css"/>
    </head>
    <body>
        <div id="header">
            <h1>My shop - интернет магазин</h1>
        </div>

        
        
        <?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   
        
        
        <div id="centerColumn">
<?php }} ?>