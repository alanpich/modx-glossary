<?php


$action= $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => PKG_NAME_LOWER,
    'parent' => 0,
    'controller' => 'controller',
    'haslayout' => true,
    'lang_topics' => 'glossary:default',
    'assets' => '',
),'',true,true);


$menu= $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'glossary',
    'parent' => 'components',
    'description' => 'glossary.description',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
),'',true,true);
$menu->addOne($action);



if (empty($menu)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in menu.');
$vehicle= $builder->createVehicle($menu,array (
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::UNIQUE_KEY => 'text',
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'Action' => array (
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => array ('namespace','controller'),
        ),
    ),
));
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in menu...');
$builder->putVehicle($vehicle);
