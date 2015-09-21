<?php
/**
 * Product loop title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<h3><?php the_title(); ?></h3>
<?php global $product;
if($product->is_in_stock( )){
	
	echo 'Товар є в наявності';
	}else{
	echo 'Нема на складі';
	}
	?>