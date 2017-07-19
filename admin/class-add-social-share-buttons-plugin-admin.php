<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/admin
 * @author     Multidots <inquiry@multidots.in>
 */
class Add_Social_Share_Buttons_Plugin_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style('wp-pointer');
        wp_enqueue_style('add-social-share-buttons-plugin-admin', plugin_dir_url(__FILE__) . 'css/add-social-share-buttons-plugin-admin.css', array('wp-jquery-ui-dialog'), $this->version, 'all');
        wp_enqueue_style('chosen-css', plugin_dir_url(__FILE__) . 'css/chosen.css', array(), $this->version, 'all');
        wp_enqueue_script('wp-pointer');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('add-social-share-buttons-plugin-admin', plugin_dir_url(__FILE__) . 'js/add-social-share-buttons-plugin-admin.js', array('jquery', 'jquery-ui-dialog'), $this->version, false);
        wp_enqueue_script('jquery-validate-min', plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', $this->version, false);
        wp_enqueue_script('chosen-jquery-js', plugin_dir_url(__FILE__) . 'js/chosen.jquery.js', '4.5.2');
    }

    /**
     * add plugin main menu in admin menu
     *
     */
    public function whatsapp_sharing_custom_menu() {

        //add admin main Crea plugins menu

        add_submenu_page('options-general.php', ADSSB_PLUGIN_PAGE_MENU_TITLE, __(ADSSB_PLUGIN_NAME, ADSSB_PLUGIN_SLUG), 'manage_options', ADSSB_PLUGIN_PAGE_MENU_SLUG, 'custom_whatsapp_sharing_setting_html');

        /**
         * function for plugin admin menu callback html function
         */
        function custom_whatsapp_sharing_setting_html() {
            global $wpdb;
            $current_user = wp_get_current_user();

            if (!get_option('assb_plugin_notice_shown')) {
                echo '<div id="assb_dialog" title="Basic dialog"> <p> Subscribe for latest plugin update and get notified when we update our plugin and launch new products for free! </p> <p><input type="text" id="txt_user_sub_assb" class="regular-text" name="txt_user_sub_assb" value="' . $current_user->user_email . '"></p></div>';
            }

            //get settings option
            $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
            $get_share_settings = maybe_unserialize($get_share_settings);

            $get_services = get_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY);
            $get_services = maybe_unserialize($get_services);

            $sharesmallimagearray = array();

            $sharesmallimagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_small.png';
            $sharesmallimagearray['Viber'] = ASSB_PATH . '/images/viber_small.png';
            $sharesmallimagearray['Facebook'] = ASSB_PATH . '/images/facebook_small.png';
            $sharesmallimagearray['Twitter'] = ASSB_PATH . '/images/twitter_small.png';
            $sharesmallimagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_small.png';
            $sharesmallimagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_small.png';

            $sharemediumimagearray = array();
            $sharemediumimagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_medium.png';
            $sharemediumimagearray['Viber'] = ASSB_PATH . '/images/viber_medium.png';
            $sharemediumimagearray['Facebook'] = ASSB_PATH . '/images/facebook_medium.png';
            $sharemediumimagearray['Twitter'] = ASSB_PATH . '/images/twitter_medium.png';
            $sharemediumimagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_medium.png';
            $sharemediumimagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_medium.png';

            $sharelargeagearray = array();
            $sharelargeagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_large.png';
            $sharelargeagearray['Viber'] = ASSB_PATH . '/images/viber_large.png';
            $sharelargeagearray['Facebook'] = ASSB_PATH . '/images/facebook_large.png';
            $sharelargeagearray['Twitter'] = ASSB_PATH . '/images/twitter_large.png';
            $sharelargeagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_large.png';
            $sharelargeagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_large.png';
            ?>

            <!--create share settings html-->	
            <div class="whatsapp-share-containar">
                <fieldset class="fs_global">
                    <legend><div class="whatsapp-share-header"><h2><?php echo __(ADSSB_PLUGIN_HEADER_NAME, ADSSB_PLUGIN_SLUG); ?></h2></div></legend>
                    <div class="whatsapp-share-contain">

                        <form id="whatsapp_share_plugin_form_id" method="post" action="<?php echo get_admin_url(); ?>admin-post.php" enctype="multipart/form-data" novalidate="novalidate">
                            <input type='hidden' name='action' value='submit-form' />
                            <input type='hidden' name='action-which' value='add' />

                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_ICON_SIZE, ADSSB_PLUGIN_SLUG); ?></th>
                                        <td>
                                            <select class="check_button_size" name="share_icon_size" id="share_icon_size">
            <?php if ($get_share_settings['share_button_size'] != '' && !empty($get_share_settings['share_button_size'])) { ?>
                                                    <option <?php if ($get_share_settings['share_button_size'] == "small") {
                    echo 'selected';
                } ?> value="small">small</option>
                                                    <option <?php if ($get_share_settings['share_button_size'] == "medium") {
                    echo 'selected';
                } ?> value="medium">medium</option>
                                                    <option <?php if ($get_share_settings['share_button_size'] == "large") {
                    echo 'selected';
                } ?> value="large">large</option>
            <?php } else { ?>
                                                    <option value="small">small</option>
                                                    <option value="medium">medium</option>
                                                    <option value="large">large</option>
            <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label for="pluginname"><?php echo __(ADSSB_PLUGIN_SHARE_BTN, ADSSB_PLUGIN_SLUG); ?></label></th>
                                        <td>
                                            <input type="button" id="add_share_service" class="button button-primary" value="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_BTN, ADSSB_PLUGIN_SLUG); ?>">
                                            <?php if (!empty($get_services['share_button']) && $get_services['share_button'] != '') { ?>
                                                <?php $buttonCount = count($get_services['share_button']);
                                                if ($buttonCount > 1) {
                                                    ?>
                                                    <input type="button" id="reorder_share_service" class="button button-primary" value="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_BTN, ADSSB_PLUGIN_SLUG); ?>">
                                                    <?php } ?>
                                                <?php } ?>
                                            <div class="display_added_services">
                                                <?php
                                                if (!empty($get_services) && $get_services != '') {
                                                    if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                                        foreach ($get_services['share_button'] as $key => $values) {

                                                            if ($get_share_settings['share_button_size'] != '' && !empty($get_share_settings['share_button_size'])) {

                                                                if ($get_share_settings['share_button_size'] == 'small') {
                                                                    ?><img src="<?php echo $sharesmallimagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                                                } elseif ($get_share_settings['share_button_size'] == 'medium') {
                                                                    ?><img src="<?php echo $sharemediumimagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                                                } elseif ($get_share_settings['share_button_size'] == 'large') {
                                                                    ?><img src="<?php echo $sharelargeagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                                                }
                                                            } else {
                                                                ?><img src="<?php echo $sharesmallimagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_INCLUDE_POST, ADSSB_PLUGIN_SLUG); ?></th>
                                        <td class="set_fonts">
                                            <?php
                                            $post_types = get_post_types();
                                            $html = '';
                                            $html .='
	                                        <select id="post_type" data-placeholder="Add Page/Post Type" name="show_posttype[]" multiple="true" class="chosen-select-post category-select chosen-rtl validate_field1">
												<option value=""></option>';
                                            if (isset($post_types) && !empty($post_types)) {
                                                foreach ($post_types as $cpost) {
                                                    if ($cpost != "attachment" && $cpost != "revision" && $cpost != "nav_menu_item" && $cpost != "product_variation" && $cpost != "shop_order" && $cpost != "shop_order_refund" && $cpost != "shop_coupon" && $cpost != "shop_webhook" && $cpost != "scheduled-action" && $cpost != "shop_subscription" && $cpost != "wpcf7_contact_form" && $cpost != "mc4wp-form") {
                                                        if ($get_share_settings['share_posttype'] != '' && !empty($get_share_settings['share_posttype'])) {
                                                            if (in_array($cpost, $get_share_settings['share_posttype'])) {
                                                                $html .='<option selected value="' . $cpost . '">' . $cpost . '</option>';
                                                            } else {
                                                                $html .='<option value="' . $cpost . '">' . $cpost . '</option>';
                                                            }
                                                        } else {
                                                            $html .='<option value="' . $cpost . '">' . $cpost . '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                            $html .='</select><span class="add_posttype_note">( ' . __(ADSSB_PLUGIN_POSTTYPE_NOTE, ADSSB_PLUGIN_SLUG) . ' )</span>';
                                            echo $html;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_SERVICE_PLACEMENT, ADSSB_PLUGIN_SLUG); ?></th>
                                        <td>
                                            <select name="share_buttom_place" id="chosen_button_place">
                                                <?php if ($get_share_settings['button_placement'] != '' && !empty($get_share_settings['button_placement'])) { ?>
                                                    <option <?php if ('bottom' == $get_share_settings['button_placement']) {
                                        echo 'selected';
                                    } ?>  value="bottom">Bottom</option>
                                                    <option <?php if ('top' == $get_share_settings['button_placement']) {
                                        echo 'selected';
                                    } ?> value="top">Top</option>
                                                    <option <?php if ('topbottom' == $get_share_settings['button_placement']) {
                                        echo 'selected';
                                    } ?> value="topbottom">Top & Bottom</option>
            <?php } else { ?>
                                                    <option value="bottom">Bottom</option>
                                                    <option value="top">Top</option>
                                                    <option value="topbottom">Top & Bottom</option>
                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
       
                                    <tr>
                                        <th scope="row"><label  for="pluginname"><?php echo __(ADSSB_PLUGIN_INCLUDE_LISTING_PAGE, ADSSB_PLUGIN_SLUG); ?></label></th>
                                        <td><input <?php if ('1' == $get_share_settings['include_pro_listing_page']) {
                echo 'checked';
            } ?> type="checkbox" name="include_listing_page" value="1" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label  for="pluginname"><?php echo __(ADSSB_PLUGIN_ADDITIONAL_STYLE_TITLE, ADSSB_PLUGIN_SLUG); ?></label></th>
                                        <td><textarea name="add_custom_service_style" id="add_custom_service_style" class="code" style="width: 50%; font-size: 12px;" rows="6" cols="50"><?php echo isset($get_share_settings['include_custom_styles']) ? $get_share_settings['include_custom_styles'] : ''; ?></textarea></td>
                                    </tr>							
                                </tbody>
                            </table>

                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_OPTION_SAVE_BTN, ADSSB_PLUGIN_SLUG); ?>" class="button button-primary" id="submit_plugin" name="submit_plugin"></p>
                        </form>
                    </div>

                    <div id="display_all_services" title="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_HEADER_TITLE, ADSSB_PLUGIN_SLUG); ?>" style="display:none;">
                        <form id="add_share_button_plugin_form_id" method="post" action="<?php echo get_admin_url(); ?>admin-post.php" enctype="multipart/form-data" novalidate="novalidate">
                            <input type='hidden' name='action' value='add-service-form' />
                            <input type='hidden' name='action-which' value='add' />
                            <ul class="new_services">
            <?php if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) { ?>
                                    <li><input <?php if (in_array('Whatsapp', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" name="sharebutton[]" value="Whatsapp"><img src="<?php echo ASSB_PATH . '/images/whatsapp_large.png'; ?>" alt="Whatsapp"></li>
                                    <li><input <?php if (in_array('Viber', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" name="sharebutton[]" value="Viber"><img src="<?php echo ASSB_PATH . '/images/viber_large.png'; ?>" alt="Viber"></li>
                                    <li><input <?php if (in_array('Facebook', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" id="facebbok_checked" name="sharebutton[]" value="Facebook"><img src="<?php echo ASSB_PATH . '/images/facebook_large.png'; ?>" alt="Facebook"></li>
                                    <li><input <?php if (in_array('Twitter', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" name="sharebutton[]" value="Twitter"><img src="<?php echo ASSB_PATH . '/images/twitter_large.png'; ?>" alt="Twitter"></li>
                                    <li><input <?php if (in_array('Google_plus', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" name="sharebutton[]" value="Google_plus"><img src="<?php echo ASSB_PATH . '/images/googleplus_large.png'; ?>" alt="Google_plus"></li>
                                    <li><input <?php if (in_array('Linkedin', $get_services['share_button'])) {
                    echo 'checked';
                } ?> type="checkbox" name="sharebutton[]" value="Linkedin"><img src="<?php echo ASSB_PATH . '/images/linkedin_large.png'; ?>" alt="linkedin"></li>
                            <?php } else { ?>
                                    <li><input type="checkbox" name="sharebutton[]" value="Whatsapp"><img src="<?php echo ASSB_PATH . '/images/whatsapp_large.png'; ?>" alt="Whatsapp"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Viber"><img src="<?php echo ASSB_PATH . '/images/viber_large.png'; ?>" alt="Viber"></li>
                                    <li><input type="checkbox" id="facebbok_checked" name="sharebutton[]" value="Facebook"><img src="<?php echo ASSB_PATH . '/images/facebook_large.png'; ?>" alt="Facebook"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Twitter"><img src="<?php echo ASSB_PATH . '/images/twitter_large.png'; ?>" alt="Twitter"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Google_plus"><img src="<?php echo ASSB_PATH . '/images/googleplus_large.png'; ?>" alt="Google_plus"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Linkedin"><img src="<?php echo ASSB_PATH . '/images/linkedin_large.png'; ?>" alt="Linkedin"></li>
                            <?php } ?>
                            </ul>
                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_POPUP_BTN, ADSSB_PLUGIN_SLUG); ?>" class="button button-primary" id="submit_services" name="submit_services"></p>
                        </form>
                    </div>

                    <div id="reorder_all_services" title="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_HEADER_TITLE, ADSSB_PLUGIN_SLUG); ?>" style="display:none;">
                        <div class="reorder_note"><?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_POPUP_NOTE, ADSSB_PLUGIN_SLUG); ?></div>
                        <form id="add_share_button_plugin_form_id" method="post" action="<?php echo get_admin_url(); ?>admin-post.php" enctype="multipart/form-data" novalidate="novalidate">
                            <input type='hidden' name='action' value='reorder-service-form' />
                            <input type='hidden' name='action-which' value='add' />

                        <?php if (!empty($get_services) && $get_services != '') { ?>

                            <?php if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) { ?>
                                    <ul id="sortable">

                                <?php foreach ($get_services['share_button'] as $key => $values) { ?>
                                            <li><input type="hidden" name="sharebutton[]" value="<?php echo $values; ?>"><img src="<?php echo $sharelargeagearray[$values]; ?>" alt="<?php echo $values; ?>"></li>
                                <?php } ?>

                                    </ul>
                <?php } ?>

            <?php } ?>
                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_POPUP_BTN, ADSSB_PLUGIN_SLUG); ?>" class="button button-primary" id="submit_services" name="submit_services"></p>
                        </form>
                    </div>


                    <div class="button_small_icon_html" style="display:none;">

                        <?php
                        if (!empty($get_services) && $get_services != '') {
                            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                foreach ($get_services['share_button'] as $key => $values) {
                                    ?><img src="<?php echo $sharesmallimagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="button_medium_icon_html" style="display:none;">

                        <?php
                        if (!empty($get_services) && $get_services != '') {
                            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                foreach ($get_services['share_button'] as $key => $values) {
                                    ?><img src="<?php echo $sharemediumimagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                                }
                            }
                        }
                        ?>

                    </div>

                    <div class="button_large_icon_html" style="display:none;">

                <?php
                if (!empty($get_services) && $get_services != '') {
                    if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                        foreach ($get_services['share_button'] as $key => $values) {
                            ?><img src="<?php echo $sharelargeagearray[$values]; ?>" alt="<?php echo $values; ?>"><?php
                        }
                    }
                }
                ?>

                    </div>
                </fieldset>	
            <?php
            }

        }

        /**
         * function for add or update share amin settings
         *
         */
        public function whatsapp_share_setting_add_update() {
            global $wpdb, $wp, $post;

            //get action
            $submitAction = isset($_POST['action']) ? $_POST['action'] : '';
            $submitFormAction = isset($_POST['action-which']) ? $_POST['action-which'] : '';

            //get settings valus
            $showPosttype = isset($_POST['show_posttype']) ? $_POST['show_posttype'] : '';
            $buttonPlacement = isset($_POST['share_buttom_place']) ? $_POST['share_buttom_place'] : '';
            $facebookApiKey = isset($_POST['facebook_api_key']) ? $_POST['facebook_api_key'] : '';
            $shareIconSize = isset($_POST['share_icon_size']) ? $_POST['share_icon_size'] : '';
            $includeListingPage = isset($_POST['include_listing_page']) ? $_POST['include_listing_page'] : '0';
            $addCustomServiceStyle = isset($_POST['add_custom_service_style']) ? $_POST['add_custom_service_style'] : '';

            $ShareSettingArray = array();

            //check action 
            if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'submit-form') {

                //create share settings array
                $ShareSettingArray['share_posttype'] = $showPosttype;
                $ShareSettingArray['button_placement'] = $buttonPlacement;
                $ShareSettingArray['facebook_apikey'] = $facebookApiKey;
                $ShareSettingArray['share_button_size'] = $shareIconSize;
                $ShareSettingArray['include_pro_listing_page'] = $includeListingPage;
                $ShareSettingArray['include_custom_styles'] = $addCustomServiceStyle;

                //serialize share settings array
                $ShareSettingArray = maybe_serialize($ShareSettingArray);

                //update share setting array
                update_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY, $ShareSettingArray);
            }

            //redirect whatsapp share page
            wp_safe_redirect(site_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG));
            exit();
        }

        /**
         * function for whatsapp share button add or remove
         *
         */
        public function whatsapp_share_add_remove_services() {
            global $wpdb, $wp, $post;
            //get action
            $submitAction = isset($_POST['action']) ? $_POST['action'] : '';

            //get action type
            $submitFormAction = isset($_POST['action-which']) ? $_POST['action-which'] : '';

            //get share button array
            $shareButton = isset($_POST['sharebutton']) ? $_POST['sharebutton'] : '';
            $ShareServicesArray = array();

            //check action type is add  and action is add-service-form
            if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'add-service-form') {

                //create share button array
                $ShareServicesArray['share_button'] = $shareButton;

                //share button array serialize
                $ShareServicesArray = maybe_serialize($ShareServicesArray);

                //update share button array
                update_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY, $ShareServicesArray);
            }

            //redirect whatsapp share page
            wp_safe_redirect(site_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG));

            exit();
        }

        public function whatsapp_share_reorder_services() {
            global $wpdb, $wp, $post;

            //get action
            $submitAction = isset($_POST['action']) ? $_POST['action'] : '';

            //get action type
            $submitFormAction = isset($_POST['action-which']) ? $_POST['action-which'] : '';

            $shareButton = isset($_POST['sharebutton']) ? $_POST['sharebutton'] : '';
            $ShareServicesArray = array();

            //check action type is add  and action is add-service-form
            if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'reorder-service-form') {

                //create share button array
                $ShareServicesArray['share_button'] = $shareButton;

                //share button array serialize
                $ShareServicesArray = maybe_serialize($ShareServicesArray);

                //update share button array
                update_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY, $ShareServicesArray);
            }

            //redirect whatsapp share page
            wp_safe_redirect(site_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG));

            exit();
        }

        public function wp_add_plugin_userfn_assb() {
            $email_id = $_POST['email_id'];
            $log_url = $_SERVER['HTTP_HOST'];
            $cur_date = date('Y-m-d');
            $url = 'http://www.multidots.com/store/wp-content/themes/business-hub-child/API/wp-add-plugin-users.php';
            $response = wp_remote_post($url, array('method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('user' => array('user_email' => $email_id, 'plugin_site' => $log_url, 'status' => 1, 'plugin_id' => '24', 'activation_date' => $cur_date)),
                'cookies' => array()));
            update_option('assb_plugin_notice_shown', 'true');
        }

        public function hide_subscribe_assbfn() {
            $email_id = $_POST['email_id'];
            update_option('assb_plugin_notice_shown', 'true');
        }

        public function custom_assb_pointers_footer() {
            $admin_pointers = custom_assb_pointers_admin_pointers();
            ?>
            <script type="text/javascript">
                /* <![CDATA[ */
                (function($) {
        <?php
        foreach ($admin_pointers as $pointer => $array) {
            if ($array['active']) {
                ?>
                            $('<?php echo $array['anchor_id']; ?>').pointer({
                                content: '<?php echo $array['content']; ?>',
                                position: {
                                    edge: '<?php echo $array['edge']; ?>',
                                    align: '<?php echo $array['align']; ?>'
                                },
                                close: function() {
                                    $.post(ajaxurl, {
                                        pointer: '<?php echo $pointer; ?>',
                                        action: 'dismiss-wp-pointer'
                                    });
                                }
                            }).pointer('open');
                    <?php
                }
            }
            ?>
                })(jQuery);
                /* ]]> */
            </script>
            <?php
        }

        // Function For Welcome page to plugin 

        public function welcome_assb_screen_do_activation_redirect() {

            if (!get_transient('_welcome_screen_assb_activation_redirect_data')) {
                return;
            }

            // Delete the redirect transient
            delete_transient('_welcome_screen_assb_activation_redirect_data');

            // if activating from network, or bulk
            if (is_network_admin() || isset($_GET['activate-multi'])) {
                return;
            }
            // Redirect to extra cost welcome  page
            wp_safe_redirect(add_query_arg(array('page' => 'wp-add-social-share-buttons&tab=about'), admin_url('index.php')));
        }

        public function welcome_pages_screen_assb() {
            add_dashboard_page(
                    'Add Social Share Buttons Plugin Dashboard', 'Add Social Share Buttons Plugin Dashboard', 'read', 'wp-add-social-share-buttons', array(&$this, 'welcome_screen_content_assb')
            );
        }

        public function welcome_screen_content_assb() {
            ?>

            <div class="wrap about-wrap">
                <h1 style="font-size: 2.1em;"><?php printf(__('Welcome to Add Social Share Messenger Buttons Whatsapp and Viber', 'add-social-share-buttons')); ?></h1>

                <div class="about-text woocommerce-about-text">
                    <?php
                    $message = '';
                    printf(__('%s Easy to Add Social Share Buttons in Custom Post, Page and Product page.  Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.', 'add-social-share-buttons'), $message, $this->version);
                    ?>
                    <img class="version_logo_img" src="<?php echo plugin_dir_url(__FILE__) . 'images/assb.png'; ?>">
                </div>

                <?php
                $setting_tabs_wc = apply_filters('woo_assb_setting_tab', array("about" => "Overview", "other_plugins" => "Checkout our other plugins"));
                $current_tab_wc = (isset($_GET['tab'])) ? $_GET['tab'] : 'general';
                $aboutpage = isset($_GET['page'])
                ?>
                <h2 id="woo-extra-cost-tab-wrapper" class="nav-tab-wrapper">
        <?php
        foreach ($setting_tabs_wc as $name => $label)
            echo '<a  href="' . home_url('wp-admin/index.php?page=wp-add-social-share-buttons&tab=' . $name) . '" class="nav-tab ' . ( $current_tab_wc == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
        ?>
                </h2>

            <?php
            foreach ($setting_tabs_wc as $setting_tabkey_wc => $setting_tabvalue) {
                switch ($setting_tabkey_wc) {
                    case $current_tab_wc:
                        do_action('woocommerce_assb_' . $current_tab_wc);
                        break;
                }
            }
            ?>
                <hr />
                <div class="return-to-dashboard">
                    <a href="<?php echo home_url('/wp-admin/options-general.php?page=add_social_share_buttons'); ?>"><?php _e('Go to Add Social Share Messenger Buttons Whatsapp and Viber Settings', 'add-social-share-buttons'); ?></a>
                </div>
            </div>


    <?php
    }

    /**
     * About tab content of Add social share button about
     *
     */
    public function woocommerce_assb_about() {
        //do_action('my_own');
        $current_user = wp_get_current_user();
        ?>
            <div class="changelog">
                </br>
                <style type="text/css">
                    p.assb_overview {max-width: 100% !important;margin-left: auto;margin-right: auto;font-size: 15px;line-height: 1.5;}
                    .assb_ul ul li {margin-left: 3%;list-style: initial;line-height: 23px;}
                </style>  
                <div class="changelog about-integrations">
                    <div class="wc-feature feature-section col three-col">
                        <div>

                            <p class="assb_overview"><?php _e('Easily add social sharing buttons to your page, posts and products page.', 'add-social-share-buttons'); ?></p>
                            <p class="assb_overview"><?php _e('Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.', 'add-social-share-buttons'); ?></p>

                            <p class="assb_overview"><strong>Plugin Functionality: </strong></p> 
                            <div class="assb_ul">
                                <ul>
                                    <li>Easy setup no specialization required to use</li>
                                    <li>Add social share button with different size (Small, Medium, Large)</li>
                                    <li>Add social share buttons in Products page and Blog page.</li>
                                    <li>You can reorder social share buttons as per your choice.</li>
                                    <li>You can set social share button (top, bottom) of page, post and product.</li>
                                    <li>You can apply custom CSS as per your requirement.</li>
                                    <li>User-friendly settings interface.</li>

                                </ul>
                            </div>

                            <p class="assb_overview"><strong>Plugin Supports: </strong></p> 
                            <div class="assb_ul">
                                <ul>
                                    <li>Share with Whatsapp</li>
                                    <li>Share with Facebook.</li>
                                    <li>Share with Twitter.</li>
                                    <li>Share with LinkedIn.</li>
                                    <li>Share with Google Plus.</li>
                                    <li>Share with Pinterest</li>
                                    <li>Share with Viber</li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        <?php
        global $wpdb;
        $current_user = wp_get_current_user();
        if (!get_option('assb_plugin_notice_shown')) {
            echo '<div id="assb_dialog" title="Basic dialog"> <p> Subscribe for latest plugin update and get notified when we update our plugin and launch new products for free! </p> <p><input type="text" id="txt_user_sub_assb" class="regular-text" name="txt_user_sub_assb" value="' . $current_user->user_email . '"></p></div>';
            ?>

                <script type="text/javascript">

                    jQuery(document).ready(function() {

                        jQuery("#assb_dialog").dialog({
                            modal: true, title: 'Subscribe Now', zIndex: 10000, autoOpen: true,
                            width: '500', resizable: false,
                            position: {my: "center", at: "center", of: window},
                            dialogClass: 'dialogButtons',
                            buttons: {
                                Yes: function() {
                                    // $(obj).removeAttr('onclick');
                                    // $(obj).parents('.Parent').remove();
                                    var email_id = jQuery('#txt_user_sub_assb').val();

                                    var data = {
                                        'action': 'add_plugin_user_assb',
                                        'email_id': email_id
                                    };

                                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                                    jQuery.post(ajaxurl, data, function(response) {
                                        jQuery('#assb_dialog').html('<h2>You have been successfully subscribed');
                                        jQuery(".ui-dialog-buttonpane").remove();
                                    });


                                },
                                No: function() {
                                    var email_id = jQuery('#txt_user_sub_assb').val();

                                    var data = {
                                        'action': 'hide_subscribe_assb',
                                        'email_id': email_id
                                    };

                                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                                    jQuery.post(ajaxurl, data, function(response) {

                                    });

                                    jQuery(this).dialog("close");

                                }
                            },
                            close: function(event, ui) {
                                jQuery(this).remove();
                            }
                        });

                        jQuery("div.dialogButtons .ui-dialog-buttonset button").addClass("button-primary woocommerce-save-button");
                        jQuery("div.dialogButtons .ui-dialog-buttonpane .ui-button").css("width", "80px");
                        jQuery("div.dialogButtons .ui-dialog-buttonpane .ui-button").css("margin-right", "14px");
                        jQuery("div.dialogButtons .ui-dialog-buttonset button").removeClass("ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only");

                    });
                </script>
                <?php
            }
            ?>

        <?php
        }

        public function woocommerce_assb_other_plugins() {
            global $wpdb;
            $url = 'http://www.multidots.com/store/wp-content/themes/business-hub-child/API/checkout_other_plugin.php';
            $response = wp_remote_post($url, array('method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('plugin' => 'advance-flat-rate-shipping-method-for-woocommerce'),
                'cookies' => array()));

            $response_new = array();
            $response_new = json_decode($response['body']);
            $get_other_plugin = maybe_unserialize($response_new);

            $paid_arr = array();
            ?>

            <div class="plug-containter">
                <div class="paid_plugin">
                    <h3>Paid Plugins</h3>
                    <?php foreach ($get_other_plugin as $key => $val) {
                        if ($val['plugindesc'] == 'paid') {
                            ?>


                            <div class="contain-section">
                                <div class="contain-img"><img src="<?php echo $val['pluginimage']; ?>"></div>
                                <div class="contain-title"><a target="_blank" href="<?php echo $val['pluginurl']; ?>"><?php echo $key; ?></a></div>
                            </div>	


            <?php
            } else {

                $paid_arry[$key]['plugindesc'] = $val['plugindesc'];
                $paid_arry[$key]['pluginimage'] = $val['pluginimage'];
                $paid_arry[$key]['pluginurl'] = $val['pluginurl'];
                $paid_arry[$key]['pluginname'] = $val['pluginname'];
                ?>


            <?php }
        } ?>
                </div>
            <?php if (isset($paid_arry) && !empty($paid_arry)) { ?>
                    <div class="free_plugin">
                        <h3>Free Plugins</h3>
                <?php foreach ($paid_arry as $key => $val) { ?>  	
                            <div class="contain-section">
                                <div class="contain-img"><img src="<?php echo $val['pluginimage']; ?>"></div>
                                <div class="contain-title"><a target="_blank" href="<?php echo $val['pluginurl']; ?>"><?php echo $key; ?></a></div>
                            </div>
                <?php }
            } ?>
                </div>

            </div>

            <?php
        }

        public function adjust_the_wp_menu_assb() {
            remove_submenu_page('index.php', 'wp-add-social-share-buttons');
        }

    }

    function custom_assb_pointers_admin_pointers() {

        $dismissed = explode(',', (string) get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true));
        $version = '1_0'; // replace all periods in 1.0 with an underscore
        $prefix = 'custom_assb_pointers' . $version . '_';

        $new_pointer_content = '<h3>' . __('Welcome to Add Social Share Messenger Buttons Whatsapp and Viber') . '</h3>';
        $new_pointer_content .= '<p>' . __('Easy to Add Social Share Buttons in Custom Post, Page and Product page.  Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.') . '</p>';

        return array(
            $prefix . 'assb_notice_view' => array(
                'content' => $new_pointer_content,
                'anchor_id' => '#adminmenu',
                'edge' => 'left',
                'align' => 'left',
                'active' => (!in_array($prefix . 'assb_notice_view', $dismissed) )
            )
        );
    }
    