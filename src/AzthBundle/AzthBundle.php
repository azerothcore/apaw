<?php

namespace AzthBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AzthBundle extends Bundle {

    public function getContainerExtension()
    {
        return new DependencyInjection\AzthExtension();
    }

}
