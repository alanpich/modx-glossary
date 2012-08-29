<?php
class GlossaryHomeManagerController extends GlossaryManagerController {
    public function process(array $scriptProperties = array()) {
 
    }
    public function getPageTitle() { return $this->modx->lexicon('glossary'); }
    public function loadCustomCssJs() {
   		$this->addJavascript($this->glossary->config['assetsUrl'].'mgr/js/widgets/main.panel.js');
   		$this->addJavascript($this->glossary->config['assetsUrl'].'mgr/js/widgets/terms.grid.js');
   		$this->addJavascript($this->glossary->config['assetsUrl'].'mgr/js/widgets/term.window.create.js');
   		$this->addLastJavascript($this->glossary->config['assetsUrl'].'mgr/js/index.js');
    }
    public function getTemplateFile() { return $this->glossary->config['templatesPath'].'home.tpl'; }
}
