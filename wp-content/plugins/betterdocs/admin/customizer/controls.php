<?php
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Range Value Customizer Control
 * 
 * Class BetterDocs_Customizer_Range_Value_Control
 *
 * @since 1.0.0
 */
class BetterDocs_Customizer_Range_Value_Control extends WP_Customize_Control {
	public $type = 'betterdocs-range-value';
	
	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script(
			'betterdocs-customizer-range-value-control',
			BETTERDOCS_ADMIN_URL . 'assets/js/customizer-range-value-control.js',
			array( 'jquery' ),
			rand(),
			true
		);

		wp_enqueue_style( 
			'betterdocs-customizer-range-value-control', BETTERDOCS_ADMIN_URL . 'assets/css/customizer-range-value-control.css',
			array(),
			rand()
		);
	}

	/**
	 * Render the control's content.
	 *
	 * @version 1.0.0
	 * 
	 */
	public function render_content() {
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<a href="#" title="<?php echo esc_html__('Reset', 'betterdocs') ?>" class="betterdocs-customizer-reset <?php echo esc_html( $this->type ); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"><path d="M 25 2 C 12.321124 2 2 12.321124 2 25 C 2 37.678876 12.321124 48 25 48 C 37.678876 48 48 37.678876 48 25 A 2.0002 2.0002 0 1 0 44 25 C 44 35.517124 35.517124 44 25 44 C 14.482876 44 6 35.517124 6 25 C 6 14.482876 14.482876 6 25 6 C 30.475799 6 35.391893 8.3080175 38.855469 12 L 35 12 A 2.0002 2.0002 0 1 0 35 16 L 46 16 L 46 5 A 2.0002 2.0002 0 0 0 43.970703 2.9726562 A 2.0002 2.0002 0 0 0 42 5 L 42 9.5253906 C 37.79052 4.9067015 31.727675 2 25 2 z"></path></svg></a>
		<?php endif; ?>
		<div class="betterdcos-range-slider" data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
			<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="betterdcos-range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
			<span class="betterdcos-range-slider__value">0</span></span>
		</div>
		<?php if ( ! empty( $this->description ) ) : ?>
		<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>
		<?php
	}
}

/**
 * Toogle Customizer Control
 * 
 * Class BetterDocs_Customizer_Toggle_Control
 *
 * @since 1.0.0
 * 
 */
