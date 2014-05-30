<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
	if( have_posts() ): ?>
		<?php 
		while( have_posts() ): 
			the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail( 'thumbnail' ,  array( 'class' => 'thumb' ) ); ?>

			<div class="entry-content">
				<?php 
				//if viewing a single post, show full content, otherwise, show excerpt
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt(); //first 55 words of the post
				} ?>
			</div>
			<div class="postmeta"> 
				<span class="author"> Posted by: <?php the_author(); ?></span>
				<span class="date"> <?php the_date(); ?> </span>
				<span class="num-comments">
					<a href="<?php the_permalink() ?>#comments">
						<?php comments_number(); ?>
					</a></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php //display comments list and form
		comments_template(); ?>

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