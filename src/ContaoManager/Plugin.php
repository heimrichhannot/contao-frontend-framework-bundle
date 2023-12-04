<?php

namespace HeimrichHannot\FrontendFrameworkBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use HeimrichHannot\FrontendFrameworkBundle\HeimrichHannotFrontendFrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class Plugin implements BundlePluginInterface, ConfigPluginInterface
{

    /**
     * @inheritDoc
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(HeimrichHannotFrontendFrameworkBundle::class)
            ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig)
    {
        $loader->load('@HeimrichHannotFrontendFrameworkBundle/config/services.yaml');
    }
}