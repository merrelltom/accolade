// Global stuff
var tm_body = jQuery( 'body' );
var validation = false;
var errorMessage = 'Please enter an answer for all questions';
var score = 0;
var modifier = 1;
var question_vals = {};
var price = 0;

function gen_result(p,m,s) {
    var n = Math.pow(1 + m/100, s);
    return (p * n).toFixed(2);
 }

$(document).ready(function() {

	modifier = tm_body.attr('data-modifier');
	largePrice = tm_body.attr('data-large');
	mediumPrice = tm_body.attr('data-medium');
	smallPrice = tm_body.attr('data-small');

	/*  
	================================================================
	NEXT BUTTONS WITH BUILT IN VALIDATION
	================================================================  
	*/

	tm_body.on('click', '.next', function(){
		
		var parent = $(this).closest('section');
		var next = $(this).closest('.screen').next('.screen');
		var questions = parent.find('.answers:visible');


		// Postcode Screen
		// We will refine this depending on the postcode checking function?
		if(parent.hasClass('postcode-screen')){
			var answers = parent.find('input:checked');
			if(answers.length == 0 && !$('input.postcode').val()){
				questions.addClass('required');
			}else{
				questions.removeClass('required');
			}
		}else if(parent.hasClass('trophy-selection')){
			var answers = parent.find('input:checked');
			if(answers.length == 0){
				questions.addClass('required');
			}else{
				if(parent.find('input:checked').val() == 'small'){
					price = smallPrice
				}
				if(parent.find('input:checked').val() == 'medium'){
					price = mediumPrice
				}
				if(parent.find('input:checked').val() == 'large'){
					price = largePrice
				}
				console.log(price);
			}
		}else{ 
			// loop through each question on the screen
			questions.each(function( index ) {
				// find checked inputs
				var answers = $(this).find('input:checked');
				if(answers.length == 0){
					$(this).addClass('required');
					$(document).scrollTop(0);
				}else{
					$(this).removeClass('required');
				}
			});
		}

		// Check if any questions are 'required'
		if(parent.find('.required:visible').length == 0){
			validation = true;
		}else{
			validation = false;
		}

		// If validated proceed to next
		if(validation == true){
			$(this).closest('.screen').removeClass('selected');
			next.addClass('selected');
			$(document).scrollTop(0);
                        var running_total = 0;
                        $('input:checked').each(function () {
                            if ($.isNumeric($(this).val())) {
                                running_total += parseInt($(this).val());
                            }
                        });
                        document.getElementById("total-bar").innerHTML = "Running total:" + running_total + ", price: £" + gen_result(price, modifier, running_total);
		}

	});


	tm_body.on('click', '.prev', function(){
		var next = $(this).closest('.screen').prev('.screen');
		$(this).closest('.screen').removeClass('selected');
		next.addClass('selected');	
		$(document).scrollTop(0)
	});

	tm_body.on('click', '.submit', function(){
		$('input:checked').each(function(){
//			score.push($(this).val());
                        if ( $.isNumeric($(this).val()) ) {
                            score += parseInt($(this).val());
                        }
		});
                
		var x = $("#accolade-pricing-form").serializeArray();  
                $.each(x, function(i, field){  
                    $("#results-list").append("<li>" + field.name + ": " + field.value + "</li>");  
                });
                $("#results-list").append("<li>SCORE: " + score + "</li>");
                var result = gen_result(price, modifier, score);
                $("#results-list").append("<li>FUNCTION: "+price+" *(1 + "+modifier+"/100) ^ "+score+"  =  £"+result+"</li>");
                
                $('#results-screen').show();
	});


        tm_body.on('click', '#pc_check', function(){
	    var x = document.getElementById("postcode").value;
	    console.log('clicked');
	    //console.log(x);
	    $.ajax({
	        type: "POST",
	        url: "assets/php/postcode_get.php",
	        dataType: 'json',
	        data: {postcode: x},
	        success: function (data) {
	            if (Number.isInteger(data)) {
	                if (data != -99) {
                            $('#pc_result').val(data);
                           	document.getElementById("postcode-message").innerHTML = '<div class="inner valid">Postcode valid</span>';
                        }
                    }
                    if (data == -99){
                    	document.getElementById("postcode-message").innerHTML ='<div class="inner error">Postcode not valid</span>';
                    }
	        }
	    });
	    return false;
	});


	/*  
	================================================================
	CONDITIONAL FORM (FINANCIAL SECTION)
	================================================================  
	*/

	tm_body.on('change', 'input[type=radio][name=financial-consent]', function(){
		if( $('input[type=radio][name=financial-consent]:checked').val() == 'yes'){
			$('.financial-conditional-questions').slideToggle(500);
		}else{
			$('.financial-conditional-questions').slideUp(500);
		}
	});




});/*CLOSE*/
