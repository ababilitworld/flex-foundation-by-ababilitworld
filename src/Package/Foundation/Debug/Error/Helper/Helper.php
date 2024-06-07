<?php
    namespace Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation\Debug\Error\Helper;

    (defined( 'ABSPATH' ) && defined( 'WPINC' )) || die();

	use Ababilitworld\FlexTraitByAbabilitworld\Trait\StaticTrait\StaticTrait;
	
	if ( ! class_exists( '\Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation\Foundation\Debug\Error\Helper\Helper' ) ) 
	{
		class Helper 
		{
			use StaticTrait;
			
			public $wp_error;

			public function __construct()
			{
				$this->wp_error = new \WP_Error();
				add_action('admin_notices', array($this, 'wp_error_log' ) );
			}

			public function wp_add_error($handle,$message,$data)
			{
				$this->wp_error->add($handle,$message,$data);
			}

			public function wp_error_log($log_type='display')
			{				
				if($this->wp_error->has_errors() && $log_type == 'display')
				{
					foreach($this->wp_error->get_error_messages() as $error)
					{
						$class = 'notice notice-error';
						printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $error ) );
					}					
				}
			}	
		}
	
		/**
		 * Return the instance
		 *
		 * @return Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation\Foundation\Debug\Error\Helper\Helper
		 */
		function helper() 
		{
			return Helper::instance();
		}
	
	}
	
?>