class BetterDocs_Customizer_Toggle_Control extends WP_Customize_Control {
	public $type = 'betterdocs-toggle';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'betterdocs-customizer-toggle-control',
			BETTERDOCS_ADMIN_URL . 'assets/js/customizer-toggle-control.js',
			array( 'jquery' ),
			rand(),
			true
		);
		wp_enqueue_style( 'betterdocs-pure-css-toggle-buttons', 
			BETTERDOCS_ADMIN_URL . 'assets/css/customizer-togle-buttons.css',
			array(),
			rand()
		);

		$css = '
			.disabled-control-title {
				color: #a0a5aa;
			}
			input[type=checkbox].tgl-light:checked + .tgl-btn {
				background: #37de89;
			}
			input[type=checkbox].tgl-light + .tgl-btn {
			  background: #a0a5aa;
			}
			input[type=checkbox].tgl-light + .tgl-btn:after {
			  background: #f7f7f7;
			}

			input[type=checkbox].tgl-ios:checked + .tgl-btn {
			  background: #37de89;
			}

			input[type=checkbox].tgl-flat:checked + .tgl-btn {
			  border: 4px solid #37de89;
			}
			input[type=checkbox].tgl-flat:checked + .tgl-btn:after {
			  background: #37de89;
			}

		';
		wp_add_inline_style( 'pure-css-toggle-buttons' , $css );
	}

	/**
	 * Render the control's content.
	 *
	 * @version 1.0.0
	 * 
	 */
	public function render_content() {
		?>
		<label>
			<div class="betterdocs-customizer-toggle">
				<span class="customize-control-title betterdocs-customize-control-title betterdocs-customizer-toggle-title"><?php echo esc_html( $this->label ); ?></span>
				<input id="cb<?php echo $this->instance_number ?>" type="checkbox" data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" class="tgl tgl-<?php echo $this->type?> <?php echo $this->type?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
				<label for="cb<?php echo $this->instance_number ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}

/**
 * Alpha Color Picker Customizer Control
 *
 * Class BetterDocs_Customizer_Alpha_Color_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Customizer_Alpha_Color_Control extends WP_Customize_Control {
    /**
     * Official control name.
     *
     * @var string
     */
    public $type = 'betterdocs-alpha-color';
    /**
     * Add support for palettes to be passed in.
     *
     * Supported palette values are true, false, or an array of RGBa and Hex colors.
     *
     * @var bool
     */
    public $palette;
    /**
     * Add support for showing the opacity value on the slider handle.
     *
     * @var array
     */
    public $show_opacity;
    /**
     * Enqueue scripts/styles.
     *
     * @since 1.0.0
     *
     */
    public function enqueue() {
        wp_enqueue_script(
            'betterdocs-customizer-alpha-color-picker',
            BETTERDOCS_ADMIN_URL . 'assets/js/alpha-color-picker.js',
            array( 'jquery', 'wp-color-picker' ),
            rand(),
            true
        );
        wp_enqueue_style(
            'betterdocs-customizer-alpha-color-picker',
            BETTERDOCS_ADMIN_URL . 'assets/css/alpha-color-picker.css',
            array( 'wp-color-picker' ),
            rand()
        );
    }
    /**
     * Render the control.
     */
    public function render_content() {
        echo '<div class="betterdocs-alpha-color-picker">';
        // Output the label and description if they were passed in.
        if ( isset( $this->label ) && '' !== $this->label ) {
            echo '<span class="customize-control-title betterdocs-customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
        }
        if ( isset( $this->description ) && '' !== $this->description ) {
            echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
        }

        // Process the palette
        if ( is_array( $this->palette ) ) {
            $palette = implode( '|', $this->palette );
        } else {
            // Default to true.
            $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
        }
        // Support passing show_opacity as string or boolean. Default to true.
        $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
        // Begin the output.
        ?>
        <input class="betterdocs-alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php esc_attr( $this->link() ); ?>  />

        <?php
        echo '</div>';
    }
}

