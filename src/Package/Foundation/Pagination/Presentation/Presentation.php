<?php

namespace Ababilitworld\FlexPaginationByAbabilitworld\Package\Foundation\Pagination\Presentation;

(defined('ABSPATH') && defined('WPINC')) || die();

use Ababilitworld\FlexTraitByAbabilitworld\Standard\Standard;
use function Ababilitworld\{
    FlexPluginInfoByAbabilitworld\Package\Service\service as plugin_info,
    FlexPaginationByAbabilitworld\Package\package as package,
};

if (!class_exists('\Ababilitworld\FlexPaginationByAbabilitworld\Package\Foundation\Pagination\Presentation\Presentation')) 
{
    class Presentation 
    {
        use Standard;

        private $package;

        public function __construct() 
        {
            $this->package = package();
        }
    }

    /**
     * Return the instance
     *
     * @return \Ababilitworld\FlexPaginationByAbabilitworld\Package\Foundation\Pagination\Presentation\Presentation
     */
    function presentation() 
    {
        return Presentation::instance();
    }
}

?>
