<?php
class GlossaryTermCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'Term';
    public $languageTopics = array('glossary:default');
    public $objectType = 'glossary.term';
 
    public function beforeSave() {
        $term = $this->getProperty('term');
        if (empty($term)) {
            $this->addFieldError('term',$this->modx->lexicon('glossary.term_err_ns_term'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('glossary.term_err_ae_term'));
        }
        
        $explanation = $this->getProperty('explanation');
        if (empty($explanation)) {
            $this->addFieldError('explanation',$this->modx->lexicon('glossary.term_err_ns_term'));
        };
        
        return parent::beforeSave();
    }
}
return 'GlossaryTermCreateProcessor';

