<?php
class NameDirectoryGeneralSettingsPage
{
	private $options;

	/**
	 * NameDirectorySettingsPage constructor, register the settings page and initialize the options
	 */
	public function __construct()
	{
		add_action('admin_menu', array($this, 'add_menu_entry'));
		add_action('admin_init', array($this, 'name_directory_general_settings_page_init'));
	}

	/**
	 * Add options page to the menu
	 */
	public function add_menu_entry()
	{

		add_submenu_page(
			'name-directory',
			__('General settings', 'name-directory'),
			__('General settings', 'name-directory'),
			'manage_options',
			'name-directory-general-settings',
			array($this, 'name_directory_general_settings_page'));
	}

	/**
	 * Options page callback (renders settings form and other stuff)
	 */
	public function name_directory_general_settings_page()
	{
		$this->options = get_option('name_directory_general_option');
		?>
		<div class="wrap">
            <h1><?php echo __('Name Directory', 'name-directory') . ' ' . __('Settings', 'name-directory'); ?></h1>
            <div  style="width: 50%; float: left;">
                <form method="post" action="options.php">
                    <?php
                    settings_fields('name_directory_general_settings_search');
                    do_settings_sections('name-directory-general-settings');
                    submit_button();
                    ?>
                </form>
            </div>

            <?php
            $this->print_asidebar();
        echo '</div>';
	}

	/**
	 * Register and add settings to WordPress
	 */
	public function name_directory_general_settings_page_init()
	{
		register_setting(
			'name_directory_general_settings_search',
			'name_directory_general_option',
			array($this, 'sanitize')
		);

        add_settings_section(
            'name_directory_editing_section_settings',
            __('Name Directory', 'name-directory') . ' ' . __('Editing', 'name-directory'),
            array($this, 'print_editing_info'),
            'name-directory-general-settings'
        );

        add_settings_field(
            'simple_wysiwyg_editor',
            __('Use visual editor', 'name-directory'),
            array($this, 'simple_wysiwyg_editor_callback'),
            'name-directory-general-settings',
            'name_directory_editing_section_settings'
        );

		add_settings_section(
			'name_directory_general_section_settings',
			__('Name Directory', 'name-directory') . ' ' . __('Search', 'name-directory'),
			array($this, 'print_search_info'),
			'name-directory-general-settings'
		);

		add_settings_field(
			'search_on',
			__('Include in sitewide search', 'name-directory'),
			array($this, 'search_on_callback'),
			'name-directory-general-settings',
			'name_directory_general_section_settings'
		);

		add_settings_field(
			'search_description',
			__('Search in description', 'name-directory'),
			array($this, 'search_description_callback'),
			'name-directory-general-settings',
			'name_directory_general_section_settings'
		);

		add_settings_field(
			'search_wildcard',
			__('Enable wildcard search', 'name-directory'),
			array($this, 'search_wildcard_callback'),
			'name-directory-general-settings',
			'name_directory_general_section_settings'
		);
	}

	/**
	 * Sanitize each setting field as needed (all booleans)
	 *
	 * @param array $input Contains all posted settings fields as array key
	 * @return array
	 */
	public function sanitize($input)
	{
		$boolean_settings = array();
		foreach($input as $key => $value)
        {
	        $boolean_settings[$key] = absint($value);
        }
		return $boolean_settings;
	}

	/**
	 * Print the search settings section text
	 */
	public function print_search_info()
	{
        print __('Name Directory can also be embedded in the search functionality which WordPress offers out of the box. This page allows you to control these settings.', 'name-directory');
        print '<br>';
        print __('Please note, these settings are for the <em>site-wide</em> search results! Name Directory also has a built-in search engine to search within a directory. Those settings can be controlled in the specific directory settings.', 'name-directory');

	}


    /**
     * Print the editing section text
     */
    public function print_editing_info()
    {
        print __('This settings controls which editor you are using in the Name Directory admin', 'name-directory');

    }

