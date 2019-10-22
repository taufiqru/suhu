<?php
/**
 * Display numeric input fields as numbers
 */
class Grocery_CRUD_Extended extends Grocery_CRUD {
	protected function get_integer_input($field_info, $value) {
		if($value==''){
			$value=0;
		}
		$this->set_js_lib ( $this->default_javascript_path . '/jquery_plugins/jquery.numeric.min.js' );
		$this->set_js_config ( $this->default_javascript_path . '/jquery_plugins/config/jquery.numeric.config.js' );
		$extra_attributes = '';
		if (! empty ( $field_info->db_max_length ))
			$extra_attributes .= "maxlength='{$field_info->db_max_length}'";
		$input = "<input id='field-{$field_info->name}' name='{$field_info->name}' type='number' value='$value' class='numeric form-control' $extra_attributes />";
		return $input;
	}
	protected function get_string_input($field_info, $value) {
		if($value==''){
			$value=0;
		}
		$value = ! is_string ( $value ) ? '' : str_replace ( '"', "&quot;", $value );
		$input_type = 'text';
		
		$extra_attributes = '';
		
		if (in_array ( $field_info->type, array (
				'decimal',
				'float',
				'real',
				'double' 
		) )) {
			$input_type = 'number';
			$extra_attributes = ' step="any" ';
		}
		
		if (! empty ( $field_info->db_max_length )) {
			
			if (in_array ( $field_info->type, array (
					"decimal",
					"float" 
			) )) {
				$decimal_lentgh = explode ( ",", $field_info->db_max_length );
				$decimal_lentgh = (( int ) $decimal_lentgh [0]) + 1;
				
				$extra_attributes .= "maxlength='" . $decimal_lentgh . "'";
			} else {
				$extra_attributes .= "maxlength='{$field_info->db_max_length}'";
			}
		}
		$input = "<input id='field-{$field_info->name}' class='form-control' name='{$field_info->name}' type='$input_type' value=\"$value\" $extra_attributes />";
		return $input;
	}
}