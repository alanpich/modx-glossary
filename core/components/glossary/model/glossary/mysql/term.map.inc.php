<?php
$xpdo_meta_map['Term']= array (
  'package' => 'glossary',
  'version' => '1.1',
  'table' => 'glossary',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'term' => NULL,
    'explanation' => NULL,
    'modified' => 'CURRENT_TIMESTAMP',
    'modified_by' => NULL,
  ),
  'fieldMeta' => 
  array (
    'term' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'explanation' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'modified' => 
    array (
      'dbtype' => 'timestamp',
      'phptype' => 'timestamp',
      'null' => false,
      'default' => 'CURRENT_TIMESTAMP',
      'extra' => 'on update current_timestamp',
    ),
    'modified_by' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
  ),
  'aggregates' => 
  array (
    'Editor' => 
    array (
      'class' => 'modUser',
      'local' => 'modified_by',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
