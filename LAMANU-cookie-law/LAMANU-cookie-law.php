<?php
/*
Plugin Name: LAMANU-cookie-law
Version: 0.1
Plugin URI: http://www.
Description: WordPress Plugin for european cookie law.
Author: DHamelin
Author URI: http://www.
*/

// Ajouter les scripts dans la balise head du site
function LAMANU_scripts(){
	// Id de suivi GoogleAnalytics
	$TrackingID_GA = get_option('GA_ID', 'UA-00000000-0');
    ?>
    <script type="text/javascript" src=<?= plugin_dir_url( __FILE__ ) . 'js/tarteaucitron/tarteaucitron.js' ?> > </script>
    <script type="text/javascript">
        tarteaucitron.init({
    	  "privacyUrl": "", /* Privacy policy url */

    	  "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    	  "cookieName": "tarteaucitron", /* Cookie name */
    
    	  "orientation": "middle", /* Banner position (top - bottom) */
    	  "showAlertSmall": true, /* Show the small banner on bottom right */
    	  "cookieslist": true, /* Show the cookie list */

    	  "adblocker": false, /* Show a Warning if an adblocker is detected */
    	  "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
    	  "highPrivacy": true, /* Disable auto consent */
    	  "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    	  "removeCredit": false, /* Remove credit link */
    	  "moreInfoLink": true, /* Show more info link */
    	  "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */

    	  //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
                          
    	  "readmoreLink": "/cookiespolicy" /* Change the default readmore link */
        });
		</script>
		<script type="text/javascript"> 
			// la variable contenant l'id de suivi peut être utilisée dans un script externe
			var TrackingID = <?= $TrackingID_GA ?>;
		</script>
		<script type="text/javascript" src=<?= plugin_dir_url( __FILE__ ) . 'js/googleAnalytics.js' ?> > </script>
<?php
}
add_action( 'wp_head', 'LAMANU_scripts' );


// page de configuration dans le back-office du site WP
function option_view(){
	$test = 'view\option.php';
	require_once($test);
	// require_once plugin_dir_path( __FILE__) . $test;
	// require once : important != include : risque de ne pas être affiché
}
function plugin_setup_menu(){	
      add_menu_page('Configurer Google Analytics', 'Configurer GoogleAnalytics', 'manage_options', 'test-plugin', 'option_view' );
}
add_action('admin_menu','plugin_setup_menu');


// Enregistrer le numéro de suivi 
function display_options()
{
	// param 1 : nom du setting_field dans vue, param 2 : nom du champ contenant l'ID de suivi
	register_setting("header_section", "GA_ID");
}
//this action is executed after loads its core, after registering all actions, finds out what page to execute and before producing the actual output(before calling any action callback)
add_action("admin_init", "display_options");

?>