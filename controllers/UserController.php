<?php

/**
 *  Контроллер функций пользователей (users)
 * 
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * AJAX регистрация пользователя.
 * Инициализация сессионнной переменной ($_SESSION['user'])
 * 
 * @return json массив данных нового пользователя
 */
function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone  = isset($_REQUEST['phone'])  ? $_REQUEST['phone']  : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name   = isset($_REQUEST['name'])   ? $_REQUEST['name']   : null;
    $name = trim($name);
 
	
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2); 
	
	if(! $resData && checkUserEmail($email)){
        $resData['success'] = false; 
        $resData['message'] = "Пользователь с таким email('{$email}') уже зарегистрирован"; 
    }
	
	if(! $resData ){
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
		 if($userData['success']){
                        $resData['message'] = 'Пользователь успешно зарегистрирован'; 
			$resData['success'] = 1; 
			
			$userData = $userData[0];
			$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
			$resData['userEmail'] = $email;
        
			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
                        $resData['success'] = 0; 
                        $resData['message'] = 'Ошибка регистрации'; 
        }  
      
   }
   
   echo json_encode($resData);
}


/**
 * Разлогинивание пользователя
 * 
 */
function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
		unset($_SESSION['cart']);

    }
    
    redirect('/');
}

/**
 *  AJAX авторизация пользователя
 * 
 *  @return json массив данных подльзователя
 */
function loginAction(){
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
	
	$userData = loginUser($email, $pwd);
	
	if($userData['success']){
        $userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		
		$resData = $_SESSION['user'];
		$resData['success'] = 1;
        
		//$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        //$resData['userEmail'] = $email;
		
    } else {
        $resData['success'] = 0; 
        $resData['message'] = 'Неверный логин или пароль'; 
    }
    
    echo json_encode($resData);
	
}

/**
 * Формирование главной страницы пользователя 
 * 
 * @link /user/
 * @param object $smarty шаблонизатор  
 */ 
function indexAction($smarty){
    
    // если пользователь не залогинен, то редирект на главную стрницу
	if(! isset($_SESSION['user'])){
       redirect('/');
    }
    
    // получаем список категорий для меню
    $rsCategories = getAllMainCatsWithChildren();
	
	// получаем список заказов пользователя
	$rsUserOrders = getCurUserOrders();
	//d($rsUserOrders);
     $smarty->assign('pageTitle', 'Страница пользователя');
     $smarty->assign('rsCategories', $rsCategories);
	 $smarty->assign('rsUserOrders', $rsUserOrders);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}