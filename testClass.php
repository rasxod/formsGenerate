<?
//Отображение ошибок//////////////////////
ini_set("display_errors","0");			//
ini_set("display_startup_errors","0");	//
ini_set('error_reporting', E_ALL);		//
//////////////////////////////////////////

$tstart=microtime(1);
require 'class4forms.php';

$dataArray = array(
	'name'		=> 'myForm',
	'id'		=> '__name',
	'class'		=> 'form,__name',
	'enctype'	=> 'multipart/form-data',
	'method'	=> 'post',
	'action'	=> '/',
	'fileds'	=> array(
					'myTextForm' 	=> array(
									'tag'		=> 'input',
									'type'		=> 'text',
									'id'		=> '__name',
									'class'		=> 'form-control,tadysh',
									'value'		=> '654654676878646',
									'label'		=> array(
												'for' 	=> '__name',
												'text' 	=> 'Password'
												)
									),
					'myBigTextForm'	=> array(
									'tag'		=> 'textarea',
									'rows'		=> '10',
									'cols'		=> '10',
									'id'		=> '__name',
									'class'		=> '__name,form-control',
									'value'		=> ''
									),
					'mySelect'	=> array(
									'tag'		=> 'select',
									'id'		=> '__name',
									'data'		=> array('...',1,2,3),
									'class'		=> '__name,form-control',
									'value'		=> '2',
									'label'		=> array(
												'for'	=> '__name',
												'text+name'	=> 'еще тест'
												)
									),
					'myMultiSelect'	=> array(
									'tag'		=> 'select',
									'id'		=> '__name',
									'data'		=> array('...',1,2 , 3,4,5,6),
									'class'		=> '__name,form-control',
									'value'		=> '2,4,5',
									'addParams'	=> 'multiple',
									'size'		=> 5
									)
					)
	);

$dataArray_1 = array(
		'myTextForm' 	=> array(
			'tag'		=> 'input',
			'type'		=> 'text',
			'id'		=> '__name',
			'data-rentid'	=> '112',
			'class'		=> 'form-control,tadysh',
			'value'		=> '654654676878646',
			'doAddDiv'	=> 'input-group',
			'addDiv'	=> '<div class="col-sm-6">',
			// 'first_add'	=> '<div class="input-group-btn"> <button type="button" class="btn btn-danger">Action</button> </div>',
			'label'		=> array(
				'for' 	=> '__name',
				'class'	=> 'col-sm-3,control-label',
				'text' 	=> 'Password'
				)
			),
		'act_text_form' 	=> array(
			'tag'		=> 'input',
			'type'		=> 'text',
			'id'		=> '__name',
			// 'data-rentid'	=> '112',
			'class'		=> 'form-control',
			'value'		=> '654654676878646',
			'doAddDiv'	=> 'input-group',
			// 'addDiv'	=> '<div class="col-sm-4">',
			// 'first_add'	=> '<div class="input-group-btn"> <button type="button" class="btn btn-danger">Выбрать картинку</button> </div>',
			'start_act_div'	=> array(
				'a_class'	=> 'btn,btn-danger',
				'a_text'	=> 'Выбрать картинку',
				),
			// 'label'		=> array(
			// 	'for' 	=> '__name',
			// 	// 'class'	=> 'col-sm-2,control-label',
			// 	'text' 	=> 'Password'
			// 	)
			),
		'type_prices'	=> array(
			'tag'		=> 'select',
			'id'		=> '__name',
			'data-asoc'	=> array($L_type_prices, 'id', 'article'),
			'class'		=> '__name,form-control',
			'value'		=> $RowData['type_prices'],
			'label'		=> array(
				'for'	=> '__name',
				'text'	=> 'Тип оплаты',
				),
			),
		'resBut' 	=> array(
			'tag'		=> 'button',
			'type'		=> 'reset',
			'id'		=> '__name',
			'class'		=> 'btn,btn-default',
			'value'		=> 'Сбросить',
			),
		'saveBut' 	=> array(
			'tag'		=> 'button',
			'type'		=> 'submit',
			'id'		=> '__name',
			'class'		=> 'btn,btn-success',
			'value'		=> 'Сохранить',
			),
	);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
<?
	$myForm = new gForm();
	// строим нашу форму
	// echo $myForm->formCreat($dataArray);
?>
-----------------------------------<br />
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-danger">Action</button>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control">
              </div>
			
<?
	//если у нас только одна форма без тега form то добавлем в вызов true
	echo $myForm->formCreat($dataArray_1, true);



// Отладочная информация
$tend=microtime(1); // Засекаем конечное время
// Округляем до двух знаков после запятой
$totaltime=round(($tend-$tstart),5);
// Результат на экран
echo " <br /> Отладочная информация<br />";
echo " Время генерации страницы: " . $totaltime . " сек.<br />";
$exec_time = $totaltime;
if(function_exists('memory_get_peak_usage'))
	echo "Пик испльзования памяти: " . round((memory_get_peak_usage() / 1024),2)  . " Kb <br />";

?>
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
