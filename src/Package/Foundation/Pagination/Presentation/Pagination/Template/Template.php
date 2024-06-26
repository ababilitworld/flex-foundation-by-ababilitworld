<?php
namespace Ababilitworld\FlexFoundationByAbabilitworld\Package\Foundation\Pagination\Presentation\Pagination\Template;

(defined('ABSPATH') && defined('WPINC')) || die();

use Ababilitworld\FlexTraitByAbabilitworld\Standard\Standard;
use function Ababilitworld\{
    FlexPackageInfoByAbabilitworld\Package\Service\service as plugin_info,
    FlexFoundationByAbabilitworld\Package\package as package,
};

use const Ababilitworld\{
    FlexFoundationByAbabilitworld\PLUGIN_NAME,
    FlexFoundationByAbabilitworld\PLUGIN_FILE,
    FlexFoundationByAbabilitworld\PLUGIN_DIR,
    FlexFoundationByAbabilitworld\PLUGIN_URL,
    FlexFoundationByAbabilitworld\PLUGIN_VERSION,
    FlexFoundationByAbabilitworld\PLUGIN_PRE_HYPH,
    FlexFoundationByAbabilitworld\PLUGIN_PRE_UNDS,
};

if (!class_exists(__NAMESPACE__.'\Template')) 
{
    class Template 
    {
        use Standard;

        public function __construct() 
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts' ) );
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts' ) );
        }

        public function enqueue_scripts()
        {
            wp_enqueue_style(
                PLUGIN_PRE_HYPH . '-template-style', 
                PLUGIN_URL . '/src/Foundation/Pagination/Presentation/Pagination/Template/Asset/css/style.css',
                array(), 
                time()
            );

            wp_enqueue_script(
                PLUGIN_PRE_HYPH . '-template-script', 
                PLUGIN_URL . '/src/Foundation/Pagination/Presentation/Pagination/Template/Asset/js/script.js',
                array(), 
                time(), 
                true
            );
            
            wp_localize_script(
                PLUGIN_PRE_HYPH . '-template-script', 
                PLUGIN_PRE_UNDS . '_template_localize', 
                array(
                    'adminAjaxUrl' => admin_url('admin-ajax.php'),
                    'ajaxUrl' => admin_url('admin-ajax.php'),
                    'ajaxNonce' => wp_create_nonce(PLUGIN_PRE_UNDS . '_nonce'),
                    'ajaxAction' => PLUGIN_PRE_UNDS . '_action',
                    'ajaxData' => PLUGIN_PRE_UNDS . '_data',
                    'ajaxError' => PLUGIN_PRE_UNDS . '_error',
                )
            );
        }

        public static function render_pagination(array $paginationData) 
        {
            ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php            
                        for ($i = 1; $i <= $paginationData['total_pages']; $i++) 
                        {
                    ?>
                    <li class="page-item <?php echo ($i == $paginationData['current_page'] ? 'active' : '') ?> " >
                    <a class="page-link" href="?page=<?php echo esc_attr($i) ?>"><?php echo esc_html($i); ?></a>
                    </li>
                    <?php
                        }
                    ?>
                
                </ul>
            </nav>
            <?php
        }

        public function default_pagination_template(array $data) 
        {
            if ($data['pagination_links'])
            {
            ?>
            
                <div class="pagination" data-current-page="<?php echo esc_attr($data['paged']); ?>"><?php join("\n", $data['pagination_links']); ?></div>
                
            <?php
            }
        }
    }
	
    /**
     * Return the instance
     *
     * @return \Ababilitworld\FlexPaginationByAbabilitworld\Package\Presentation\Template\Template
     */
    function template() 
    {
        return Template::instance();
    }
}

?>