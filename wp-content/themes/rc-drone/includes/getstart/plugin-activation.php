<?php
if ( ! class_exists( 'RC_Drone_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * RC_Drone_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class RC_Drone_Plugin_Activation_WPElemento_Importer {

        private static $rc_drone_instance;
        public $rc_drone_action_count;
        public $rc_drone_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$rc_drone_instance) ) {
            self::$rc_drone_instance = new self();
          }
          return self::$rc_drone_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'rc_drone_recommended_plugins', array($this, 'rc_drone_recommended_elemento_importer_plugins_array') );

            $rc_drone_actions                   = $this->rc_drone_get_recommended_actions();
            $this->rc_drone_action_count        = $rc_drone_actions['count'];
            $this->rc_drone_recommended_actions = $rc_drone_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function rc_drone_recommended_elemento_importer_plugins_array($rc_drone_plugins){
            $rc_drone_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'rc-drone'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'rc-drone'),               
            );
            return $rc_drone_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'rc-drone-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('rc-drone-plugin-activation-script', 'rc_drone_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'rc-drone'),
                    'activating' => esc_html__('Activating', 'rc-drone'),
                    'error' => esc_html__('Error', 'rc-drone'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'rc-drone-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function rc_drone_get_recommended_actions() {

            $rc_drone_act_count  = 0;
            $rc_drone_actions_todo = get_option( 'recommending_actions', array());

            $rc_drone_plugins = $this->rc_drone_get_recommended_plugins();

            if ($rc_drone_plugins) {
                foreach ($rc_drone_plugins as $rc_drone_key => $rc_drone_plugin) {
                    $rc_drone_action = array();
                    if (!isset($rc_drone_plugin['slug'])) {
                        continue;
                    }

                    $rc_drone_action['id']   = 'install_' . $rc_drone_plugin['slug'];
                    $rc_drone_action['desc'] = '';
                    if (isset($rc_drone_plugin['desc'])) {
                        $rc_drone_action['desc'] = $rc_drone_plugin['desc'];
                    }

                    $rc_drone_action['name'] = '';
                    if (isset($rc_drone_plugin['name'])) {
                        $rc_drone_action['title'] = $rc_drone_plugin['name'];
                    }

                    $rc_drone_link_and_is_done  = $this->rc_drone_get_plugin_buttion($rc_drone_plugin['slug'], $rc_drone_plugin['name'], $rc_drone_plugin['function']);
                    $rc_drone_action['link']    = $rc_drone_link_and_is_done['button'];
                    $rc_drone_action['is_done'] = $rc_drone_link_and_is_done['done'];
                    if (!$rc_drone_action['is_done'] && (!isset($rc_drone_actions_todo[$rc_drone_action['id']]) || !$rc_drone_actions_todo[$rc_drone_action['id']])) {
                        $rc_drone_act_count++;
                    }
                    $rc_drone_recommended_actions[] = $rc_drone_action;
                    $rc_drone_actions_todo[]        = array('id' => $rc_drone_action['id'], 'watch' => true);
                }
                return array('count' => $rc_drone_act_count, 'actions' => $rc_drone_recommended_actions);
            }

        }

        public function rc_drone_get_recommended_plugins() {

            $rc_drone_plugins = apply_filters('rc_drone_recommended_plugins', array());
            return $rc_drone_plugins;
        }

        public function rc_drone_get_plugin_buttion($slug, $name, $function) {
                $rc_drone_is_done      = false;
                $rc_drone_button_html  = '';
                $rc_drone_is_installed = $this->is_plugin_installed($slug);
                $rc_drone_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $rc_drone_is_activeted = (class_exists($function)) ? true : false;
                if (!$rc_drone_is_installed) {
                    $rc_drone_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $rc_drone_plugin_install_url = wp_nonce_url($rc_drone_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $rc_drone_button_html        = sprintf('<a class="rc-drone-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($rc_drone_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'rc-drone'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'rc-drone')
                    );
                } elseif ($rc_drone_is_installed && !$rc_drone_is_activeted) {

                    $rc_drone_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($rc_drone_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $rc_drone_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $rc_drone_button_html = sprintf('<a class="rc-drone-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($rc_drone_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'rc-drone'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'rc-drone')
                    );
                } elseif ($rc_drone_is_activeted) {
                    $rc_drone_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'rc-drone'));
                    $rc_drone_is_done     = true;
                }

                return array('done' => $rc_drone_is_done, 'button' => $rc_drone_button_html);
            }
        public function is_plugin_installed($slug) {
            $rc_drone_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $rc_drone_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($rc_drone_installed_plugins[$rc_drone_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $rc_drone_keys = array_keys($this->get_installed_plugins());
            foreach ($rc_drone_keys as $rc_drone_key) {
                if (preg_match('|^' . $slug . '/|', $rc_drone_key)) {
                    return $rc_drone_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
RC_Drone_Plugin_Activation_WPElemento_Importer::get_instance();