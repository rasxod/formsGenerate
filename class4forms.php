<?

/**
* created 	2016
* autor 	Goncharov S
* site 		z1q.ru
* company	ssmart Lab.(ssmart.ru)
*/

class gForm {
	function formCreat($data, $once = false) {
		$result = '';
		if ($once == true) {
			$result = $this->sborka($data);
		} else {
			if (is_array($data)) {
				$result.= '<form ';
				foreach ($data as $Dkey => $D) {

					$newName = ($D == '__name') ? $data['name'] : $D;
					if ($Dkey == 'class') {
						$result.= $Dkey.'="'.$this->classRender($newName, $data['name']).'" ';
					} elseif ($Dkey == 'fileds') {
						$resultForms = $this->sborka($D);
					} else {
						$result.= $Dkey.'="'.$newName.'" ';
					}

				}
				$result.= ' >';			
				$result.= $resultForms;
				$result.= "\r\n".'</form>';
			}
		}
		return $result;
	}
	/**************************/
	function sborka($data) {
		$resultForms = '';
		foreach ($data as $FORMSkey => $FORMS) {
			$nameForms = $FORMSkey;
			if ($FORMS['tag'] == 'input') {
				$resultForms.= $this->obvertka('start');
				$resultForms.= $this->addLabel($FORMS['label'], $nameForms);
				$resultForms.= $this->inputForm($FORMS, $nameForms);
				$resultForms.= $this->obvertka('');
			}

			if ($FORMS['tag'] == 'textarea') {
				$resultForms.= $this->obvertka('start');
				$resultForms.= $this->addLabel($FORMS['label'], $nameForms);
				$resultForms.= $this->textareaForm($FORMS, $nameForms);
				$resultForms.= $this->obvertka('');
			}

			if ($FORMS['tag'] == 'select') {
				$resultForms.= $this->obvertka('start');
				$resultForms.= $this->addLabel($FORMS['label'], $nameForms);
				$resultForms.= $this->selectForm($FORMS, $nameForms);
				$resultForms.= $this->obvertka('');
			}
		}
		return $resultForms;

	}
	/**************************/
	function obvertka($type) {
		$retVal = ($type == 'start') ? "\r\n".'<div class="form-group">' : "\r\n".'</div>' ;
		return $retVal;
	}
	/**************************/
	function addLabel($data, $name) {
		if ($data == '') {
			$label = '';
		} else {
			$label = "\r\n".'<label';
			$doName = ($data['for'] == '__name') ? $name : $data['for'];
			$label .= ' for="'.$doName.'">';
			$label .= $data['text'];
			$label .= '</label>';
		}
		return $label;
	}
	/**************************/
	function doExplode($data) {
		$doData = str_replace(" ", "", $data);
		$doData = explode(',', $doData);
		return $doData;
	}
	/**************************/
	function classRender($classData, $name) {
		$expData = $this->doExplode($classData);
		if (is_array($expData)) {
			$classResult = '';
			foreach ($expData as $EDkey => $ED) {
				$classResult.= ($ED == '__name') ? $name.' ' : $ED.' ';
			}
		} elseif ($classData == '__name') {
			$classResult.= $name.' ';
		} else {
			$classResult = $classData;
		}
		return $classResult;
	}

	/*************************/
	public function inputForm($data, $name) {
		$html= "\r\n".'<input ';
		$html.= 'name="'.$name.'" ';
		$html.= 'type="'.$data['type'].'" ';
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		$html.= 'class="'.$this->classRender($data['class'], $name).'" ';
		$html.= 'value="'.$data['value'].'" ';
		$html.= '/>';
		return $html;
	}

	function textareaForm($data, $name) {
		$html = "\r\n".'<textarea ';
		$html.= 'name="'.$name.'" ';
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		$html.= 'class="'.$this->classRender($data['class'], $name).'" ';
		$html.= 'rows="'.$data['rows'].'" ';
		$html.= 'cols="'.$data['cols'].'" ';
		$html.= '>'.$data['value'];
		$html.= '</textarea>';

		return $html;
	}

	function selectForm($data, $name) {
		$html = "\r\n".'<select ';
		$html.= 'name="'.$name.'" ';
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		$html.= 'class="'.$this->classRender($data['class'], $name).'" ';
		$html.= ' '.$data['addParams'].' ';
		if ($data['size'] != '') {
			$html.= 'size="'.$data['size'].'" ';
		}
		$html.= '>';
		$values = $this->doExplode($data['value']);
		foreach ($data['data'] as $DAkey => $DA) {
			if($data['addParams'] == 'multiple' && is_array($values)) {
				foreach ($values as $key => $doVal) {
					if ($DA == $doVal) {
						$selected = 'selected';
						break;
					} else {
						$selected = '';
					}
				}
			} else {
				$selected = ($data['value'] == $DAkey) ? 'selected' : '' ;
			}
			
			$html.= "\r\n".'<option value="'.$DAkey.'" '.$selected.'>'.$DA.'</option>';
		}
		$html.= "\r\n".'</select>';

		return $html;
	}
}

?>