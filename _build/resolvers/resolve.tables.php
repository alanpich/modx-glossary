<?php
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('core_path').'components/glossary/model/';
            $modx->addPackage('glossary',$modelPath);
 
            $manager = $modx->getManager();
 
            $manager->createObjectContainer('Term');
 
            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;

