<?php
    namespace Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation;

    (defined( 'ABSPATH' ) && defined( 'WPINC' )) || exit();

	use Ababilitworld\FlexTraitByAbabilitworld\Standard\Standard;

	if ( ! class_exists( __NAMESPACE__.'\Foundation' ) ) 
	{
		/**
		 * Class Foundation
		 *
		 * @package \Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation\Foundation
		 */
		class Foundation 
		{
			use Standard;
	
			/**
			 * Constructor
			 */
			public function __construct() 
			{
				
			}
	
		}

		/**
		 * Return the instance
		 *
		 * @return \\AbabilItWorld\FlexFoundationByAbabilitworld\Package\Foundation\Package\Foundation
		 */
		function foundation() 
		{
			return Foundation::instance();
		}

	}
	
?>