# formsGenerate
Примеры можно смотреть в файле **testClass.php**

1. Включение класса 
```php 
$myForm = new gForm();
```
2. использование

```php 
// массив для материалазе
$form_1 = array(
	'fio' 	=> array(
		'tag'		=> 'input',
		'type'		=> 'text',
		'id'		=> '__name',
		'doAddDiv'	=> 'input-field col l6 s12',
		'class'		=> '',
		'value'		=> '',
		'label'		=> array(
			'for' 	=> '__name',
			'text' 	=> 'Фамилия, имя, отчество',
			),
		),
	'gender'	=> array(
		'tag'		=> 'select',
		'id'		=> '__name',
		'data'		=> array('...','М','Ж'),
		// 'class'		=> 'browser-default',
		'class'		=> '__name',
		'doAddDiv'	=> 'input-field col l6 s12',
		'value'		=> '',
		'label'		=> array(
			'for' 	=> '__name',
			'text'	=> 'Пол'
			),
		),
	'birthday' 	=> array(
		'tag'		=> 'input',
		'type'		=> 'text',
		'id'		=> '__name',
		'doAddDiv'	=> 'input-field col l6 s12',
		'class'		=> 'datepicker',
		'value'		=> '',
		'label'		=> array(
			'for' 	=> '__name',
			'text' 	=> 'Дата рождения',
			),
		),
	);

// если нужно чтобы была обверка в виде <form></form>
echo $myForm->formCreat($my_adreses_array);

// если не нужна обверка в виде <form></form> и для материала
echo $myForm->formCreat($my_adreses_array, true);

```




# LASTLOG

**15-06-2017**
1. Добавлено *label* название поля скобочках (кроме **'text'** можно так **'text+name'**) тогда название будет типа **текст(name)**


