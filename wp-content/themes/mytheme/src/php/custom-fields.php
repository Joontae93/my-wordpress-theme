<?php
/**
 * Define ACF Fields
 *
 * @package KJRoelke
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(
		array(
			'key'                   => 'group_6432dd16d1e29',
			'title'                 => 'Linktree Fields',
			'fields'                => array(
				array(
					'key'               => 'field_6432dd34f54fa',
					'label'             => 'Link',
					'name'              => 'link',
					'aria-label'        => '',
					'type'              => 'url',
					'instructions'      => 'All links must begin with https://',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => 'https://...',
				),
				array(
					'key'               => 'field_6432dd17f54f9',
					'label'             => 'Description',
					'name'              => 'description',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'rows'              => '',
					'placeholder'       => '',
					'new_lines'         => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'links',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'acf_after_title',
			'style'                 => 'seamless',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 1,
		)
	);

endif;
