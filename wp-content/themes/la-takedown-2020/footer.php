

      </main> <?php // end .page-content ?>


	<footer class='page-section site-footer'>
	<inner-column>

    <nav class='main-nav'>
      <?php wp_nav_menu('main-menu'); ?>
    </nav>

    <div class='legal'>
      © 2015 - <?php echo date('Y'); ?>
    </div>

	</inner-column>
	</footer>


	<?php require('partials/google-analytics.php'); ?>
  
	<?php // pull in scripts among other things ?>
	<?php wp_footer(); ?>
</body></html>