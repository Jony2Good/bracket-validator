# Основы работы с пакетами composer

### Основная задача
Необходимо создать свой пакет.

**Критерии оценки**
- Пакет должен ставиться при помощи composer require package-name
- Пакет должен отвечать PSR-4
- Пакет может подключаться в Composer либо с packagist, либо из GitHub

------------

### Результат

------------

**Установить пакет в проект**

 - composer composer require a.emelyanenko/bracket-validator

 **Подключить пакет в проект**

 ```
use Emelyanenko\BracketValidator\BracketValidator;
use Emelyanenko\BracketValidator\Exceptions\BracketException;
```

**Пример использования**

```
$v = new BracketValidator();

try {
  $data = $_POST['string'] ?? '';
  return $v->validate($data);   
} catch (BracketException $e) {   
    echo "Ошибка валидации: " . $e->getMessage();
} 
 ```