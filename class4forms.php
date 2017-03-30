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
		$formArr = array(
			'input'			=> 'inputForm',
			'textarea'		=> 'textareaForm',
			'select'		=> 'selectForm',
			'button'		=> 'buttonForm'
			);
		$resultForms = '';
		foreach ($data as $FORMSkey => $FORMS) {
			$nameForms = $FORMSkey;
				if ($FORMS['doAddDiv'] != '') {
					$resultForms.= $this->obvertka('start', $FORMS['doAddDiv']);
				} else {
					$resultForms.= $this->obvertka('start');
				}
				
				$resultForms.= $this->addLabel($FORMS['label'], $nameForms);
				eval('$resultForms.= $this->'.$formArr[$FORMS['tag']].'($FORMS, $nameForms);');
				$resultForms.= $this->obvertka('');
		}
		return $resultForms;

	}
	/**************************/
	function obvertka($type, $data = false) {
		if ($type == 'start') {
			$retVal = "\r\n".'<div class="form-group '.$data.'">';
		} elseif ($type == 'div') {
			$retVal = "\r\n".$data;
		} else {
			$retVal = "\r\n".'</div>';
		}
		
		return $retVal;
	}
	/**************************/
	function addLabel($data, $name) {
		if ($data == '') {
			$label = '';
		} else {
			$label = "\r\n".'<label';
			$doName = ($data['for'] == '__name') ? $name : $data['for'];
			$label .= ' class="'.$this->classRender($data['class'], $name).'"';
			$label .= ' for="'.$doName.'">';
			$label .= $data['text'];
			$label .= '</label>';
		}
		return $label;
	}
	/**************************/
	function doExplode($data, $expPatern = ',') {
		$doData = str_replace(" ", "", $data);
		$doData = explode($expPatern, $doData);
		return $doData;
	}
	/**************************/
	function classRender($classData, $name) {
		$expData = $this->doExplode($classData);
		if (is_array($expData) && count($expData)>1) {
			$classResult = '';
			foreach ($expData as $EDkey => $ED) {
				$classResult.= ($ED == '__name') ? $name.' ' : $ED.' ';
			}
		} elseif ($classData == '__name') {
			$classResult.= $name;
		} else {
			$classResult = $classData;
		}
		return $classResult;
	}

	/*************************/
	function inputForm($data, $name) {
		$html= "\r\n".'<input ';
		$html.= 'name="'.$name.'" ';
		$html.= 'type="'.$data['type'].'" ';
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		$html.= 'class="'.$this->classRender($data['class'], $name).'" ';
		$html.= 'value="'.$data['value'].'" ';
		$html.= ($data['placeholder'] != '' ) ? 'placeholder="'.$data['placeholder'].'" ' : '';
		foreach ($data as $dkey => $D) {
			$nameKey = $this->doExplode($dkey, '-');
			$html.= ($nameKey['0'] == 'data' ) ? $dkey.'="'.$data[$dkey].'" ' : '';
		}
		
		$html.= '/>';
		if ($data['addDiv'] != '') {
			$html_1 = $this->obvertka('div', $data['addDiv']);
			$html_1.= $html;
			$html_1.= $this->obvertka('');
			$html = $html_1; 
		}
		return $html;
	}
	function buttonForm($data, $name) {
		$html= "\r\n".'<button ';
		$html.= 'name="'.$name.'" ';
		$html.= ($data['type'] != '') ? 'type="'.$data['type'].'" ' : '' ;
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		foreach ($data as $dkey => $D) {
			$nameKey = $this->doExplode($dkey, '-');
			$html.= ($nameKey['0'] == 'data' ) ? $dkey.'="'.$data[$dkey].'" ' : '';
		}
		$html.= 'class="'.$this->classRender($data['class'], $name).'">';
		$html.= $data['value'];
		$html.= '</button>';
		if ($data['addDiv'] != '') {
			$html_1 = $this->obvertka('div', $data['addDiv']);
			$html_1.= $html;
			$html_1.= $this->obvertka('');
			$html = $html_1; 
		}
		return $html;
	}

	function textareaForm($data, $name) {
		$html = "\r\n".'<textarea ';
		$html.= 'name="'.$name.'" ';
		$html.= 'id="'.$this->classRender($data['id'], $name).'" ';
		$html.= 'class="'.$this->classRender($data['class'], $name).'" ';
		$html.= 'rows="'.$data['rows'].'" ';
		$html.= 'cols="'.$data['cols'].'" ';
		foreach ($data as $dkey => $D) {
			$nameKey = $this->doExplode($dkey, '-');
			$html.= ($nameKey['0'] == 'data' ) ? $dkey.'="'.$data[$dkey].'" ' : '';
		}
		$html.= '>'.$data['value'];
		$html.= '</textarea>';
		if ($data['addDiv'] != '') {
			$html_1 = $this->obvertka('div', $data['addDiv']);
			$html_1.= $html;
			$html_1.= $this->obvertka('');
			$html = $html_1; 
		}

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
		foreach ($data as $dkey => $D) {
			$nameKey = $this->doExplode($dkey, '-');
			$html.= ($nameKey['0'] == 'data' ) ? $dkey.'="'.$data[$dkey].'" ' : '';
		}
		$html.= '>';
		$values = $this->doExplode($data['value']);
		if ($data['data'] != '') {
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
				
				if (is_array($DA)) {				
					$html.= "\r\n".'<option value="'.$DAkey.'" '.$selected.'>'.$DA.'</option>';
				} else {
					$html.= "\r\n".'<option value="'.$DAkey.'" '.$selected.'>'.$DA.'</option>';
				}
			}
		}
		if ($data['data-asoc'] != '') {
			$selectors_1 = $data['data-asoc'][1];
			$selectors_2 = $data['data-asoc'][2];
			foreach ($data['data-asoc'][0] as $DAkey => $DA) {
				if($data['addParams'] == 'multiple' && is_array($values)) {
					foreach ($values as $key => $doVal) {
						if ($DA[$selectors_1] == $doVal) {
							$selected = 'selected';
							break;
						} else {
							$selected = '';
						}
					}
				} else {
					$selected = ($data['value'] == $DA[$selectors_1]) ? 'selected' : '' ;
				}
				$html.= "\r\n".'<option value="'.$DA[$selectors_1].'" '.$selected.'>'.$DA[$selectors_2].'</option>';
			}
		}
		$html.= "\r\n".'</select>';
		if ($data['addDiv'] != '') {
			$html_1 = $this->obvertka('div', $data['addDiv']);
			$html_1.= $html;
			$html_1.= $this->obvertka('');
			$html = $html_1; 
		}

		return $html;
	}
}

?>