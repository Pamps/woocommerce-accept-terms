(function( $ ){
  "use strict";

  // Show the info dialog
  function watShowAcceptTermsMessage() {
    alert('Please accept the terms to continue');
  }

	$(document).ready(function() {

    // Ensure terms are accepted before adding to cart
    $(".single-product form.cart").submit(function(e) {
      var checked = $('#wat-accept-terms').prop('checked');

      if (!checked) {
        watShowAcceptTermsMessage();
        return false;
      }

    });

    // Prevent PayPal click until terms accepted
    $('.single-product .paypal-button iframe').addClass('wat-paypal-iframe-disabled');

    // Ensure terms are accepted before allowing iframe click
    $('.single-product .paypal-button-context-iframe').click(function(){

      var checked = $('#wat-accept-terms').prop('checked');

      if (!checked) {
        watShowAcceptTermsMessage();
        return false;
      }

    });

    // Prevent PayPal iframe click if terms not accepted
    $('.single-product #wat-accept-terms').change(function() {

      var $iframe = $('.paypal-button iframe');
      if( $(this).prop('checked') ) {
        $iframe.removeClass('wat-paypal-iframe-disabled');
      } else {
        $iframe.addClass('wat-paypal-iframe-disabled');
      }

    });

  });

})( jQuery );