	/**
	 * The callbacks for our functions
	 */
    public function simple_wysiwyg_editor_callback()
    {
        echo $this->radio_button_callback('simple_wysiwyg_editor');
        echo sprintf("<p><em>%s</em></p>", __('Enable the simple visual editor for editing the description of names in a directory.', 'name-directory'));
    }
	public function search_on_callback()
	{
		echo $this->radio_button_callback('search_on');
		echo sprintf("<p><em>%s</em></p>", __('All entries in Name Directories can be included in the WordPress Search results. When a name is matched, WordPress search will display the page containing the directory in the search results.', 'name-directory'));
	}
	public function search_description_callback()
	{
		echo $this->radio_button_callback('search_description');
		echo sprintf("<p><em>%s</em></p>", __('This will allow WordPress to search in the descriptions too.', 'name-directory'));
	}
	public function search_wildcard_callback()
	{
		echo $this->radio_button_callback('search_wildcard');
		echo sprintf("<p><em>%s</em></p>", __('This enables WordPress to partially match names. A search for "bird" will also return "birdcage".', 'name-directory'));
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function radio_button_callback($field)
	{
		printf('<label for"' . $field . '_yes"><input type="radio" id="' . $field . '_yes" name="name_directory_general_option[' . $field . ']" value="1" %s> %s</label> &nbsp;&nbsp; ', empty($this->options[$field]) ? '' : 'checked', __('Yes', 'name-directory'));
		printf('<label for"' . $field . '_no"><input type="radio" id="' . $field . '_no" name="name_directory_general_option[' . $field . ']" value="0" %s> %s</label>',  empty($this->options[$field]) ? 'checked' : '', __('No', 'name-directory'));
	}

	/**
     * Print some links and a donation link
     */
    public function print_asidebar()
    {
        print '
        <div style="float:right; width: 35%; max-width: 35%;">
            
            <div style="background-color:#333333; padding:8px; color:#eee; font-size:12pt; font-weight:bold;">
                <i class="dashicons dashicons-admin-plugins"></i> Name Directory plugin
            </div>
            <div style="background-color:#fff;border: 1px solid #E5E5E5;padding:8px;">
        
                <h3 style="font-weight: normal;">' . __('Thank you for using Name Directory!', 'name-directory') . '</h3>
        
                <p>' . __('I am honored that you are using my software. Here are a few handy quicklinks.', 'name-directory') . '</p>
        
                <ul>
                    <li>
                        <i class="dashicons dashicons-welcome-learn-more"></i>
                        <a href="https://wordpress.org/plugins/name-directory/#faq" target="_blank">' . __('Frequently Asked Questions', 'name-directory') . '</a>
                    </li>
                    <li>
                        <i class="dashicons dashicons-translation"></i>
                        <a href="https://translate.wordpress.org/projects/wp-plugins/name-directory" target="_blank">' . __('Help translate this plugin', 'name-directory') . '</a>
                    </li>
                    <li>
                        <i class="dashicons dashicons-lightbulb"></i>
                        <a href="https://wordpress.org/support/plugin/name-directory" target="_blank">' . __('Have an idea? Let me know!', 'name-directory') . '</a>
                    </li>
                    <li>
                        <i class="dashicons dashicons-editor-help"></i>
                        <a href="https://wordpress.org/support/plugin/name-directory" target="_blank">' . __('Do you want to ask a question?', 'name-directory') . '</a>
                    </li>
                    <li>
                        <i class="dashicons dashicons-star-filled"></i>
                        <a href="https://wordpress.org/support/plugin/name-directory/reviews/#new-post" target="_blank">' . __('Rate/review this plugin', 'name-directory') . '</a>
                    </li>
                </ul>
            </div>
        
            <br>
            <br>
        
            <div style="background-color:#333333;padding:8px;color:#eee;font-size:12pt;font-weight:bold;">
                <i class="dashicons dashicons-money"></i> ' . __('Donate', 'name-directory') . '
            </div>
            <div style="background-color:#fff;border: 1px solid #E5E5E5;padding:8px;">

                <p>' . __('If you like the plugin, would you please consider donating a small amount of money to pay for the license of my programming editor? Or for a good cup of coffee', 'name-directory') . ' :-)</p>
                
                <form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="text-align: center">
                    <input type="hidden" name="cmd" value="_donations">
                    <input type="hidden" name="business" value="mail@jeroenpeters.com">
                    <input type="hidden" name="item_name" value="Name Directory Plugin development">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="no_note" value="1">
                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="lc" value="EN_US">
                    <input type="hidden" name="bn" value="WPPlugin_SP">
                    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_pp_142x27.png" border="0" name="submit" alt="Make your payments with PayPal. It is free, secure, effective." style="border: none;">
                </form>
                
            </div>
        </div>';
    }

}


/* Add this whenever the logged in user is an administrator */
if( is_admin() )
{
	new NameDirectoryGeneralSettingsPage();
}