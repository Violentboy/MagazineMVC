<?php
/**
 * Файл настроек
 */

//> Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');
//<

//> Используемый шаблон
$template = 'default';

// Пути к файлам шаблона
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

// Пути к файлам шаблона в веб пространстве
define('TemplateWebPath', "/templates/{$template}/");
//<

//> Инициализация шаблонизатора Smarty
//put full path to Smarty.class.php
require ('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/temrlates_c');
$smarty->setCacheDir('../tmp/smarty/chache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//<