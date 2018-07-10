<?hph


if(!define('ABSPATH')) die('-1');

//Class started
class stockVCExtendAddonClass{
	function __construct(){
		//We safely integrate with VC with this hook
		add_action('init', array($this, 'stockIntegrateWithVC'));
	}
	
	public function stockIntegrateWithVC() {
		//Checks if Visual composer is not installed]
		if ( !defined('WPB_VC_VERSION')){
			add_action('admin_notices', array($this, 'stockShowVcVersionNotice'));
		}
		
	//visual composer addons
	include STOCK_ACC_PATH .'/vc-addons/vc-slides.php';
	
	}
	
	//show visual composer cersion
	public function stockShowVcVersionNotice(){
	$theme_data = wp_get_theme();
	echo 
	<div class="notice notice-warning">
		<p>'.sprintf(__('<strong>%s </strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?"page=tgmpa-install_plugins" target="_blank">Visual Composer</a></strong>plugin to be installed and activated on your site.','stock-crazycafe'), $theme_data->get('name')).'</p>
	</div>
	
	}

}

//Finally initialize code
new stockVCExtendAddonClass();


