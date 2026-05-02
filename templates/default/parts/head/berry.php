<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// https://maxsite.org/berry
// use.berry: +

// # отключить поддержку dark-режима (по умолчанию включена)
// use.berry.dark: -

// # можно использовать dark-тему по умолчанию / она будет автоматом переключена
// также учитывается режим браузера автоматом
// use.berry.dark.default: +
// альтернатива — указать класс для html-тэга -> html[class]: dark

// выбранная css-тема по умолчанию относительно каталога ASSETS_URL/css/themes/
// use.berry.theme.default: indigo.css

if (checkStr(getPageData('use.berry', false)) === true) {
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'berry/berry.css?' . ALBIREO_VERSION . '">';
    
    // создаем константы KEY_THEME_DARK и KEY_THEME_SELECTED чтобы они были всегда доступны в JS-скриптах сайта
    echo strRemoveLF('
        <script>
            const KEY_THEME_DARK = "theme.' . str_replace('/', '_', SITE_HOST) . '"; 
            const KEY_THEME_SELECTED = "theme-selected.' . str_replace('/', '_', SITE_HOST) . '"; 
       </script>');
       
    if (checkStr(getPageData('use.berry.dark', true)) === true) {
        $def = (checkStr(getPageData('use.berry.dark.default', false)) === true) ? 'dark' : 'light';

        $defTheme = getPageData('use.berry.theme.default', '');
        
        $js1 = '';
        
        if ($defTheme) {
            if (file_exists(ASSETS_DIR . 'css/themes/' . $defTheme)) {
                $defTheme = ASSETS_URL . 'css/themes/' . $defTheme;
                
                $js1 = '
                if (localStorage.getItem(KEY_THEME_SELECTED) === null) {
                    localStorage.setItem(KEY_THEME_SELECTED, "' . $defTheme . '"); 
                }';
                
            }
        }
        
        echo '<link rel="stylesheet" id="themeStylesheet" href="">';
        
        echo strRemoveLF('
        <script>
            if (localStorage.getItem(KEY_THEME_DARK) === null) {
                theme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "' . $def . '";
                localStorage.setItem(KEY_THEME_DARK, theme);
            }
            
            ' . $js1 . '
        
            if (localStorage.getItem(KEY_THEME_DARK) === "dark") {
                document.documentElement.classList.add("dark");
            }
            
            if (localStorage.getItem(KEY_THEME_SELECTED)) {
                document.getElementById("themeStylesheet").href = localStorage.getItem(KEY_THEME_SELECTED);
            } 
            
            function toggleThemeDark() {
                const isDark = document.documentElement.classList.toggle("dark");

                localStorage.setItem(KEY_THEME_DARK, isDark ? "dark" : "light"); 
                
                return isDark;
            }
       </script>');
    }
}

# end of file
