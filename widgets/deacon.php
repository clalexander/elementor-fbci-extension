<?php
/**
 * Elementor Deacon Widget.
 *
 * Elementor widget that displays a deacon for FBCI
 *
 * @since 1.0.0
 */
class Elementor_Deacon_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Deacon widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'deacon';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Deacon widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Deacon', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Deacon widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Deacon widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'fbci' ];
	}

	/**
	 * Register Deacon widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$deacon_list = new \Elementor\Repeater();

		$deacon_list->add_control(
			'name',
			[
				'label' => __( 'Name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter deacon name', 'plugin-name' ),
			]
		);

		$deacon_list->add_control(
			'term',
			[
				'label' => __( 'Term', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter deacon term', 'plugin-name' ),
			]
		);

		$deacon_list->add_control(
			'photo',
			[
				'label' => __( 'Choose Deacon Photo', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'deacon-list',
			[
				'label' => __( 'Deacon List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $deacon_list->get_controls(),
				'default' => [
					[
						'name' => __( 'Deacon #1', 'plugin-domain' )
					],
					[
						'name' => __( 'Deacon #2', 'plugin-domain' )
					],
				],
				'title_field' => '{{{ name }}}'
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Deacon widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="elementor-fbci-widget elementor-fbci-widget-deacon">';
		
		if ( $settings['deacon-list'] ) {
			
			echo '<ul>';
			
			foreach ( $settings['deacon-list'] as $deacon ) {
				
				echo '<li id="deacon-' . $deacon['_id'] . '">';
				
				echo '<div class="deacon-photo"><img src="' . $deacon['photo']['url'] . '" alt="' . $deacon['name'] . '" /></div>';
				
				echo '<div class="deacon-content">';
		
				echo '<p class="name">' . $deacon['name'] . '</p>';
				
				echo '<p>' . $deacon['term'] . '</p>';
				
				echo '</div>';
				
				echo '</li>';
				
			}
			
			echo '</ul>';
			
		}

		echo '</div>';

	}

}