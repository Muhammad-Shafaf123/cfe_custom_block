<?php
if ( ! class_exists( 'WC_Session' ) ) {
    include_once( WP_PLUGIN_DIR . '/woocommerce/includes/abstracts/abstract-wc-session.php' );
}
add_action('init', function(){
    /*
    * First lets start the session. You cant use here WC_Session directly
    * because it's an abstract class. But you can use WC_Session_Handler which
    * extends WC_Session
    */
    WC()->session = new WC_Session_Handler;

    /*
    * Next lets create a customer so we can access checkout fields
    * If you will check a constructor for WC_Customer class you will see
    * that if you will not provide user to create customer it will use some
    * default one. Magic.
    */
    WC()->customer = new WC_Customer;

    /*
    * Done. You can browse all chceckout fields (including custom ones)
    */
    $field = WC()->checkout->get_checkout_fields();
    $encoded_fileds = json_encode($field);
  //  echo "<script> console.log('".$encoded_fileds."') </script>";
    echo "<script> var globalVariable = ".$encoded_fileds." </script>";
    //var_dump( $field );

});
function thecfeblock($fields){
  $encoded_fileds = json_encode($fields);
  echo "<script> console.log('this is working...field-data ---- first line of function') </script>";
  echo '<pre>';
  print_r($encoded_fileds);
  echo '</pre>';
  echo "<script> var globalVariable = ".$encoded_fileds." </script>";
  echo "<script> console.log('this is working...field-data') </script>";
  //echo "<script>var datas = ".$fieldss." </script>";
	return $fields;
}
// add_filter('woocommerce_checkout_fields', 'thecfeblock');
?>
