// Global stuff
var tm_body = jQuery( 'body' );

$(document).ready(function() {


	/*  
	================================================================
	NEXT BUTTONS
	================================================================  
	*/

	tm_body.on('click', '.next', function(){
		var next = $(this).closest('.screen').next('.screen');
		var validation = true;
		// Validate the form entry for that screen


		// If validated proceed to next
		if(validation === true){
			$(this).closest('.screen').removeClass('selected');
			next.addClass('selected');
			tm_body.scrollTop(0);	
		}

		// If error show error message

	});


	tm_body.on('click', '.prev', function(){
		var next = $(this).closest('.screen').prev('.screen');
		var validation = true;
		// Validate the form entry for that screen


		// If validated proceed to next
		if(validation === true){
			$(this).closest('.screen').removeClass('selected');
			next.addClass('selected');	
			tm_body.scrollTop(0);
		}

		// If error show error message

	});
        
        tm_body.on('click', '#pc_check', function(){
            var x = document.getElementById("postcode").value;
            //console.log(x);
            $.ajax({
                type: "POST",
                url: "assets/php/postcode_get.php",
                dataType: 'json',
                data: {postcode: x},
                success: function (data) {
                    if (Number.isInteger(data)) {
                        console.log(data); }
                    }, 
                error: function () {
                        console.log('Postcode not found...');
                    }
            });
            return false;
        });






});/*CLOSE*/