<?php
/**
 * Property Category Hidden Field
 */
?>
<div class="option-bar small property-category">
    <input type="hidden" name="category" value="<?php echo isset( $_GET[ 'category' ] ) ? $_GET[ 'category' ] : ''; ?>" />
</div>