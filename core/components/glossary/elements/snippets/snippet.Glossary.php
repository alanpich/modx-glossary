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

   // Prepare letter chunks
		$tplLetters = '';
		foreach($letters as $letter => $terms){
					if(count($terms)>0){
        $tplLetters.= $modx->getChunk($navItemTpl,array('letter' => $letter));
					};
		};

		// Wrap letters in outer tpl
		$output.= $modx->getChunk($navOuterTpl,array( 'letters' => $tplLetters ));

};



// Output all terms (grouped)
$termTpl = $scriptProperties['termTpl'];
$groupTpl = $scriptProperties['groupTpl'];
$outerTpl = $scriptProperties['outerTpl'];
$groupsHTML = '';
foreach($letters as $letter => $terms){
			if(count($terms)>0){

					// Prepare Terms HTML
			  $termsHTML = '';
					foreach($terms as $term){
					   $params = array_merge($term,array(
														'anchor' => strtolower(str_replace(' ','-',$term['term']))
										));
								$termsHTML.= $modx->getChunk($termTpl,$params);
					};

					// Prepare letter wrapper HTML
					$groupsHTML .= $modx->getChunk($groupTpl,array(
											'items'=>$termsHTML,
											'letter' => $letter
										));
			};
};

// Add groups to outer wrapper
$output .= $modx->getChunk($outerTpl,array('groups'=>$groupsHTML));

return $output;