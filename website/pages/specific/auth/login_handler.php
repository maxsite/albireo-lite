<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// задержка от брутфорса
sleep(1); 

if ($t = sentLast()) {
    echo '<div class="mar20-tb">' . lang('You are submitting the form too many times. Please try again in at least') . ' ' . $t . ' ' . plur($t, 'a second', 'seconds@2', 'seconds@5') . '.</div>';
    
    return;
}

if (isset($_POST['form'])) {
    $rules = [
        'login' => [
            'required' => true,
            'min_length' => 3,
            'max_length' => 40,
        ],
        
        'password' => [
            'required' => true,
        ],
    ];
   
    $result = arrayValidate($_POST['form'], $rules);
    
    // если нет ошибок, проверим корректность логина и пароля
    if (!$result['errors']) {
        $login = $result['data']['login'];
        $password = $result['data']['password'];
        
        if (loginUser($login, $password) !== true) 
            $result['errors'][] = 'Incorrect login/password';
    }
        
    if ($result['errors']) {
        // запомним время отправки формы
        sentLast(true); 
        
        // вывод ошибок в виде UL-списка
        // нужно указать фразу error-form, которая указывает, что этот текст сообщение об ошибках
        echo arrayToStrHTML($result['errors'], '<ul error-form class="mar20-tb t-red100 bg-red600 pad20-tb">', '</ul>', '<li>', '</li>');
    } else {
        // делаем редирект он может быть во флэш-сессии
        $redirect = sessionFlashGet('loginFormReferer') ?? SITE_URL;
        
        // разрешим редиректы только по своему сайту
        if (str_starts_with($redirect, SITE_URL) == false) $redirect = SITE_URL;
        
        // и не на форму логина и регистрации
        if ($redirect == SITE_URL . 'login') $redirect = SITE_URL;
        if ($redirect == SITE_URL . 'register') $redirect = SITE_URL;
            
        header('Location:' . $redirect);
        
        echo '<div class="mar20-tb t-green100 bg-green600 pad20">Ok!</div>';
    }
} else {
    echo '<div class="mar20-tb">Error submitting form</div>';
}

# end of file
