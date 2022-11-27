<?php
/**
 * Plumber Services Theme Customizer
 *
 * @package Plumber Services
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Plumber_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Plumber_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Plumber_Services_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Plumber Services Pro', 'plumber-services' ),
					'pro_text' => esc_html__( 'Go Pro', 'plumber-services' ),
					'pro_url'  => esc_url( 'https://www.logicalthemes.com/themes/plumbing-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'plumber-services-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'plumber-services-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Plumber_Services_Customize::get_instance();

function plumber_services_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'plumber_services_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'LT Settings', 'plumber-services' ),
	) );

	//Layout Setting
	$wp_customize->add_section( 'plumber_services_left_right' , array(
    	'title'      => esc_html__( 'General Settings', 'plumber-services' ),
		'priority'   => null,
		'panel' => 'plumber_services_panel_id'
	) );

	$wp_customize->add_setting('plumber_services_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control('plumber_services_theme_options',array(
        'type' => 'radio',
        'description' => __( 'Choose sidebar between different options', 'plumber-services' ),
        'label' => esc_html__( 'Post Sidebar Layout.', 'plumber-services' ),
        'section' => 'plumber_services_left_right',
        'choices' => array(
            'One Column' => esc_html__('One Column ','plumber-services'),
            'Three Columns' => esc_html__('Three Columns','plumber-services'),
            'Four Columns' => esc_html__('Four Columns','plumber-services'),
            'Right Sidebar' => esc_html__('Right Sidebar','plumber-services'),
            'Left Sidebar' => esc_html__('Left Sidebar','plumber-services'),
            'Grid Layout' => esc_html__('Grid Layout','plumber-services')
        ),
	));

	$plumber_services_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'plumber_services_typography', array(
    	'title'      => __( 'Typography', 'plumber-services' ),
		'priority'   => null,
		'panel' => 'plumber_services_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'plumber_services_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_paragraph_color', array(
		'label' => __('Paragraph Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('plumber_services_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_paragraph_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'Paragraph Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	$wp_customize->add_setting('plumber_services_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'plumber_services_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_atag_color', array(
		'label' => __('"a" Tag Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('plumber_services_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_atag_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( '"a" Tag Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'plumber_services_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_li_color', array(
		'label' => __('"li" Tag Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('plumber_services_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_li_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( '"li" Tag Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h1_color', array(
		'label' => __('H1 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h1_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H1 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('plumber_services_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h1_font_size',array(
		'label'	=> __('H1 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h2_color', array(
		'label' => __('H2 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h2_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H2 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('plumber_services_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h2_font_size',array(
		'label'	=> __('H2 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h3_color', array(
		'label' => __('H3 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h3_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H3 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('plumber_services_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h3_font_size',array(
		'label'	=> __('H3 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h4_color', array(
		'label' => __('H4 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h4_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H4 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('plumber_services_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h4_font_size',array(
		'label'	=> __('H4 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h5_color', array(
		'label' => __('H5 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h5_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H5 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('plumber_services_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h5_font_size',array(
		'label'	=> __('H5 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'plumber_services_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plumber_services_h6_color', array(
		'label' => __('H6 Color', 'plumber-services'),
		'section' => 'plumber_services_typography',
		'settings' => 'plumber_services_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('plumber_services_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'plumber_services_sanitize_choices'
	));
	$wp_customize->add_control(
	    'plumber_services_h6_font_family', array(
	    'section'  => 'plumber_services_typography',
	    'label'    => __( 'H6 Fonts','plumber-services'),
	    'type'     => 'select',
	    'choices'  => $plumber_services_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('plumber_services_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_h6_font_size',array(
		'label'	=> __('H6 Font Size','plumber-services'),
		'section'	=> 'plumber_services_typography',
		'setting'	=> 'plumber_services_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('plumber_services_topbar',array(
		'title'	=> esc_html__('Topbar','plumber-services'),
		'priority'	=> null,
		'panel' => 'plumber_services_panel_id',
	));

	$wp_customize->add_setting( 'plumber_services_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'plumber_services_sanitize_checkbox'
    ) );
    $wp_customize->add_control('plumber_services_sticky_header',array(
    	'type' => 'checkbox',
    	'description' => __( 'Click on the checkbox to enable sticky header.', 'plumber-services' ),
        'label' => __( 'Sticky Header','plumber-services' ),
        'section' => 'plumber_services_topbar'
    ));

    //Show /Hide Topbar
	$wp_customize->add_setting( 'plumber_services_show_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'plumber_services_sanitize_checkbox'
    ) );
    $wp_customize->add_control('plumber_services_show_topbar',array(
    	'type' => 'checkbox',
    	'description' => __( 'Click on the checkbox to enable Topbar.', 'plumber-services' ),
        'label' => __( 'Topbar','plumber-services' ),
        'section' => 'plumber_services_topbar'
    ));

	$wp_customize->add_setting('plumber_services_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('plumber_services_email',array(
		'label'	=> __('Add Email Address','plumber-services'),
		'section' => 'plumber_services_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('plumber_services_timings',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('plumber_services_timings',array(
		'label'	=> __('Add timings','plumber-services'),
		'section' => 'plumber_services_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('plumber_services_phone_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('plumber_services_phone_text',array(
		'label'	=> __('Add Phone Text','plumber-services'),
		'section' => 'plumber_services_topbar',
		'type'	  => 'text'
	));

	$wp_customize->add_setting('plumber_services_phoneno',array(
		'default'	=> '',
		'sanitize_callback'	=> 'plumber_services_sanitize_phone_number'
	));	
	$wp_customize->add_control('plumber_services_phoneno',array(
		'label'	=> __('Add Phone Number','plumber-services'),
		'section' => 'plumber_services_topbar',
		'type'	  => 'text'
	));

	//home page slider
	$wp_customize->add_section( 'plumber_services_slidersettings' , array(
    	'title'      => esc_html__( 'Slider Settings', 'plumber-services' ),
		'priority'   => null,
		'panel' => 'plumber_services_panel_id'
	) );

	$wp_customize->add_setting('plumber_services_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'plumber_services_sanitize_checkbox'
	));
	$wp_customize->add_control('plumber_services_slider_hide_show',array(
	   'type' => 'checkbox',
	   'description' => __( 'Click on the checkbox to enable slider.', 'plumber-services' ),
	   'label' => esc_html__('Show / Hide slider','plumber-services'),
	   'section' => 'plumber_services_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'plumber_services_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'plumber_services_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'plumber_services_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'plumber-services' ),
	   		'description' => __( 'Slider Image Size (1200px x 600px)', 'plumber-services' ),
			'section'  => 'plumber_services_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	// Services Section
	$wp_customize->add_section('plumber_services_services_section',array(
		'title'	=> __('Services Section','plumber-services'),
		'panel' => 'plumber_services_panel_id',
	));

	$wp_customize->add_setting('plumber_services_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('plumber_services_section_title',array(
		'label'	=> __('Section Title','plumber-services'),
		'section' => 'plumber_services_services_section',
		'type'	  => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('plumber_services_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'plumber_services_sanitize_choices',
	));
	$wp_customize->add_control('plumber_services_service_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','plumber-services'),
		'section' => 'plumber_services_services_section',
	));

	//footer
	$wp_customize->add_section('plumber_services_footer_section',array(
		'title'	=> esc_html__('Footer Text','plumber-services'),
		'panel' => 'plumber_services_panel_id'
	));
		
	$wp_customize->add_setting('plumber_services_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('plumber_services_footer_copy',array(
		'label'	=> esc_html__('Copyright Text','plumber-services'),
		'section'	=> 'plumber_services_footer_section',
		'type'		=> 'text'
	));

	//Wocommerce Shop Page
	$wp_customize->add_section('plumber_services_woocommerce_shop_page',array(
		'title'	=> __('Woocommerce Shop Page','plumber-services'),
		'panel' => 'plumber_services_panel_id'
	));

	$wp_customize->add_setting( 'plumber_services_products_per_column' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'plumber_services_sanitize_choices',
	) );
	$wp_customize->add_control( 'plumber_services_products_per_column', array(
		'label'    => __( 'Product Per Columns', 'plumber-services' ),
		'description'	=> __('How many products should be shown per Column?','plumber-services'),
		'section'  => 'plumber_services_woocommerce_shop_page',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	)  );

	$wp_customize->add_setting('plumber_services_products_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'plumber_services_sanitize_float',
	));	
	$wp_customize->add_control('plumber_services_products_per_page',array(
		'label'	=> __('Product Per Page','plumber-services'),
		'description'	=> __('How many products should be shown per page?','plumber-services'),
		'section'	=> 'plumber_services_woocommerce_shop_page',
		'type'		=> 'number'
	));

	// logo site title
	$wp_customize->add_setting('plumber_services_site_title_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'plumber_services_sanitize_checkbox'
    ));
    $wp_customize->add_control('plumber_services_site_title_tagline',array(
       'type' => 'checkbox',
       'label' => __('Display Site Title and Tagline in Header','plumber-services'),
       'section' => 'title_tagline'
    ));
}
add_action( 'customize_register', 'plumber_services_customize_register' );