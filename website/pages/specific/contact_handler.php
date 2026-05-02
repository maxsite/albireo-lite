<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

if (!isAjax()) exit('Access denied!');

if (!isset($_POST['form'])) {
    echo '<div class="mar20-tb">' . lang('Error submitting form') . '</div>';
    return;
}

if ($t = sentLast()) {
    echo '<div class="mar20-tb">' . lang('You are submitting the form too many times. Please try again in at least') . ' ' . $t . ' ' . plur($t, 'a second', 'seconds@2', 'seconds@5') . '.</div>';
    return;
}

$rules = [
    'confirm' => [
        'honeypot' => [
            'error' => lang('Spam detected!'),
        ],
    ],

    'email' => [
        'required' => [],
        'email' => [],
    ],
    
    'name' => [
        'required' => [],
        'min_length' => 3,
        'max_length' => 50,
        'chars_normal' => '-+_@ ',
    ],

    'message' => [
        'required' => [],
        'min_length' => 3,
        'max_length' => 3000,
        'stop_words' => [
            'error' => lang('Spam detected!'),
        ],
    ],
];

$result = arrayValidate($_POST['form'], $rules);

if ($result['errors']) {
    // нужно указать фразу error-form, которая указывает, что этот текст сообщение об ошибках
    echo arrayToStrHTML($result['errors'], '<ul error-form class="mar20-tb t-red100 bg-red600 pad20-tb rounded5">', '</ul>', '<li>', '</li>');
} else {
    $data = $result['data'];
    
    // отсюда была отправка — это стандартный CSRF-токен системы
    // $source = encryptDecrypt('decrypt', $_POST['_token_source']);
    // $source = TOKEN_SOURCE; // или если это ajax
    // теоретически он должен быть равен SITE_URL/contact

    // pr($data);
    // сохраним в сессии заполненное поле формы form[name] и form[email]
    sessionOld('form-name', $data['name']);
    sessionOld('form-email', $data['email']);
    
    $message = '';

    // код сообщения на основе даты
    $cod = date('Y-m-d_H-i'); 
    
    // тема письма
    $subject = lang('Feedback') . ' ' . $cod; 

    $message .=  lang('Message code') . ': ' . $cod . "\r\n\r\n";
    $message .=  lang('Date') . ': ' . date('Y-m-d H:i:s') . "\r\n";
    $message .=  'IP: ' . $_SERVER['REMOTE_ADDR'] . "\r\n";

    // прочие данные формы, если есть
    foreach ($data as $key => $val) {
        $val = rtrim($val);

        if (strpos($val, "\n"))
            $message .=  lang(ucfirst($key)) . ":\r\n" . $val .  "\r\n";
        else
            $message .=  lang(ucfirst($key)) . ': ' . $val .  "\r\n";
    }

    $message .=  "\r\n";

    // от кого: Имя <email>
    $headers['From'] = getConfig('emailFrom');

    // кому отвечать: Имя <email>
    $headers['Reply-To'] = $data['email'];

    $emailAdmin = getConfig('emailAdmin');

    // pr($emailAdmin, $subject, $headers, $message); // для отладки можно посмотреть что в итоге

    // пересоздать токен — будет защитой от повторных комментариев — в теории их не должно быть, поэтому повторые запросы по такому же токену могут указывать на попытку взлома
    sessionUnsetCSRF();

    if ($emailAdmin) {
        sentLast(true); // запомним время отправки формы
        mail64($emailAdmin, $subject, $message, $headers);
        
        echo '<div class="mar20-tb">' . lang('Thank you! Your message has been sent! Message code') .  ': <b>' . $cod . '</b></div>';
    }
}


# end of file
