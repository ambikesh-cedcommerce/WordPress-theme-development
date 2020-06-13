<?php
/**
 * Description of what this module (or file) is doing.
 *
 *  @package mythemes
 */

/**
 * Implements hook_help().
 */
class TheMinimalist_Customizer {
	/**
	 * This constuctor is used for add_action hook customizer_register .
	 *
	 * Add custom_register to the register_customize_sections
	 */
	public function __construct() {

		add_action( 'customize_register', array( $this, 'register_customize_sections' ) );

	}
	/**
	 * Register_custom_sections function
	 *
	 * @param array $wp_customize Reference of each section which will going to create .
	 * @return void
	 */
	public function register_customize_sections( $wp_customize ) {
		/**
		 * Initialise section
		 */
		$this->author_callout_section( $wp_customize );
	}
	/**
	 * Author section , Settings and control .
	 *
	 * @param object $wp_customize -> Take reference to add new section .
	 */
	private function author_callout_section( $wp_customize ) {

		// =================================Author section ================================= .
		// New Section panel .
		$wp_customize->add_section(
			'basic-author-callout-section', // Id of the section(remember id should be unique ).
			array(
				'title'       => 'Author', // Name of the section which is going to be add .
				'priority'    => 2, // No.of position where it will show.
				'description' => __( ' The Author section is only displayed on the blog Page ', 'theminimalist' ), // Include html tags such as <p>.
			)
		);
		$wp_customize->add_section(
			'basic-author-callout-footer-section',
			array(
				'title'       => 'Footer',
				'priority'    => 30,
				'description' => __( 'This is change color for the footer section below of the page' ),
			)
		);
		// ------------------------------------- Options to show Yes or No ----------------------------------- .
		// Display or not .
		// Add setting.
		$wp_customize->add_setting(
			'basic-author-callout-display',
			array(
				'default'           => 'No',
				'sanitize_callback' => array( $this, 'sanitize_custom_option' ), // Another function will check whether this value is correct or not (function_Name is -> sanitize_custom_option).
			)
		);
		// Add control .
		$wp_customize->add_control(
			new WP_Customize_Control( // New object of the $wp_customize -> add_control .
				$wp_customize,
				' basic-author-callout-display-control', // Id of option section the object .
				array(
					'label'    => 'Display this section?', // Display this section with ? marks .
					'section'  => 'basic-author-callout-section', // This will show under this section .
					'settings' => 'basic-author-callout-display', // Settins name .
					'type'     => 'select',
					'choices'  => array( // Choices for select options .
						'No'  => 'No',
						'Yes' => 'Yes',
					),
				)
			)
		);
		// ------------------------------------- End Options to show Yes or No ----------------------------------- .
		// ------------------------------------- Input field TextArea ----------------------------------- .
		// Display Author Text  .
		// Setting .
		$wp_customize->add_setting(
			'basic-author-callout-text', // Name of the object .
			array(
				'default'           => '', // Inside the text box NOthing .
				'sanitize_callback' => array( $this, 'sanitize_custom_text' ), // Sanitize callback  it valid text or not  whether melicious text or not .
			)
		);
		// Add control of text area .
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'basic-author-callback-control',
				array(
					'label'    => 'About Author', // Name of the new label .
					'section'  => 'basic-author-callout-section', // Section in which section .
					'settings' => 'basic-author-callout-text', // Settings name .
					'type'     => 'textarea', // type of the label  which is textarea .
				)
			)
		);
		// ------------------------------------- End Input field TextArea ----------------------------------- .
		// ------------------------------------- Images option select A image ----------------------------------- .
		// Add Author image (setting).
		$wp_customize->add_setting(
			'basic-author-callout-image', // ID of image control.
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array(
					$this,
					'sanitize_custom_url',
				),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'basic-author-callout-image-control',
				array(
					'label'    => 'Image',
					'section'  => 'basic-author-callout-section',
					'settings' => 'basic-author-callout-image',
					'width'    => 442,
					'height'   => 310,
				)
			)
		);
		// ------------------------------------- End Images option select a Image ----------------------------------- .
		// ------------------------------------- Choose Nav Background color ----------------------------------- .
		$wp_customize->add_setting(
			'basic-author-callout-color', // ID of color setting.
			array(
				'default'           => '#565656',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array(
					$this,
					'sanitize_custom_color',
				),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'basic-author-callout-color-control',
				array(
					'label'    => 'Nav Background Color',
					'type'     => 'color',
					'section'  => 'basic-author-callout-section',
					'settings' => 'basic-author-callout-color',

				)
			)
		);// ------------------------------------- End Choose Nav Background color ----------------------------------- .

	}
	/**
	 *
	 * Function to Sanitize options .
	 *
	 * @param array $input This is taking some input yes or no to activate the blog_post.
	 * @return if input is equal to no then no else  return yes .
	 */
	public function sanitize_custom_option( $input ) {

		return ( 'No' === $input ) ? 'No' : 'Yes';
	}
	/**
	 *
	 * Function to filter String whethere it is text on not . is it (php ,js,html) any kind of language .
	 *
	 * @param array $input This will sanitize the melicious code in the text box.
	 * @return filter_var(filtered string which user has entered in the text box)
	 */
	public function sanitize_custom_text( $input ) {

		return filter_var( $input, FILTER_SANITIZE_STRING );

	}
	/**
	 *
	 * Function to register_cutomize_sections .
	 *
	 * @param string $input This is path of the image where image is actually located .
	 * @return filtered URL  of the image where the image is located .
	 */
	public function sanitize_custom_url( $input ) {

		return filter_var( $input, FILTER_SANITIZE_URL );
	}

	// ================================= End Author section ================================= .
}


