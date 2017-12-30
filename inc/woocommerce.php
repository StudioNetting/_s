<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package netting
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function netting_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'netting_woocommerce_setup' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Remove all WooCommerce scripts and styles from all pages except from shop pages.
 *
 */
function netting_woocommerce_script_cleaner() {
	if (!is_woocommerce() && !is_cart() && !is_checkout()){
		wp_dequeue_script('woocommerce'); // WooCommerce script
		wp_dequeue_script('wc-add-payment-method'); // WooCommerce script
		wp_dequeue_script('wc-lost-password'); // WooCommerce script
		wp_dequeue_script('wc_price_slider'); // WooCommerce script
		wp_dequeue_script('wc-single-product'); // WooCommerce script
		wp_dequeue_script('wc-add-to-cart'); // WooCommerce script
		wp_dequeue_script('wc-cart-fragments'); // WooCommerce script
		wp_dequeue_script('wc-credit-card-form'); // WooCommerce script
		wp_dequeue_script('wc-checkout'); // WooCommerce script
		wp_dequeue_script('wc-add-to-cart-variation'); // WooCommerce script
		wp_dequeue_script('wc-cart'); // WooCommerce script
		wp_dequeue_script('wc-address-i18n'); // WooCommerce script
		wp_dequeue_script('wc-country-select'); // WooCommerce script
		wp_dequeue_script('wc-chosen'); // WooCommerce script
		wp_dequeue_script('selectWoo'); // WooCommerce Select2 script
		wp_dequeue_script('prettyPhoto'); // WooCommerce script
		wp_dequeue_script('prettyPhoto-init'); // WooCommerce script
		wp_dequeue_script('photoswipe'); // WooCommerce script
		wp_dequeue_script('wcqi-js'); // WooCommerce script
		wp_dequeue_script('jquery-cookie'); // WooCommerce script
		wp_dequeue_script('jquery-blockui'); // WooCommerce script
		wp_dequeue_script('jquery-placeholder'); // WooCommerce script
		wp_dequeue_script('jquery-payment'); // WooCommerce script
		wp_dequeue_script('fancybox'); // WooCommerce script
		wp_dequeue_script('jqueryui'); // WooCommerce script
		wp_dequeue_script('wc-add-extra-charges'); // plugins/woocommerce-extra-charges-to-payment-gateways/assets/app.js
		wp_dequeue_script('wc-aelia-eu-vat-assistant-frontend'); // plugins/woocommerce-eu-vat-assistant/src/js/frontend/frontend.js
		wp_dequeue_script('aws-script'); // plugins/advanced-woo-search/
	}
	wp_dequeue_style('wc-aelia-eu-vat-assistant-frontend'); // plugins/woocommerce-eu-vat-assistant/src/design/css/frontend.css
	wp_dequeue_style('aws-style'); // plugins/advanced-woo-search/
}
add_action('wp_enqueue_scripts', 'netting_woocommerce_script_cleaner', 99);

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function netting_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'netting_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function netting_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'netting_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function netting_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'netting_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function netting_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'netting_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function netting_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'netting_woocommerce_related_products_args' );

if ( ! function_exists( 'netting_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function netting_woocommerce_product_columns_wrapper() {
		$columns = netting_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'netting_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'netting_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function netting_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'netting_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'netting_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function netting_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'netting_woocommerce_wrapper_before' );

if ( ! function_exists( 'netting_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function netting_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'netting_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'netting_woocommerce_header_cart' ) ) {
			netting_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'netting_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function netting_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		netting_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'netting_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'netting_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function netting_woocommerce_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'netting' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'netting' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'netting_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function netting_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php netting_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
					$instance = array(
						'title' => '',
					);

					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
