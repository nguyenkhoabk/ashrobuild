<?php
/**
 * Minimum and Maximum Price Fields
 */

$inspiry_min_price_label = get_option( 'inspiry_min_price_label' );
$inspiry_max_price_label = get_option( 'inspiry_max_price_label' );
?>
<div class="option-bar small price-for-others">
	<label for="select-min-price">
		<?php echo ( $inspiry_min_price_label ) ? $inspiry_min_price_label : __('Min Price', 'framework'); ?>
	</label>
    <input type="text" name="min-price" value="<?php echo isset( $_GET[ 'min-price' ] ) ? $_GET[ 'min-price' ] : ''; ?>" placeholder="<?php echo inspiry_any_text() ; ?>"/>
</div>

<div class="option-bar small price-for-others">
	<label for="select-max-price">
		<?php echo ( $inspiry_max_price_label ) ? $inspiry_max_price_label : __('Max Price', 'framework') ; ?>
	</label>
    <input type="text" name="max-price" value="<?php echo isset( $_GET[ 'max-price' ] ) ? $_GET[ 'max-price' ] : ''; ?>" placeholder="<?php echo inspiry_any_text() ; ?>"/>
</div>

<?php
/**
 * Prices for Rent
 */
?>
<div class="option-bar small price-for-rent hide-fields">
	<label for="select-min-price-for-rent">
		<?php echo ( $inspiry_min_price_label ) ? $inspiry_min_price_label : __('Min Price', 'framework'); ?>
	</label>
    <span class="selectwrap">
        <select name="min-price" id="select-min-price-for-rent" class="search-select" disabled="disabled">
            <?php min_prices_for_rent_list(); ?>
        </select>
    </span>
</div>

<div class="option-bar small price-for-rent hide-fields">
	<label for="select-max-price-for-rent">
		<?php echo ( $inspiry_max_price_label ) ? $inspiry_max_price_label : __('Max Price', 'framework') ; ?>
	</label>
    <span class="selectwrap">
        <select name="max-price" id="select-max-price-for-rent" class="search-select" disabled="disabled">
            <?php max_prices_for_rent_list(); ?>
        </select>
    </span>
</div>