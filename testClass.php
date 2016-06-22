<?
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
												'text'	=> 'еще тест'
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
	echo $myForm->formCreat($dataArray);
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
