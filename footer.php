</main>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 widget">
					<?php if ( function_exists( 'dynamic_sidebar' ) ) { dynamic_sidebar( 'footer-1' ); } ?>
				</div>
				<div class="col-md-4 widget">
					<?php if ( function_exists( 'dynamic_sidebar' ) ) { dynamic_sidebar( 'footer-2' ); } ?>
				</div>
				<div class="col-md-4 widget">
					<?php if ( function_exists( 'dynamic_sidebar' ) ) { dynamic_sidebar( 'footer-3' ); } ?>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
