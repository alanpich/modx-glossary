<?php
require_once dirname(__FILE__) . '/glossary.class.php';
abstract class GlossaryManagerController extends modExtraManagerController {
    public $glossary;
    public function initialize() {
        $this->glossary = new Glossary($this->modx);
 
//      $this->addCss($this->doodles->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->glossary->config['assetsUrl'].'mgr/js/glossary.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Glossary.config = '.$this->modx->toJSON($this->glossary->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('glossary:default');
    }
    public function checkPermissions() { return true;}
}
class ControllerManagerController extends GlossaryManagerController {
    public static function getDefaultController() { return 'home'; }
}
