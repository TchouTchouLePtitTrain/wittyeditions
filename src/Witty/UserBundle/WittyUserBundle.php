<?php

namespace Witty\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WittyUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
