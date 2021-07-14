(function ($) {
	$(document).ready(function () {

		// OLD API AUTHORIZATION - IT HAS TO BE DELETE AFTER THE UPDATE
		var hash = window.location.hash;
		if ( hash.indexOf('access_token') > 0 && hash.indexOf('api_type') == -1 ) {
			var input = $('#meks-access-token');
			input.val(hash.split('=').pop());
			input.parents('form').find('#submit').click();
		}

		// NEW API HANDLING RETURNED TOKEN 
		var url_hash = window.location.hash;

		if ( url_hash.indexOf('access_token') > 0 && url_hash.indexOf('api_type') > 0 ) {

			var token = $('#meks-access-token');
			var user_id = $('#meks-user-id');
			var token_expires = $('#meks-token-expires-in');
			var api_type = $('#meks-api-type');
			
			var url_hash_arr = url_hash.split('&');

			url_hash_arr.forEach( function( param ) {

				switch ( param.split('=').shift() ) {

					case '#access_token':
						token.val(param.split('=').pop());
						break;

					case 'expires_in':
						var expires_in_time = parseInt(param.split('=').pop()) + parseInt(Math.floor(Date.now() / 1000));
						token_expires.val(expires_in_time);
						break;

					case 'user_id':
						user_id.val(param.split('=').pop());
						break;

					case 'api_type':
						api_type.val(param.split('=').pop());
						break;
				
					default:
						break;
				}
			});

			if( url_hash.indexOf('expires_in') == -1 ) {
				var expires_in = parseInt( 86400 * 60 ) + parseInt(Math.floor(Date.now() / 1000));
				token_expires.val(expires_in);
				console.log('not find expires_in in URL');
			}

			token.parents('form').find('#submit').click();
			
		}

		// NEW API HANDLING AUTHORIZE BUTTON
		var instagram_button_connect = $('.meks-instagram-button-connect');
		var personal_api_url = instagram_button_connect.attr('data-personal-api');
		var	business_api_url = instagram_button_connect.attr('data-business-api');

		instagram_button_connect.on('click', function(e) {
			e.preventDefault();
	
			$('body').append(
				'<div class="meks-instagram-authorize-info">' +
					'<div class="meks-instagram-modal">' +
						'<p>Are you connecting a Personal or Business Instagram Profile?</p>' +
						'<div class="meks-instagram-switch-account-type">' +
							'<p>' +
								'<input type="radio" id="meks-instagram-personal-api" name="meks_instagram_account_type" value="personal" checked>' +
								'<label for="meks-instagram-personal-api"><strong>Personal</strong></label>' +
							'</p><p>' +
							'<input type="radio" id="meks-instagram-business-api" name="meks_instagram_account_type" value="business">' +
							'<label for="meks-instagram-business-api"><strong>Business</strong></label>' +
							'</p>' +
						'</div>' +
						'<a href="'+personal_api_url+'" class="meks-instagram-connect button button-primary">Connect</a>' +
						'<a href="JavaScript:void(0);"><i class="meks-instagram-modal-close fa fa-times"></i></a>' +
					'</div>' +
				'</div>'
			);
			
		});

		$('body').on('click', '.meks-instagram-modal-close', function(){
			$('.meks-instagram-authorize-info').remove();
		});

		$('body').on('change', 'input[name=meks_instagram_account_type]', function() {
            if ($('input[name=meks_instagram_account_type]:checked').val() === 'business') {
                $('a.meks-instagram-connect').attr('href', business_api_url);
            } else {
                $('a.meks-instagram-connect').attr('href', personal_api_url);
            }
        });

	});

})(jQuery);
