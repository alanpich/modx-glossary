<?php
$properties = array(
    array(
        'name' => 'outerTpl',
        'desc' => 'prop_glossary.outerTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Glossary.listOuterTpl',
        'lexicon' => 'glossary:properties',
    ),
    array(
        'name' => 'groupTpl',
        'desc' => 'prop_glossary.groupTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Glossary.listGroupTpl',
        'lexicon' => 'glossary:properties',
    ),
    array(
        'name' => 'termTpl',
        'desc' => 'prop_glossary.termTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Glossary.listItemTpl',
        'lexicon' => 'glossary:properties',
    ),
    array(
        'name' => 'showNav',
        'desc' => 'prop_glossary.showNav_desc',
        'type' => 'list',
        'options' => array(
        		array('text' => 'Yes', 'value' => 1),
        		array('text' => 'No' , 'value' => 0)
        	),
        'value' => '1',
        'lexicon' => 'glossary:properties',
    ),
    array(
        'name' => 'navOuterTpl',
        'desc' => 'prop_glossary.navOuterTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Glossary.navOuterTpl',
        'lexicon' => 'glossary:properties',
    ),
    array(
        'name' => 'navItemTpl',
        'desc' => 'prop_glossary.navItemTpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Glossary.navItemTpl',
        'lexicon' => 'glossary:properties',
    ),
);
return $properties;
