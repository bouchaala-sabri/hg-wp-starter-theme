
		</div> <!-- #content-wrap -->

		<div id="footer" class="cf">
		
			<div class="address">
				<b><?php bloginfo( 'name' ); ?></b><br />
				Address Line 1<br />
				Address Line 2
			</div>  <!-- /.address -->
			
			<div id="footer-nav">
				<div id="copyright">&copy;<?php echo date('Y');?> <?php bloginfo( 'name' ); ?></div>
				<?php hg_get_footer_menu(); ?>
			</div> <!-- /#footer-nav -->
			
		</div> <!-- /#footer -->

	</div><!-- #shell-inner -->
	</div><!-- #shell -->

<?php wp_footer(); ?>
</body>
</html>