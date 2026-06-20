<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

if (!isAjax()) exit('Access denied!');

if ($t = sentLastCookie()) {
    echo '<div class="mar20-tb">' . lang('You are submitting the form too many times. Please try again in at least') . ' ' . $t . ' ' . plur($t, 'a second', 'seconds@2', 'seconds@5') . '.</div>';
    
    return;
}

if (isset($_POST['form'])) {

    $rules = [
        'name' => [
            'default' => '',
            'min_length' => 3,
            'max_length' => 30,
            
            'chars_forbidden' => [
                'options' => '?!#$<>',
            ],
        ],
        
        'email' => [
            'default' => '',
            'email' => [],
        ],
    ];
   
    $result = arrayValidate($_POST['form'], $rules);
    
    if ($result['errors']) {
        // нужно указать фразу error-form, которая указывает, что этот текст сообщение об ошибках
        echo '<ul error-form class="mar20-tb t-red100 bg-red600 pad20-tb">';
        
        foreach ($result['errors'] as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        
        echo '</ul>';
    } else {
        // ... делаем с данными что нужно ...
        
        
        echo '<div class="mar20-tb t-green100 bg-green600 pad20">Ok!</div>';
    }
} else {
    echo '<div class="mar20-tb">Error submitting form</div>';
}

# end of file
