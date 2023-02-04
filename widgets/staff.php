<?php
/**
 * Elementor Staff Widget.
 *
 * Elementor widget that displays a staff individual for FBCI
 *
 * @since 1.0.0
 */
class Elementor_Staff_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Staff widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'staff';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Staff widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Staff', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Staff widget icon.
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
	 * Retrieve the list of categories the Staff widget belongs to.
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
	 * Register Staff widget controls.
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

		$this->add_control(
			'name',
			[
				'label' => __( 'Name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter staff name', 'plugin-name' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter staff title', 'plugin-name' ),
			]
		);

		$this->add_control(
			'photo',
			[
				'label' => __( 'Choose Staff Photo', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'bio',
			[
				'label' => __( 'Bio', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter bio here', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Staff widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="elementor-fbci-widget elementor-fbci-widget-staff">';

		echo '<div class="staff-photo"><img src="' . $settings['photo']['url'] . '" alt="' . $settings['name'] . '" /></div>';
		
		echo '<div class="staff-content">';
		
		echo '<h3>' . $settings['name'] . '</h3>';
		
		echo '<h4>' . $settings['title'] . '</h4>';
		
		echo '<p>' . $settings['bio'] . '</p>';
		
		echo '</div>';

		echo '</div>';

	}

}