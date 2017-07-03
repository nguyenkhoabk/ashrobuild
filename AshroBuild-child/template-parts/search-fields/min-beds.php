<?php
/**
 * Minimum Beds Field
 */
?>
<?php
$id_term_property_category = get_term_by('slug', $_GET[ 'category' ], 'property-category');
if(!empty(get_option('checkbox_rooms_to_rooms')) && (in_array($id_term_property_category->term_id, get_option('checkbox_rooms_to_rooms')))){
?>
<div class="option-bar small">
	<label for="select-bedrooms">
		<?php
		$inspiry_min_beds_label = get_option( 'inspiry_min_beds_label' );
		echo ( $inspiry_min_beds_label ) ? $inspiry_min_beds_label :__('Min Beds', 'framework');
		?>
	</label>
    <span class="selectwrap">
        <select name="bedrooms" id="select-bedrooms" class="search-select">
            <?php inspiry_min_beds(); ?>
        </select>
    </span>
</div>
<?php 
}
?>