/**
 * Seperator Custom Customizer Control
 * 
 * Class BetterDocs_Separator_Custom_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Separator_Custom_Control extends WP_Customize_Control{
	public $type = 'separator';
	public function render_content(){
		$custom_class = isset( $this->input_attrs['class'] ) ? ' '.$this->input_attrs['class'] : '';
		?>
		<label>
			<h4 class="betterdocs-customize-control-separator<?php echo $custom_class; ?>"><?php echo esc_html( $this->label ); ?></h4>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}

/**
 * Title Custom Customizer Control
 * 
 * Class BetterDocs_Title_Custom_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Title_Custom_Control extends WP_Customize_Control{
	public $type = 'betterdocs-title';
	public function render_content() {
		?>
		<div <?php echo $this->input_attrs(); ?>>
		<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<a href="#" title="<?php echo esc_html__('Reset', 'betterdocs') ?>" class="betterdocs-customizer-reset"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"><path d="M 25 2 C 12.321124 2 2 12.321124 2 25 C 2 37.678876 12.321124 48 25 48 C 37.678876 48 48 37.678876 48 25 A 2.0002 2.0002 0 1 0 44 25 C 44 35.517124 35.517124 44 25 44 C 14.482876 44 6 35.517124 6 25 C 6 14.482876 14.482876 6 25 6 C 30.475799 6 35.391893 8.3080175 38.855469 12 L 35 12 A 2.0002 2.0002 0 1 0 35 16 L 46 16 L 46 5 A 2.0002 2.0002 0 0 0 43.970703 2.9726562 A 2.0002 2.0002 0 0 0 42 5 L 42 9.5253906 C 37.79052 4.9067015 31.727675 2 25 2 z"></path></svg></a>
		<?php if ( ! empty( $this->description ) ) : ?>
		<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>
		</div>
		<?php
	}
}


/**
 * Select Customizer Control
 * 
 * Class BetterDocs_Select_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Select_Control extends WP_Customize_Control {

	public $type = 'betterdocs-select';
	public function render_content() {
		if( empty( $this->choices ) )
			return;
		?>
		<select <?php $this->link(); ?> data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" <?php echo $this->input_attrs(); ?>>
			<?php
				foreach( $this->choices as $key => $label ) {
					echo '<option value="' . esc_attr( $key ) . '">' . $label . '</option>';
				}
			?>
		</select>
		<?php if( !empty( $this->label ) ) : ?>
			<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif;
	}

}

/**
 * Dimension Customizer Control
 * 
 * Class BetterDocs_Dimension_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Dimension_Control extends WP_Customize_Control {
	public $type = 'betterdocs-dimension';

	/**
	 * Render the control's content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<div class="dimension-field">
			<input type="number" data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->input_attrs(); $this->link(); ?>>
			<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		</div>
		<?php
	}
}

/**
 * Number Customizer Control
 * 
 * Class BetterDocs_Padding_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Padding_Control extends WP_Customize_Control {
	public $type = 'betterdocs-padding';

	/**
	 * Render the control's content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<div class="number-field">
			<?php 
			$controller_id = esc_attr($this->id);
			$val_top = get_theme_mod($this->id.'_top');
			$val_left = get_theme_mod($this->id.'_left');
			?>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<a href="#" title="<?php echo esc_html__('Reset', 'betterdocs') ?>" class="betterdocs-customizer-reset <?php echo esc_html( $this->type ); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"><path d="M 25 2 C 12.321124 2 2 12.321124 2 25 C 2 37.678876 12.321124 48 25 48 C 37.678876 48 48 37.678876 48 25 A 2.0002 2.0002 0 1 0 44 25 C 44 35.517124 35.517124 44 25 44 C 14.482876 44 6 35.517124 6 25 C 6 14.482876 14.482876 6 25 6 C 30.475799 6 35.391893 8.3080175 38.855469 12 L 35 12 A 2.0002 2.0002 0 1 0 35 16 L 46 16 L 46 5 A 2.0002 2.0002 0 0 0 43.970703 2.9726562 A 2.0002 2.0002 0 0 0 42 5 L 42 9.5253906 C 37.79052 4.9067015 31.727675 2 25 2 z"></path></svg></a>
			<?php endif; ?>
			<!-- <input type="hidden" data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" class="<?php echo $this->type.' '.$this->id ?> ?>" value="<?php echo esc_attr($this->value()) ?>" <?php $this->input_attrs(); $this->link(); ?>> -->
			<ul>
				<li id="<?php echo $controller_id . '_top' ?>" class="customize-control">
					<input type="number" data-default-val="20" class="<?php echo $this->type ?>" value="20" data-customize-setting-link="<?php echo $controller_id . '_top' ?>" >
				</li>
				<li id="<?php echo $controller_id . '_left' ?>" class="customize-control">
					<input type="number" data-default-val="20" class="<?php echo $this->type ?>" value="20" data-customize-setting-link="<?php echo $controller_id . '_left' ?>">
				</li>
			</ul>
		</div>
		<?php
	}
}


/**
 * Number Customizer Control
 * 
 * Class BetterDocs_Number_Control
 *
 * @since 1.0.0
 */

class BetterDocs_Number_Control extends WP_Customize_Control {
	public $type = 'betterdocs-number';

