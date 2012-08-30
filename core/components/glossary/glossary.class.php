<?php class Glossary {


function __construct( &$modx ){
		$this->modx =& $modx;
		$this->loadConfig();
		
		$this->modx->addPackage('glossary',$this->config['modelPath']);
		
	}//




private function loadConfig(){
		$this->config = array(
		
			'templatesPath' => dirname(__FILE__).'/templates/',
			'assetsUrl' => $this->modx->getOption('assets_url').'components/glossary/',
			'connectorUrl' => $this->modx->getOption('assets_url').'components/glossary/connector.php',
			'processorsPath' => $this->modx->getOption('core_path').'components/glossary/processors/',
			'modelPath' => $this->modx->getOption('core_path').'components/glossary/model/'
		);
	}//





public function getGroupedTerms() {

		$terms = $this->modx->getCollection('Term');
		
		$letters = array('A'=>array(),'B'=>array(),'C'=>array(),'D'=>array(),'E'=>array(),'F'=>array(),'G'=>array(),'H'=>array(),'I'=>array(),'J'=>array(),'K'=>array(),'L'=>array(),'M'=>array(),'N'=>array(),'O'=>array(),'P'=>array(),'Q'=>array(),'R'=>array(),'S'=>array(),'T'=>array(),'U'=>array(),'V'=>array(),'W'=>array(),'X'=>array(),'Y'=>array(),'Z'=>array(),'0'=>array(),'1'=>array(),'2'=>array(),'3'=>array(),'4'=>array(),'5'=>array(),'6'=>array(),'7'=>array(),'8'=>array(),'9'=>array());		
		
		foreach( $terms as $termObj ){
			$term = $termObj->toArray();
			$firstLetter = strtoupper(substr($term['term'],0,1));			
			$letters[$firstLetter][] = $term;
		};		
		
		return $letters;		
	}//
	
	
	
public function getTerms(){
		$terms = $this->modx->getCollection('Term');
		$retArray = array();
		foreach($terms as $term){
			$retArray[] = $term->toArray();
		};
		return $retArray;
	}//



public function linkifyContent( $content, $targetResId ){
		// Generate URL to target page
		$target = $this->modx->makeUrl($targetResId,'web');
		
		// Parse and create links for each term
		$terms = $this->getTerms();
		foreach($terms as $term){
		
			$link = $target.'#'.strtolower(str_replace(' ','-',$term['term']));
			$pattern = '/('.$term['term'].')/';
			$replace = '<a class="glossary-link" href="'.$link.'">$1</a>';
			$content = preg_replace($pattern,$replace,$content);
		};
		return $content;
	}//




};// end class Glossary
