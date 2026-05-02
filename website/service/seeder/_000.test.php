<?php 

/*
 * пример миграции/seeder
 */

return new class {
    public function run() {
        // Создаём текстовый  файл для примера
        file_put_contents(__DIR__ . '/test.txt', 'Hello!');
        
        // перемещение этого файла чтобы больше миграция не сработала
        moveFile(__FILE__, __DIR__ . '/done/' . basename(__FILE__));
    }
};


# end of file