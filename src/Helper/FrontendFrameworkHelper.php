<?php

namespace HeimrichHannot\FrontendFrameworkBundle\Helper;

use Contao\LayoutModel;
use Contao\ThemeModel;
use HeimrichHannot\UtilsBundle\Util\Utils;

class FrontendFrameworkHelper
{
    private ?ThemeModel $theme;

    public function __construct(
        protected Utils $utils,
    )
    {
    }

    /**
     * Return the name (alias) of the current frontend framework
     */
    public function currentFramework(): string|null
    {
        return $this->currentTheme()?->huh_frontendFramework;
    }

    /**
     * Return the current theme
     */
    public function currentTheme(): ThemeModel|null
    {
        if (!isset($this->theme)) {
            $pageModel = $this->utils->request()->getCurrentPageModel();
            if (!$pageModel) {
                return null;
            }
            $pageModel->loadDetails();

            $layout = LayoutModel::findByPk($pageModel->layout);
            if (!$layout) {
                return null;
            }

            $this->theme = ThemeModel::findByPk($layout->pid);
        }

        return $this->theme;
    }
}