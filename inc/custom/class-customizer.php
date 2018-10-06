<?php


	$wp_customize->add_section('faq_sec', array(
		'title' => __('FAQ', 'k7themes'),
		'description' => __('Frequently Asked Questions about the site', 'k7themes'),
		'priority' => null
	));

	$wp_customize->add_setting('faq_title', array(
		'default'=> __('Add your question here', 'k7themes'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title', array(
		'label' => __('Questions', 'k7themes'),
		'setting' => 'faq_title',
		'section' => 'faq_sec'
	));
	$wp_customize->add_setting('faq_desc', array(
		'default' => __( 'Add the answer here', 'k7themes'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'k7themes'),
				'setting' =>'faq_desc',
				'section' => 'faq_sec'
			)
		)
	);

	$wp_customize->add_setting('faq_title1', array(
		'default'=> __('Add your question here', 'k7themes'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title1', array(
		'label' => __('Questions', 'k7themes'),
		'setting' => 'faq_title1',
		'section' => 'faq_sec1'
	));
	$wp_customize->add_setting('faq_desc1', array(
		'default' => __( 'Add the answer here', 'k7themes'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc1',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'k7themes'),
				'setting' =>'faq_desc1',
				'section' => 'faq_sec1'
			)
		)
	);
	

	$wp_customize->add_setting('faq_title2', array(
		'default'=> __('Add your question here', 'k7themes'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title2', array(
		'label' => __('Questions', 'k7themes'),
		'setting' => 'faq_title2',
		'section' => 'faq_sec2'
	));
	$wp_customize->add_setting('faq_desc2', array(
		'default' => __( 'Add the answer here', 'k7themes'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc2',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'k7themes'),
				'setting' =>'faq_desc2',
				'section' => 'faq_sec2'
			)
		)
	);


