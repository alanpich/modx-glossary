<?php
/*
	Glossary of Terms
	
	
	Author: Alan Pich
	Email: alan.pich@gmail.com
	Date: August 2012


******************************/

$path = $modx->getOption('core_path').'components/glossary/';
if(!class_exists('Glossary')){ 
		require $path.'glossary.class.php';
};
		$Glossary = new Glossary($modx);

// Outputness
$output = '';

// Grab all terms grouped by first letter
$letters = $Glossary->getGroupedTerms();

// Show navigation list (if on)
if((bool) $scriptProperties['showNav']){

		$output.= '<div class="glossary-nav"><strong>Nav: </strong>';

		foreach($letters as $letter => $terms){
					if(count($terms)>0){
        $output.= '<span><a href="#'.$letter.'">'.$letter.'</a></span>';
#					} else {
#        $output.= '<span>'.$letter.'</span>';
					};
		};

		$output.= '</div>';
};



// Output all terms (grouped)
$termTpl = $scriptProperties['termTpl'];
foreach($letters as $letter => $terms){
			if(count($terms)>0){
					$output.= '<a name="#'.$letter.'"></a>';
					$output.= '<h4>'.$letter.'</h4>';
					foreach($terms as $term){
					   $params = array_merge($term,array(
														'anchor' => strtolower(str_replace(' ','-',$term['term']))
										));
								$output.= $modx->getChunk($termTpl,$params);
					};
			};
};


return $output;