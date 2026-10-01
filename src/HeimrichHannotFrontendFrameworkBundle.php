<?php

namespace HeimrichHannot\FrontendFrameworkBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotFrontendFrameworkBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

}