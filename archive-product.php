<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
	if( have_posts() ): ?>
		<?php 
		while( have_posts() ): 
			the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail( 'thumbnail' ,  array( 'class' => 'thumb' ) ); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>			

			<div class="entry-content">
				<?php 
				//if viewing a single post, show full content, otherwise, show excerpt
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt(); //first 55 words of the post
				} ?>

				<?php 
				//show the price in a cute little page 
				$price = get_post_meta( $post->ID, 'Price', true );
				if( $price ){
					echo '<span class="product-price">';
					echo $price;
					echo '</span>';
				}
				?>
			</div>
				
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php
			if( is_single() ){
				//single pagination
				next_post_link('%link', '&larr; Newer Post: %title ' );		//newer post
				previous_post_link( '%link', ' Older Post: %title &rarr;' );  //older post
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

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>