	/**
	 * Render the control's content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<div class="number-field">
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<a href="#" title="<?php echo esc_html__('Reset', 'betterdocs') ?>" class="betterdocs-customizer-reset <?php echo esc_html( $this->type ); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"><path d="M 25 2 C 12.321124 2 2 12.321124 2 25 C 2 37.678876 12.321124 48 25 48 C 37.678876 48 48 37.678876 48 25 A 2.0002 2.0002 0 1 0 44 25 C 44 35.517124 35.517124 44 25 44 C 14.482876 44 6 35.517124 6 25 C 6 14.482876 14.482876 6 25 6 C 30.475799 6 35.391893 8.3080175 38.855469 12 L 35 12 A 2.0002 2.0002 0 1 0 35 16 L 46 16 L 46 5 A 2.0002 2.0002 0 0 0 43.970703 2.9726562 A 2.0002 2.0002 0 0 0 42 5 L 42 9.5253906 C 37.79052 4.9067015 31.727675 2 25 2 z"></path></svg></a>
			<?php endif; ?>
			<input type="number" data-default-val="<?php echo $this->settings[ 'default' ]->value(); ?>" class="<?php echo $this->type ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->input_attrs(); $this->link(); ?>>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</div>
		<?php
	}
}

class BetterDocs_Radio_Image_Control extends WP_Customize_Control {
	/**
	 * Declare the control type.
	 *
	 * @since 1.0.0
	 */
	public $type = 'betterdocs-radio-image';
	
	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_style(
			'betterdocs-customizer-radio-image-select',
			BETTERDOCS_ADMIN_URL . 'assets/css/customizer-radio-image-select.css',
			array(),
			rand()
		);
	}
	
	/**
	 * Render the control's content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		if ( empty( $this->choices ) ) {
			return;
		}			
		
		$name = '_customize-radio-' . $this->id;
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
		<span class="customize-control-title betterdocs-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>
		<div id="input_<?php echo $this->id; ?>" class="image ui-buttonset">
			<?php 
			foreach ( $this->choices as $value => $label ) :
				if(isset( $label['pro'] ) && $label['pro'] === true){ ?>
				<label class="image-select" id="<?php echo $this->id . $value ?>">
				<a target="_blank" href="<?php echo esc_url($label['url']) ?>"><img src="<?php echo esc_url( $label['image'] ) ?>" alt=""></a>
				<span class="go-pro"><?php esc_html_e('Go Pro','betterdocs') ?></span>
				</label>
				<?php } else { ?>
				<input class="image-select" type="radio" value="<?php echo esc_attr( $value ) ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ) ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
					<label for="<?php echo $this->id . $value; ?>">
						<img src="<?php echo esc_url( $label['image'] ) ?>" alt="<?php echo esc_attr( $value ) ?>" title="<?php echo isset( $label['label'] ) ? esc_attr( $label['label'] ) : '' ; ?>">
					</label>
				</input>
			<?php } endforeach; ?>
		</div>
		<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
		<?php
	}
}

/**
 * Spacing Customizer Control
 * 
 * Class BetterDocs_Dimension_Control
 */

class BetterDocs_Multi_Dimension_Control extends WP_Customize_Control {

	public $type = 'betterdocs-multi-dimension';

	public $defaults;
	public $input_fields;

