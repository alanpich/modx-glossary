<?php
$eventName = $modx->event->name;
switch($eventName) {
//    case 'OnWebPagePrerender':
						case 'OnLoadWebDocument':
        /* do something else */

								// Grab resource ID to forward to
								$targetResId = $scriptProperties['glossaryPageId'];
								$chunkName = $scriptProperties['tpl'];

								// Load the Glossary worker class
								$path = $modx->getOption('core_path').'components/glossary/';
								if(!class_exists('Glossary')){ 
										require $path.'glossary.class.php';
										$Glossary = new Glossary($modx);
								};

								// Pass page content to worker method
 							$res = $modx->resource;
								if($res->get('id') != $targetResId){
										$content = $res->get('content');
										$content = $Glossary->linkifyContent($content,$targetResId,$chunkName);
										$res->set('content',$content);
								};





        break;
}