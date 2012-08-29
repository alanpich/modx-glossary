<?php
class GlossaryTermUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'Term';
    public $languageTopics = array('glossary:default');
    public $objectType = 'glossary.term';
}
return 'GlossaryTermUpdateProcessor';