	public function enqueue() {
		wp_enqueue_script(
            'betterdocs-customizer-dimension-control',
            BETTERDOCS_ADMIN_URL . 'assets/js/customizer-dimension-control.js',
            array( 'jquery' ),
            rand(),
            true
        );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {

		if( $this->value() ) {
			if ( is_array ($this->value())) {
				$dimension_val = $this->value();
			} else {
				$dimension_val = (array) json_decode($this->value());
			}
		} else {
			$dimension_val = $this->defaults;
		}

		// Output the label and description if they were passed in.
		if ( isset( $this->label ) && '' !== $this->label ) {
			echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '<a href="#" title="'.esc_html__('Reset', 'betterdocs').'" class="betterdocs-customizer-reset '.esc_html( $this->type ).'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"><path d="M 25 2 C 12.321124 2 2 12.321124 2 25 C 2 37.678876 12.321124 48 25 48 C 37.678876 48 48 37.678876 48 25 A 2.0002 2.0002 0 1 0 44 25 C 44 35.517124 35.517124 44 25 44 C 14.482876 44 6 35.517124 6 25 C 6 14.482876 14.482876 6 25 6 C 30.475799 6 35.391893 8.3080175 38.855469 12 L 35 12 A 2.0002 2.0002 0 1 0 35 16 L 46 16 L 46 5 A 2.0002 2.0002 0 0 0 43.970703 2.9726562 A 2.0002 2.0002 0 0 0 42 5 L 42 9.5253906 C 37.79052 4.9067015 31.727675 2 25 2 z"></path></svg></a></span>';
		}
		if ( isset( $this->description ) && '' !== $this->description ) {
			echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
		}
		?>
		<input type="hidden" value="" class="betterdocs-dimension-control <?php echo esc_attr($this->id) ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
		<ul class="betterdocs-dimension-fields">
			<li class="betterdocs-dimension-link">
				<span class="dashicons dashicons-admin-links betterdocs-dimension-connected" data-element-connect="<?php echo esc_attr($this->id) ?>" title="Link Values Together"></span>
				<span class="dashicons dashicons-editor-unlink betterdocs-dimension-disconnected" data-element-connect="<?php echo esc_attr($this->id) ?>" title="Link Values Together"></span>
			</li>
			<li class="dimension-field">
				<input type="number" class="betterdocs-dimension-input betterdocs-dimension-input-1 disconnected" value="<?php echo esc_attr($dimension_val['input1'] ); ?>" data-element-connect="<?php echo esc_attr($this->id) ?>" data-input="input1">
				<span class="dimension-title"><?php echo $this->input_fields['input1'] ?></span>
			</li>
			<li class="dimension-field">
				<input type="number" class="betterdocs-dimension-input betterdocs-dimension-input-2 disconnected" value="<?php echo esc_attr($dimension_val['input2'] ); ?>" data-element-connect="<?php echo esc_attr($this->id) ?>" data-input="input2">
				<span class="dimension-title"><?php echo $this->input_fields['input2'] ?></span>
			</li>
			<li class="dimension-field">
				<input type="number" class="betterdocs-dimension-input betterdocs-dimension-input-3 disconnected" value="<?php echo esc_attr($dimension_val['input3'] ); ?>" data-element-connect="<?php echo esc_attr($this->id) ?>" data-input="input3">
				<span class="dimension-title"><?php echo $this->input_fields['input3'] ?></span>
			</li>
			<li class="dimension-field">
				<input type="number" class="betterdocs-dimension-input betterdocs-dimension-input-4 disconnected" value="<?php echo esc_attr($dimension_val['input4'] ); ?>" data-element-connect="<?php echo esc_attr($this->id) ?>" data-input="input4">
				<span class="dimension-title"><?php echo $this->input_fields['input4'] ?></span>
			</li>
		</ul>
		<?php
	}
}

 /**
 *  Load customizer conditional controler js file.
 *
 * @since 1.0.0
 */

function betterdocs_customizer_condition() {
	wp_enqueue_script( 'betterdocs-customize-condition', 
		BETTERDOCS_ADMIN_URL . 'assets/js/customizer-condition.js',
		array(), 
		true 
	);
}
add_action( 'customize_controls_enqueue_scripts', 'betterdocs_customizer_condition' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function betterdocs_customize_preview_js() {
	wp_enqueue_script( 'betterdocs-customizer', 
		BETTERDOCS_ADMIN_URL . 'assets/js/customizer.js', 
		array( 'customize-preview' ), 
		'', 
		true 
	);
}
add_action( 'customize_preview_init', 'betterdocs_customize_preview_js' );
?>
