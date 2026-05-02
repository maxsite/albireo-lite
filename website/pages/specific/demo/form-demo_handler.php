<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
https://www.php.net/manual/ru/function.filter-var-array.php
https://www.php.net/manual/ru/function.filter-var.php

*/

if (!isAjax()) exit('Access denied!');

if ($t = sentLast()) {
    echo '<div class="mar20-tb">' . lang('You are submitting the form too many times. Please try again in at least') . ' ' . $t . ' ' . plur($t, 'a second', 'seconds@2', 'seconds@5') . '.</div>';
    
    return;
}

if (isset($_POST['form'])) {

    $rules = [
        'email' => [
            'required' => [],
            'email' => [],
        ],
        
        'site' => [
            'default' => '', // значение по умолчанию, если в POST нет ключа «site»
            
            'url' => [
                'error' => 'Incorrect URL address',
            ],
            
            'min_length' => [
                'options' => 10,
                'error' => 'Минимальный адрес сайта 10 символов',
            ],
            
            'max_length' => [
                'options' => 50,
                'error' => 'Максимальный адрес сайта 50 символов',
            ],
        ],
        
        'name' => [
            'required' => [],
            'min_length' => 3,
            'max_length' => 30,
            // 'min_length' => ['options' => 3],
            // 'max_length' => ['options' => 30],
            
            'chars_forbidden' => [
                'options' => '?!#$<>',
                //'error' => 'Недопустимые символы в имени (?!#$<>)',
            ],
        ],
        
        'source' => [
            'required' => [],
            'start_with' => SITE_URL,
        ],
        
        'messager' => [
            'required' => ['error' => 'Не заполнено обязательное поле (messager)'],
            'in_list' => ['options' => ['Telegram', 'Viber', 'WhatsApp', 'Signal']],
        ],
        
        'message' => [
            'required' => [],
            'default' => 'none',
            'min_length' => 3,
            'max_length' => 1000,
            'stop_words' => [
                'error' => lang('Spam detected!'),
            ],
        ],
        
        'color' => [
            'default' => [],
            'in_list' => ['options' => ['red', 'green', 'blue']],
        ],
        
        'switch' => [
            'default' => 'off',
            'in_list' => ['options' => ['on', 'off']],
        ],
        
        'range' => [
            'default' => 0,
            'numeric' => [],
            'numeric_max' => 5,
            'numeric_min' => 1,
        ],
        
        'number_float' => [
            'default' => 0,
            'numeric' => [],
            'numeric_positive' => [],
        ],
        
        'number_int' => [
            'default' => 0,
            'numeric_int' => [],
            'numeric_negative' => [],
        ],
        
        'date' => [
            'default' => date('Y-m-d'),
            'date' => [],
        ],
        
        'time' => [
            'default' => date('H:i'),
            'time' => [],
        ],
        
        'check' => [
            'default' => 'off',
        ],
        
        'ip' => [
            'default' => '',
            'ip' => [],
            // 'chars_allow' => '0123456789.',
            // 'min_length' => 7,  // 1:1:1:1
            // 'max_length' => 15, // 222:222:222:222
        ],
        
        'str_base64' => [
            'base64' => [],
        ],
        
    ];

    //pr($_POST['form']);
    
    $result = arrayValidate($_POST['form'], $rules);
    
    // if ($result['data']['ip'] and !filter_var($result['data']['ip'], FILTER_VALIDATE_IP))
    //     $result['errors'][] = 'Incorrect IP';
    
    // pr($result);
    
    
    if ($result['errors']) {
        // нужно указать фразу error-form, которая указывает, что этот текст сообщение об ошибках
        echo '<ul error-form class="mar20-tb t-red100 bg-red600 pad20-tb">';
        
        foreach ($result['errors'] as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        
        echo '</ul>';
    } else {
        // pr($result['data']);
        sessionOld('form-name', $result['data']['name']);
        sessionOld('form-email', $result['data']['email']);
        sessionOld('form-site', $result['data']['site']);
        
        // пересоздать токен — будет защитой от повторных отправок — в теории их не должно быть, поэтому повторые запросы по такому же токену могут указывать на попытку взлома
        sessionUnsetCSRF();
        
        // ... делаем с данными что нужно ...
        
        
        echo '<div class="mar20-tb t-green100 bg-green600 pad20">Ok!</div>';
    }
} else {
    echo '<div class="mar20-tb">Error submitting form</div>';
}

# end of file
