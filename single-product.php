<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
	if( have_posts() ): ?>
		<?php 
		while( have_posts() ): 
			the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php the_post_thumbnail( 'large' ,  array( 'class' => 'product-image alignright' ) ); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>	

			<div class="entry-content">
			<?php the_meta(); //list of all custom fields ?>

			<?php the_terms( $post->ID, 'brand', '<b>Brand:</b> ' ); ?>

			<?php the_terms( $post->ID, 'feature', '<br /><b>Features:</b> ' ); ?>

			<?php the_content(); ?>
			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php
			if( is_single() ){
				//single pagination
				next_post_link('%link', '&larr; Newer Product: %title ' );		//newer post
				previous_post_link( '%link', ' Older Product: %title &rarr;' );  //older post
			}else{
				//archive pagination
				//use pagenavi plugin if it exists
				if( function_exists('wp_pagenavi') ){
					wp_pagenavi();
				}else{
					next_posts_link('&larr; Older Posts');  	//older posts
					previous_posts_link('Newer Posts &rarr;');  //newer posts
				}
			}
			?>			
		</div>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar( 'shop' ); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>