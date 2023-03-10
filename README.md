
#### Описание  
Компонент Symfony VarDumper для извлечения состояния из любых переменных PHP.  
Построенный поверх него, модуль предоставляет улучшенные функции debug() и ddebug(), которые можно использовать вместо var_dump() и print_r().  

*Модуль не требует дополнительных настроек.*  

**После установки становится доступны функции:**  
> Модуль создаёт глобальную функцию  **dump()**, которую вы можете
> использовать вместо, например [var_dump](https://secure.php.net/manual/en/function.var-dump.php)

> Модуль также предоставляет глобальную функцию  **dd()**  ("dump and
> die" - "сбрось и умри"). 
> Эта функция отображает переменные используя  **dump()**  и сразу прекращает исполнение скрипта (используя функцию PHP  [exit](https://secure.php.net/manual/en/function.exit.php)).

  
**Специально для работы с Bitrix были добавлены функции:**  
> **debug()**  - Аналог функции dump(). Выводит дамп только для пользователя в группе "Администраторы"

> **ddebug()**  - Функция похожа на dd(). Дополнительно очищает буфер. Выводит дамп только для пользователя в группе "Администраторы"

Полная информация по возможностям:  
[https://symfony.com/doc/4.4/components/var_dumper.html](https://symfony.com/doc/4.4/components/var_dumper.html)
  
**Использование:**  
```php
$var = array(  
    'a simple string' => "in an array of 5 elements",  
    'a float' => 1.0,  
    'an integer' => 1,  
    'a boolean' => true,  
    'an empty array' => array(),  
);  
ddebug($var);  
```
      
**Результат:**  
![](https://symfony.com/doc/4.0/_images/01-simple.png)  
  
