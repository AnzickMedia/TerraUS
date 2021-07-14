<?php

		?>
			<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
			    <div><label class="screen-reader-texts" for="s"><?php esc_html_e('Search for:', 'maple') ?></label>
			        <input type="text" value="" placeholder="<?php
				        if (function_exists('icl_t')){
					        echo sprintf(esc_attr__("%s", "maple"), icl_t( 'maple', 'Type your search and hit enter...', get_option('maple_search_box_text')));
				        } else {
					        echo sprintf(esc_attr__("%s", "maple"), get_option("maple_search_box_text"));
				        }
			        ?>" onfocus="if (jQuery(this).val() === '<?php echo sprintf(esc_attr__("%s", "maple"), get_option("maple_search_box_text")); ?>') jQuery(this).val('');" onblur="if (jQuery(this).val() === '') jQuery(this).val('<?php echo sprintf(esc_attr__("%s", "maple"), get_option("maple_search_box_text")); ?>');" name="s" id="s" />
			        <input type="submit" id="searchsubmit" value="<?php echo esc_attr('Search','maple'); ?>" />
			    </div>
			</form>
		<?php

?>