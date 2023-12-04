<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$dca = &$GLOBALS['TL_DCA']['tl_theme'];

PaletteManipulator::create()
    ->addLegend('huh_frontendFramework_legend', 'config_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('huh_frontendFramework', 'huh_frontendFramework_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_theme');

$dca['palettes']['__selector__'][] = 'huh_frontendFramework';

$dca['fields']['huh_frontendFramework'] = [
    'inputType' => 'select',
    'eval' => [
        'tl_class' => 'w50 clr',
        'includeBlankOption' => true,
        'chosen' => true,
        'submitOnChange' => true,
    ],
    'sql' => "varchar(16) NOT NULL default ''"
];