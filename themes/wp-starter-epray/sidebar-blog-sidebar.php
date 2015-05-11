				<div id="blog-sidebar" class="blog-sidebar sidebar clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>

						<?php dynamic_sidebar( 'blog-sidebar' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-help">
							<p><?php _e("Please activate some Widgets in the blog sidebar.", "dmsqdtheme");  ?></p>
						</div>

					<?php endif; ?>

				</div>