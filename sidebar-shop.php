<aside id="sidebar">
	<section class="widget">
		<h3 class="widget-title">Filter by Brand</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'brand',
				'title_li' => '',
				'show_count' => true,
			) ); ?>
		</ul>
	</section>
	<section class="widget">
		<h3 class="widget-title">Filter by Feature</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'feature',
				'title_li' => '',
				'show_count' => true,
			) ); ?>
		</ul>
	</section>
</aside>