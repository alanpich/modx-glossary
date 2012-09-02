<?php
/* create the plugin object */
$plugin= $modx->newObject('modPlugin');
$plugin->set('id',1);
$plugin->set('name', 'GlossaryHighlighter');
$plugin->set('description', 'Glossary Term highlighter');
$plugin->set('plugincode', file_get_contents($sources['elements'] . 'plugins/plugin.GlossaryHighlighter.php'));
$plugin->set('category', 0);


/* add plugin events */
$event = $modx->newObject('modPluginEvent');
$event->set('event','OnLoadWebDocument');
$event->set('priority',0);
$event->set('propertyset',0);
$events = array($event);
$plugin->addMany($events);
$modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events.'); flush();
unset($events);

/* load plugin properties */
$properties = include $sources['data'].'properties/properties.plugin.GlossaryHighlighter.php';
$plugin->setProperties($properties);
$modx->log(xPDO::LOG_LEVEL_INFO,'Setting '.count($properties).' Plugin Properties.'); flush();

/* create vehicle for plugin */
$attributes= array(
    xPDOTransport::UNIQUE_KEY => 'name',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'PluginEvents' => array(
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => false,
            xPDOTransport::UNIQUE_KEY => array('pluginid','event'),
        ),
    ),
);
$vehicle = $builder->createVehicle($plugin, $attributes);
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in plugins...');
$builder->putVehicle($vehicle);
