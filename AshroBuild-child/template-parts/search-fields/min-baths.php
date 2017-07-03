<?php
/**
 * Minimum Baths Field
 */
?>
<?php
$id_term_property_category = get_term_by('slug', $_GET[ 'category' ], 'property-category');
if(!empty(get_option('checkbox_rooms_to_rooms')) && (in_array($id_term_property_category->term_id, get_option('checkbox_rooms_to_rooms')))){
?>
<div class="option-bar small">
	<label for="select-bathrooms">
		<?php
		$inspiry_min_baths_label = get_option( 'inspiry_min_baths_label' );
		echo ( $inspiry_min_baths_label ) ? $inspiry_min_baths_label : __( 'Min Baths', 'framework' );
		?>
	</label>
    <span class="selectwrap">
        <select name="bathrooms" id="select-bathrooms" class="search-select">
            <?php inspiry_min_baths(); ?>
        </select>
    </span>
</div>
<?php 
}
?>