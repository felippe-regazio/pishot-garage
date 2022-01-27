<?php

function car_repair_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'automobile_hub_color_option' );
    $wp_customize->remove_section( 'automobile_hub_about_section' );
}
add_action( 'customize_register', 'car_repair_remove_customize_register', 11 );

function car_repair_customize_register( $wp_customize ) {

	$wp_customize->add_setting('automobile_hub_address_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_address_text',array(
		'label'	=> __('Add Location Text','car-repair'),
		'section'	=> 'automobile_hub_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('automobile_hub_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_hub_address',array(
		'label'	=> __('Add Location','car-repair'),
		'section'	=> 'automobile_hub_topbar',
		'type'		=> 'text'
	));
}
add_action( 'customize_register', 'car_repair_customize_register' );

if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_NAME' ) ) {
	define( 'AUTOMOBILE_HUB_PRO_THEME_NAME', esc_html__( 'Car Repair Pro Theme', 'car-repair' ));
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_URL' ) ) {
	define( 'AUTOMOBILE_HUB_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/car-repair-wordpress-theme/'));
}