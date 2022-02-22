// CF7 DOM Events

document.addEventListener( 'wpcf7mailsent', function( event ) {
  alert( "Form has been submit and mail has been sent successfully" );
}, false );

document.addEventListener( 'wpcf7invalid', function( event ) {
  alert( "Email ID is invalid" );
}, false );

document.addEventListener( 'wpcf7spam', function( event ) {
  alert( "There is an issue with field" );
}, false );

document.addEventListener( 'wpcf7mailfailed', function( event ) {
  alert( "There has been error" );
}, false );

// Phone Validation

jQuery("#phone-number").keypress(function(ev){
	jQuery("#phone-number").attr('maxlength','10');
});

