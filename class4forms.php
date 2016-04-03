<?

/**
* 
*/
class gForm {
	
	function formCreat($data) {
		$result = '';
		if (is_array($data)) {
			$result.= '<form ';
			foreach ($data as $Dkey => $D) {

				$newName = ($D == '__name') ? $data['name'] : $D;
				if ($Dkey == 'class') {
					$result.= $Dkey.'="'.$this->classRender($newName, $data['name']).'" ';
				} elseif ($Dkey == 'fileds') {
					$resultForms = '';
					foreach ($D as $FORMSkey => $FORMS) {
						$nameForms = $FORMSkey;
						if ($FORMS['tag'] == 'input') {
							// $resultForms.= $this->inputForm($FORMS);
						}
					} 
				} else {
					$result.= $Dkey.'="'.$newName.'" ';
				}

			}
			$result.= ' >';			
			$result.= '';
			$result.= '</form>';
		}
		return $result;
	}

	function classRender($classData, $name) {
		$expData = explode(',', $classData);
		if (is_array($expData)) {
			$classResult = '';
			foreach ($expData as $EDkey => $ED) {
				$classResult.= ($ED == '__name') ? $name.' ' : $ED.' ';
			}
		} else {
			$classResult = $classData;
		}
		return $classResult;
	}

	function inputForm($data) {

	}
}

function FunctionName($data) {
	if (is_array($data)) {
		# code...
	}
}
?>