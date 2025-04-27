<?php
/**
 * TMPL - Single Demo Preview
 *
 */
defined( 'ABSPATH' ) or exit;
?>
<div class="wrap" id="zita-site-library-admin">


		<?php do_action( 'zita_site_library_cate'); ?>

	<?php do_action( 'zita_site_library_before_site_grid' ); ?>

	<div class="theme-browser rendered">
		<div id="zita-site-library" class="themes wp-clearfix"></div>
	</div>

	<div class="select-page-builder">
		<div class="note-wrap">
		<!-- 	<h3>
				<span class="up-arrow dashicons dashicons-editor-break"></span>
				<div class="note">'Select Your Elementor Demo', 'zita-site-library' ); ?></div>
			</h3>
 -->		</div>
		<!--img-->
	</div>

	<div class="spinner-wrap">
	</div>

	<?php do_action( 'zita_site_library_after_site_grid' ); ?>
<div class='zita-site-library-theme-preview'></div>

</div>

<?php
/**
 * TMPL - Single Demo Preview
 */
?>

<script type="text/template" id="tmpl-zita-template">
	<ul class="">
	<# for ( key in data.elementor ) { #>
	<li  style="width:300px;" class="zitademo themes demo_{{{data.elementor[key].type}}}" slug="{{{data.elementor[key].slug}}}" demo_type ="{{{data.elementor[key].type}}}" zita_template ="{{{data.elementor[key].template}}}" api ="{{{data.elementor[key].demo_api}}}" zita_import="{{{data.elementor[key].import_url}}}" zita_demo="{{{data.elementor[key].demo_url}}}" cate="{{{data.elementor[key].category}}}" thumb="{{{data.elementor[key].thumb}}}" plugins='<# for( keys in data.elementor[key].plugins) { #>{"slug":"{{{data.elementor[key].plugins[keys].slug}}}", "init":"{{{data.elementor[key].plugins[keys].init}}}","name":"{{{data.elementor[key].plugins[keys].name}}}"},<# } #>'>
		<a><img style="width:300px;" src="{{{data.elementor[key].thumb}}}"></a>
		<div class="zita-site-library-container">
			<h3 class="theme-name" id="zita-theme-name"> {{{data.elementor[key].template}}} </h3>
			<div class="theme-actions">
				<button class="button preview install-theme-preview">Preview</button>
			</div>
		</div>
	</li>
			<# } #>
</ul>
</script>


<!-- site demo , install plugins and import demo -->
 <script type="text/template" id="tmpl-demo-template">
  <div class="zita-sites-preview theme-install-overlay wp-full-overlay expanded" style="display: block;">
  		<div class="wp-full-overlay-sidebar">
  			<div class="wp-full-overlay-header" data-required-plugins="{{data.required_plugins}}" data-demo-api="{{{data.demo_api}}}" data-demo-slug="{{{data.slug}}}">
  				<button class="close-full-overlay"><span class="screen-reader-text"><?php esc_html_e( 'Close', 'zita-site-library' ); ?></span></button>

				<button class="previous-theme"><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'zita-site-library' ); ?></span></button>

				<button class="next-theme"><span class="screen-reader-text"><?php esc_html_e( 'Next', 'zita-site-library' ); ?></span></button>

				<a class="button hide-if-no-customize zita-demo-import" href="#" data-import="disabled"><?php esc_html_e( 'Install Plugins', 'zita-site-library' ); ?></a>
			</div>

			<div class="wp-full-overlay-sidebar-content">
				<div class="install-theme-info">

					<!-- <span class="site-type {{{data.zita_demo_type}}}">{{{data.zita_demo_type}}}</span> -->
					<h3 class="theme-name">{{{data.demo_name}}}</h3>
					<# if ( data.screenshot.length ) { #>
						<img class="theme-screenshot" src="{{{data.screenshot}}}" alt="">
					<# } #>

					<div class="theme-details">
						<!-- {{{data.content}}} -->
					</div>
					<a href="#" class="theme-details-read-more"><?php _e( '', 'zita-site-library' ); ?></a>

					<div class="required-plugins-wrap">
						<h4><?php _e( 'Required Plugins', 'zita-site-library' ); ?> </h4>
							<div class="required-plugins">
								<div class="spinner-wrap">
									<span class="spinner is-active"></span>
								</div>
							<!-- <# for ( keys in data.required_plugins) { #>
								

							<div class="plugin-card  		plugin-card-{{{data.required_plugins[keys].slug}}}" data-slug="so-widgets-bundle" data-init="{{{data.required_plugins[keys].init}}}">	
							<span class="title">{{{data.required_plugins[keys].name}}}</span>	

							<button class="button install-now" data-init="{{{data.required_plugins[keys].init}}}" data-slug="{{{data.required_plugins[keys].slug}}}" data-name="{{{data.required_plugins[keys].name}}}">Install Now	</button>

							</div>


								<# } #> -->

						</div>
					</div>
				</div>
				<div class="wp-full-overlay-footer">

				<div class="footer-import-button-wrap">
					<a class="button button-hero hide-if-no-customize zita-demo-import" href="#" data-import="disabled">
						<?php esc_html_e( 'Install Plugins', 'zita-site-library' ); ?>
					</a>
				</div>

				<button type="button" class="collapse-sidebar button" aria-expanded="true"
						aria-label="Collapse Sidebar">
					<span class="collapse-sidebar-arrow"></span>
					<span class="collapse-sidebar-label"><?php esc_html_e( 'Collapse', 'zita-site-library' ); ?></span>
				</button>

				<div class="devices-wrapper">
					<div class="devices">
						<button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
							<span class="screen-reader-text"><?php _e( 'Enter desktop preview mode', 'zita-site-library' ); ?></span>
						</button>
						<button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
							<span class="screen-reader-text"><?php _e( 'Enter tablet preview mode', 'zita-site-library' ); ?></span>
						</button>
						<button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile">
							<span class="screen-reader-text"><?php _e( 'Enter mobile preview mode', 'zita-site-library' ); ?></span>
						</button>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="wp-full-overlay-main">
			<iframe src="{{{data.demo_url}}}/?hide" title="<?php esc_attr_e( 'Preview', 'zita-site-library' ); ?>"></iframe>
		</div>
  </div>
</script>
<?php
wp_print_admin_notice_templates();