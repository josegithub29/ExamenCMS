<?php
if (!defined('ABSPATH')) exit;
if (isset($_GET['page'])) {

    // Form actions like Settings, Contact
    require_once(plugin_dir_path(__FILE__) . '/form_actions.php');

    $wpgmap_page = esc_html($_GET['page']);
    $wpgmap_tag = '';
    if (isset($_GET['tag'])) {
        $wpgmap_tag = esc_html($_GET['tag']);
    }
    ?>
    <div class="wrap">
        <script type="text/javascript"
                src="<?php echo esc_url(plugins_url("../assets/js/srm_gmap_loader.js", __FILE__)); ?>"></script>
        <div id="gmap_container_inner">
            <!--modal contents-->

            <ul id="wp-gmap-nav">
                <li class="<?php echo ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == '') ? 'active' : ''; ?>">
                    <a href="<?php echo admin_url(); ?>admin.php?page=wpgmapembed" data-id="wp-gmap-all"
                       class="media-menu-item"><?php _e('All Maps', 'gmap-embed'); ?></a>
                </li>
                <li class="<?php echo $wpgmap_tag == 'new' ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(admin_url() . 'admin.php?page=wpgmapembed&tag=new'); ?>"
                       data-id="wp-gmap-new"
                       class="media-menu-item"><?php _e('Create New Map', 'gmap-embed'); ?></a>
                </li>
                <li class="<?php echo $wpgmap_tag == 'settings' ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(admin_url() . 'admin.php?page=wpgmapembed&tag=settings'); ?>"
                       data-id="wp-gmap-settings"
                       class="media-menu-item"><?php _e('Settings', 'gmap-embed'); ?></a>
                </li>
                <li class="<?php echo $wpgmap_tag == 'contact' ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(admin_url() . 'admin.php?page=wpgmapembed&tag=contact'); ?>"
                       data-id="wp-gmap-settings"
                       class="media-menu-item"><?php _e('Having Problem?', 'gmap-embed'); ?></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.youtube.com/watch?v=Lak-tJjGjl8" class="media-menu-item">
                        <?php _e('See Video', 'gmap-embed'); ?></a>
                </li>
                <span class="spinner" style="margin-right: 20px !important;float:right"></span>

                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WVPQNC6CJ6T4Q"><img
                            alt="Donate"
                            src="<?php echo esc_url(plugins_url("../assets/images/paypal.png", __FILE__)); ?>"
                            width="150"/></a>

                <a target="_blank"
                   href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=WVPQNC6CJ6T4Q"
                   class="button media-button button-default button-large" style="
    padding: 7px 16px;
    height: auto;
    font-weight: bold;
    margin: 20px 0px 0px 24px;
">GET PRO VERSION</a>

            </ul>

            <div id="wp-gmap-tabs">
                <?php
                if (isset($_GET['message'])) {
                    ?>
                    <div class="message">
                        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
                            <p>
                                <strong>
                                    <?php
                                    $message_status = $_GET['message'];
                                    switch ($message_status) {
                                        case 1:
                                            echo __('Map has been created Successfully.', 'gmap-embed');
                                            break;
                                        case 2:
                                            echo __('Map Updated Successfully.', 'gmap-embed');
                                            break;
                                        case 3:
                                            echo __('Settings updated Successfully.', 'gmap-embed');
                                            break;
                                        case 4:
                                            echo __($message, 'gmap-embed');
                                            break;
                                        case -1:
                                            echo __('Map Deleted Successfully.', 'gmap-embed');
                                            break;
                                    }
                                    ?>
                                </strong>
                            </p>
                            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span>
                            </button>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (get_option('wpgmap_api_key') == false) {
                    require_once(plugin_dir_path(__FILE__) . '/wpgmap_settings.php');
                }
                ?>
                <!---------------------------Maps List-------------->
                <?php
                if ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == '') {
                    ?>
                    <div class="wp-gmap-tab-content active" id="wp-gmap-all">
                        <?php
                        require_once(plugin_dir_path(__FILE__) . '/wpgmap_list.php');
                        ?>
                    </div>
                    <?php
                }
                ?>
                <!---------------------------Create New Map-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ($_GET['page'] == 'wpgmapembed' && $_GET['tag'] == 'new') ? 'active' : ''; ?>"
                        id="wp-gmap-new">
                    <?php
                    if ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'new') {
                        require_once(plugin_dir_path(__FILE__) . '/wpgmap_create.php');
                    }
                    ?>
                </div>

                <!---------------------------Existing map update-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'edit') ? 'active' : ''; ?>"
                        id="wp-gmap-edit">
                    <?php
                    if ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'edit') {
                        require_once(plugin_dir_path(__FILE__) . '/wpgmap_edit.php');
                    }
                    ?>
                </div>

                <!---------------------------Plugin Settings-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'contact') ? 'active' : ''; ?>"
                        id="wp-gmap-contact">
                    <?php
                    if ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'contact') {
                        require_once(plugin_dir_path(__FILE__) . '/wpgmap_contact.php');
                    }
                    ?>
                </div>

                <!---------------------------Plugin Settings-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'settings') ? 'active' : ''; ?>"
                        id="wp-gmap-settings">
                    <?php
                    if ($wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'settings') {
                        require_once(plugin_dir_path(__FILE__) . '/wpgmap_settings.php');
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
    <?php
}
?>