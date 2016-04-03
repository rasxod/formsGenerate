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
									'class'		=> '__name',
									'data'		=> array(1,2,3),
									'value'		=> ''
									),
					'myBigTextForm'	=> array(
									'tag'		=> 'textaria',
									'id'		=> '__name',
									'class'		=> '__name',
									'value'		=> ''
									)
					)
	);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?
	$myForm = new gForm();
	echo $myForm->formCreat($dataArray);
?>
</body>
</html>
