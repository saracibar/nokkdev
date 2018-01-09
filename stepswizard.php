<?php 

function stepWizard($step){
	
	$stepswizard = array(
		"Step 1",
		"Step 2",
		"Step 3",
		"Step 4",
		"Step 5",
	);
	
	$wizard = '';
	
	
	foreach($stepswizard as $key => $value) {
		$paso = $key+1;
		
		if($step == $paso){
			$active = "current";
		}else{
			$active = "";
		}
		
		$wizard .= '
						<div class="form-nav-item '.$active.'"><span>'.$paso.'</span><br/> '.$value.'</div>
						';
	}
	
	
	return $wizard;
}


?>