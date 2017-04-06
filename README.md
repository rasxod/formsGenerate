# formsGenerate
Примеры можно смотреть в файле **testClass.php**

1. Включение класса 
```php 
$myForm = new gForm();
```
2. использование

```php 
// если нужно чтобы была обверка в виде <form></form>
echo $myForm->formCreat($my_adreses_array);

// если не нужна обверка в виде <form></form>
echo $myForm->formCreat($my_adreses_array, true);
```
