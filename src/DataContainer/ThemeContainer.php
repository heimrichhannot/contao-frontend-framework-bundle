<?php

namespace HeimrichHannot\FrontendFrameworkBundle\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\Input;

class ThemeContainer
{
    #[AsCallback(table: 'tl_theme', target: 'config.onload', priority: 17)]
    public function onLoadCallback(DataContainer $dc = null): void
    {
        if (null === $dc || !($dc->id) || 'edit' !== Input::get('act')) {
            return;
        }

        foreach ($this->onFieldsFrontendFrameworkOptionsListener() as $value => $label) {
            $GLOBALS['TL_DCA']['tl_theme']['subpalettes']['huh_frontendFramework_'.$value] = '';
        }
    }

    #[AsCallback(table: 'tl_theme', target: 'fields.huh_frontendFramework.options')]
    public function onFieldsFrontendFrameworkOptionsListener(): array
    {
        return [
            'bootstrap3' => 'Bootstrap 3',
            'bootstrap4' => 'Bootstrap 4',
            'bootstrap5' => 'Bootstrap 5',
        ];
    }
}