<?php
/**
* Theme I'LL customizer general Panel
* @package WordPress
* @subpackage I'LL
* @since I'LL 1.0
*/

	/*------------------------------------------------------------------------------------
	/* General Settings
	/*----------------------------------------------------------------------------------*/
	$wp_customize->add_panel( 'ill_general_settings', array(
	'priority' => 30,
	'capability' => 'edit_theme_options',
	'title' => __( 'SEO設定', 'ill' ),
	) );

		/*------------------------------------------------------------------------------------
		/* Meta Tages
		/*----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'ill_meta_tages', array (
			'title'	 => __( 'Header meta tage', 'ill' ),
			'priority' => 1,
			'panel' => 'ill_general_settings',
		) );

			// Active meta tage settings
			$wp_customize->add_setting( 'active_meta_tage_settings', array(
				'default' => true,
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'active_meta_tage_settings', array(
				'label' =>__( 'Active meta tage settings', 'ill' ),
				'description' => __( 'When disabled, automatic output of the meta tag stops. SEO setting function is turns off.', 'ill' ),
				'section' => 'ill_meta_tages',
				'settings' => 'active_meta_tage_settings',
				'type' => 'checkbox',
				'priority' => 1,
			) );

			// Meta keywords
			$wp_customize->add_setting( 'top_keywords', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_text',
			) );
			$wp_customize->add_control( 'top_keywords', array (
				'label' => __( 'Meta keywords', 'ill' ),
				'description' => __( 'Meta keywords set of front page (optional).', 'ill' ),
				'section' => 'ill_meta_tages',
				'settings' => 'top_keywords',
				'type' => 'text',
				'priority' => 2,
			) );

			// Meta description
			$wp_customize->add_setting( 'top_description', array (
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_text',
			) );
			$wp_customize->add_control( new Customize_Textarea_Control( $wp_customize, 'top_description', array(
				'label' => __( 'Meta description', 'ill' ),
				'description' => __( 'Meta description set of front page (optional).', 'ill' ),
				'section' => 'ill_meta_tages',
				'settings' => 'top_description',
				'priority' => 3,
			) ) );

		/*------------------------------------------------------------------------------------
		/* Facebook OGP
		/*----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'ill_facebook_opg_options', array (
			'title'	 => __( 'Facebook OGP', 'ill'),
			'priority' => 2,
			'panel' => 'ill_general_settings',
		) );

			// Facebook OGP
			$wp_customize->add_setting( 'display_facebook_opg', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'display_facebook_opg', array(
				'label' =>__( 'Display facebook opg meta tag', 'ill' ),
				'section' => 'ill_facebook_opg_options',
				'settings' => 'display_facebook_opg',
				'type' => 'checkbox',
				'priority' => 1,
			) );

			// Facebook Application ID
			$wp_customize->add_setting( 'facebook_app_id', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_text',
			) );
			$wp_customize->add_control( 'facebook_app_id', array(
				'label' => __( 'Facebook application id', 'ill' ),
				'section' => 'ill_facebook_opg_options',
				'settings' => 'facebook_app_id',
				'type' => 'text',
				'priority' => 2,
			) );

			// Facebook OGP image
			$wp_customize->add_setting( 'facebook_opg_image', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'facebook_opg_image', array (
				'label' => __( 'Facebook OGP image', 'ill' ),
				'section' => 'ill_facebook_opg_options',
				'settings' => 'facebook_opg_image',
				'priority' => 3,
			) ) );

		/*------------------------------------------------------------------------------------
		/* Twitter Card
		/*----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'ill_twitter_card_options', array (
			'title'	 => __( 'Twitter card', 'ill' ),
			'priority' => 3,
			'panel' => 'ill_general_settings',
		) );

			// Display twitter card
			$wp_customize->add_setting( 'display_twitter_card', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'display_twitter_card', array(
				'label' =>__( 'Display twitter cards meta tag', 'ill' ),
				'section' => 'ill_twitter_card_options',
				'settings' => 'display_twitter_card',
				'type' => 'checkbox',
				'priority' => 1,
			) );

			// Twitter card type
			$wp_customize->add_setting( 'twitter_card_type', array(
				'default' => 'summary',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_twitter_card_type',
			) );
			$wp_customize->add_control( 'twitter_card_type', array(
				'label' => __( 'Twitter card type', 'ill' ),
				'section' => 'ill_twitter_card_options',
				'settings' => 'twitter_card_type',
				'type' => 'radio',
				'choices' => array(
					'summary' => __( 'Summary', 'ill' ),
					'summary_large_image' => __( 'Summary large image', 'ill' ),
					),
				'priority' => 2,
			) );

			// Twitter ID
			$wp_customize->add_setting( 'twitter_id', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_text',
			) );
			$wp_customize->add_control( 'twitter_id', array(
				'label' => __( 'Twitter id', 'ill' ),
				'description' => __( 'Enter the ID including @ mark.', 'ill' ),
				'section' => 'ill_twitter_card_options',
				'settings' => 'twitter_id',
				'type' => 'text',
				'priority' => 3,
			) );

			// Twitter OGP image
			$wp_customize->add_setting( 'twitter_opg_image', array(
				'default' => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'twitter_opg_image', array (
				'label' => __( 'Twitter OGP image', 'ill' ),
				'section' => 'ill_twitter_card_options',
				'settings' => 'twitter_opg_image',
				'priority' => 4,
			) ) );


		/*------------------------------------------------------------------------------------
		/* Search range
		/*----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'ill_search_range', array (
			'title' => __( 'Search range', 'ill' ),
			'priority' => 9,
			'panel' => 'ill_general_settings',
		) );

			// Search results post
			$wp_customize->add_setting( 'search_results_post', array(
				'default' => true,
				'type' => 'theme_mod',
				'sanitize_callback' => 'ill_customize_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'search_results_post', array(
				'label' =>__( 'Display post only', 'ill' ),
				'description' => __( 'When disabled, pages are also displayed in search results.', 'ill' ),
				'section' => 'ill_search_range',
				'settings' => 'search_results_post',
				'type' => 'checkbox',
				'priority' => 1,
			) );
