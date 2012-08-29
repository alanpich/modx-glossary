<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';
 
$corePath = $modx->getOption('core_path').'components/glossary/';
require_once $corePath.'glossary.class.php';
$modx->glossary = new glossary($modx);
 
$modx->lexicon->load('glossary:default');
 
 
/* handle request */
$path = $modx->glossary->config['processorsPath'];
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
