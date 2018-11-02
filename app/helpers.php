<?php
function AddErrors($key, $errors)
{
	if(isset($errors))
	{
		$html_text = "";
		if(count($errors->get($key)) > 0){
			$html_text .= "<div class='alert alert-danger'><ul>";
			foreach ($errors->get($key) as $error)
				$html_text .= "<li> $error </li>";
	        $html_text .= "</ul></div>";
		}
		return $html_text;
	}
}

function AddCode($data)
{
	if($data['student_code'] !== null)
	{
		$html_text = "<div class='row alert alert-success'>";
		$html_text .= "<div class='col-sm-5 font-weight-bold'>".trans('StudentAdmission.student_code')." : </div>";
		$html_text .= "<div class='col-sm-7'><strong>".$data['student_code']."</strong></div>";
		$html_text .= "</div>";
		return $html_text;
	}
}


function MakeForm($data, $errors)
{
	$html_text = "";
	foreach ($data as $key => $val)
	{
	    if ($val === 'string')
	    {

	    	$html_text .= "<div class='form-group row'>
	    	<label name='".$key."' class='col-sm-3 col-form-label'>".trans("StudentAdmission.$key")."</label>
			<div class='col-sm-9'>
			    <input type='text' name='".$key."' value = '".old($key)."' class='form-control'>
			</div>";
			$html_text .= AddErrors($key, $errors)."</div>";

		}elseif( $val == 'date'){
			
			$html_text .= "<div class='form-group row'>
	    	<label name='".$key."' class='col-sm-3 col-form-label'>".trans("StudentAdmission.$key")."</label>
			<div class='col-sm-9'>
			    <input type='text' name='".$key."' value = '".old($key)."' class='datepicker form-control'>
			</div>";
		    $html_text .= AddErrors($key, $errors)."</div>";
	   
	    }elseif( $val == 'int' || $val == 'float' || $val == 'double'){
	    	
	    	$html_text .= "<div class='form-group row'>
	    	<label name='".$key."' class='col-sm-3 col-form-label'>".trans("StudentAdmission.$key")."</label>
			<div class='col-sm-9'>
			    <input type='number' name='".$key."' value = '".old($key)."' class='form-control'>
			</div>";
		    $html_text .= AddErrors($key, $errors)."</div>";

		}elseif(is_array($val)){

			$html_text .= "<div class='form-group row'>
	    	<label name='".$key."' class='col-sm-3 col-form-label'>".trans("StudentAdmission.$key")."</label>
			<div class='col-sm-9'>
			    <select name='".$key."'  class='form-control'>
			    	<option selected='selected'>select...</option>";
			    	foreach ($val as $k => $v){ 
			    		if($k == old($key))
			    			$html_text .= "<option selected='selected' value='".$k."'>".$v."</option>";
			    		else
			    			$html_text .= "<option value='".$k."'>".$v."</option>";
			    	}
			$html_text .= "</select>
						</div>";
		    $html_text .= AddErrors($key, $errors)."</div>";
		}
	}
	return $html_text;
}

function CreateTable($data)
{
	$headers = array_keys((array)$data[0]);
	$html_text = "<table class='table table-bordered'><tr>";
	$html_text .= "<th>#</th>";

	foreach ($headers as $head)
		$html_text .= "<th>".ucwords(str_replace("_", " ", str_replace("_id","",$head)))."</th>";
	$html_text .= "</tr>";

	foreach ($data as $key => $record) {
		$html_text .= "<tr>";
		$html_text .= "<th>".($key+1)."</th>";
		foreach ((array)$record as $elem)
			$html_text .= "<td>$elem</td>";
		$html_text .= "</tr>";
	}

	$html_text .= "</table>";
	return $html_text;
}

?>