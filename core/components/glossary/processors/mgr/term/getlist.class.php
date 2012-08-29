<?php
class GlossaryTermGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'Term';
    public $languageTopics = array('glossary:default');
    public $defaultSortField = 'term';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'glossary.term';

public function prepareQueryBeforeCount(xPDOQuery $c) {
		$query = $this->getProperty('query');
		if (!empty($query)) {
		    $c->where(array(
		        'term:LIKE' => '%'.$query.'%',
		        'OR:explanation:LIKE' => '%'.$query.'%',
		    ));
		}
		return $c;
	}//

};// end class GlossaryTermGetListProcessor
return 'GlossaryTermGetListProcessor';
