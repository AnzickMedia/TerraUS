<?php

function maple_print_woocommerce_button(){
	global $woocommerce;
	if (isset($woocommerce) && get_option("maple_woocommerce_cart") == "on"){ ?>
		<div class="maple_dynamic_shopping_bag">
			<div class="maple_little_shopping_bag_wrapper">
				<div class="maple_little_shopping_bag">
					<div class="title">
						<i class="ion-ios-cart-outline"></i>
					</div>
					<div class="overview">
						<span class="minicart_items"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'maple'), $woocommerce->cart->cart_contents_count); ?></span>
					</div>
				</div>
				<div class="maple_minicart_wrapper">
					<div class="maple_minicart">
					<?php
						if (sizeof($woocommerce->cart->cart_contents)>0){
							echo '<ul class="cart_list">';
							foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item){
								$_product = $cart_item['data'];
								if ($_product->exists() && $cart_item['quantity']>0){
									echo '<li class="cart_list_product">';
										echo '<a class="cart_list_product_img" href="'.esc_url(get_permalink($cart_item['product_id'])).'">' . $_product->get_image().'</a>';
										echo '<div class="cart_list_product_title">';
											$maple_product_title = $_product->get_title();
											$maple_short_product_title = (strlen($maple_product_title) > 28) ? substr($maple_product_title, 0, 25) . '...' : $maple_product_title;
											echo '<a href="'.esc_url(get_permalink($cart_item['product_id'])).'">' . apply_filters('woocommerce_cart_widget_product_title', $maple_short_product_title, $_product) . '</a>';
											echo '<div class="cart_list_product_quantity">'.$cart_item['quantity'].'x</div>';
										echo '</div>';
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">x</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'maple') ), $cart_item_key );
										echo '<div class="cart_list_product_price">'.woocommerce_price($_product->get_price()).'</div>';
										echo '<div class="clr"></div>';
									echo '</li>';
								}
							}
							echo '</ul>';
							?>
							<div class="minicart_total_checkout">
							<?php esc_html_e('Cart subtotal', 'maple'); ?><span><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span>
							</div>
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="button maple_minicart_cart_but"><?php esc_html_e('View Bag', 'maple'); ?></a>
							<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="button maple_minicart_checkout_but"><?php esc_html_e('Checkout', 'maple'); ?></a>
							<?php
						} else {
							echo '<ul class="cart_list"><li class="empty">'.esc_html__('No products in the cart.','maple').'</li></ul>';
						}
						?>
					</div>
				</div>
			</div>
			<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="maple_little_shopping_bag_wrapper_mobiles"><span><?php echo wp_kses_post($woocommerce->cart->cart_contents_count); ?></span></a>
		</div>
	<?php
	}
}

function maple_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	if (isset($woocommerce) && get_option("maple_woocommerce_cart") == "on"){
		$maple_woo_output = '
		<div class="maple_dynamic_shopping_bag" style="display:table-cell;">
			<div class="maple_little_shopping_bag_wrapper">
				<div class="maple_little_shopping_bag">
					<div class="title">
						<i class="ion-ios-cart-outline"></i>
					</div>
					<div class="overview">
						<span class="minicart_items">'.sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'maple'), $woocommerce->cart->cart_contents_count).'</span>
					</div>
				</div>
				<div class="maple_minicart_wrapper">
					<div class="maple_minicart">';
						if (sizeof($woocommerce->cart->cart_contents)>0){
							$maple_woo_output .= '<ul class="cart_list">';
							foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item){
								$_product = $cart_item['data'];
								if ($_product->exists() && $cart_item['quantity']>0){
									$maple_woo_output .= '<li class="cart_list_product">';
										$maple_woo_output .= '<a class="cart_list_product_img" href="'.esc_url(get_permalink($cart_item['product_id'])).'">' . $_product->get_image().'</a>';
										$maple_woo_output .= '<div class="cart_list_product_title">';
											$maple_product_title = $_product->get_title();
											$maple_short_product_title = (strlen($maple_product_title) > 28) ? substr($maple_product_title, 0, 25) . '...' : $maple_product_title;
											$maple_woo_output .= '<a href="'.esc_url(get_permalink($cart_item['product_id'])).'">' . apply_filters('woocommerce_cart_widget_product_title', $maple_short_product_title, $_product) . '</a>';
											$maple_woo_output .= '<div class="cart_list_product_quantity">'.$cart_item['quantity'].'x</div>';
										$maple_woo_output .= '</div>';
										$maple_woo_output .= apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">x</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'maple') ), $cart_item_key );
										$maple_woo_output .= '<div class="cart_list_product_price">'.woocommerce_price($_product->get_price()).'</div>';
										$maple_woo_output .= '<div class="clr"></div>';
									$maple_woo_output .= '</li>';
								}
							}
							$maple_woo_output .= '</ul>';
							$maple_woo_output .= '
							<div class="minicart_total_checkout">
								'.esc_html__('Cart subtotal', 'maple').'<span>'.wp_kses_post($woocommerce->cart->get_cart_total()).'</span>
						</div>
						<a href="'.esc_url( $woocommerce->cart->get_cart_url() ).'" class="button maple_minicart_cart_but">'.esc_html__('View Bag', 'maple').'</a>
						<a href="'.esc_url( $woocommerce->cart->get_checkout_url() ).'" class="button maple_minicart_checkout_but">'. esc_html__('Checkout', 'maple').'</a>';
						} else {
							$maple_woo_output .= '<ul class="cart_list"><li class="empty">'.esc_html__('No products in the cart.','maple').'</li></ul>';
						}
						$maple_woo_output .= '
					</div>
				</div>
			</div>
			<a href="'.esc_url( $woocommerce->cart->get_cart_url() ).'" class="maple_little_shopping_bag_wrapper_mobiles"><span>'. wp_kses_post($woocommerce->cart->cart_contents_count).'</span></a>
		</div>';
		$fragments['div.maple_dynamic_shopping_bag'] = $maple_woo_output;
		return $fragments;
	} else return "";
}

?>