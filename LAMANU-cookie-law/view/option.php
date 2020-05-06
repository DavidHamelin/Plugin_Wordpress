<div class="wrap">

    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <form method="post" action="options.php">
    <?php
        // options.php, situé dans le répertoire wp_admin permet la connexion à la BDD

        //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
        settings_fields("header_section");

        // all the add_settings_field callbacks is displayed here
        do_settings_sections("test-plugin");
        ?> 
        <label for="GA_ID"> <b> ID de suivi : </b> </label>    
        <input type="text" id="GA_ID" name="GA_ID" value="<?=get_option('GA_ID', 'UA-00000000-0'); ?>" /> 
        <?php
        // get_option('champ_à_récupérer', 'valeur par défaut')
        // message de succès :
        if ( isset($_GET['settings-updated']) ) {
            echo '<div class="notice is-dismissible notice-success"><h3 style="margin:1em"> ID de suivi Google Analytics modifié !</h3></div>';
        }
        
        // Add the submit button to serialize the options
        submit_button();
    ?>

    </form>
</div>