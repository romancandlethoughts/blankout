<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div id="main" class="col-lg-9">
			<?php
			// uncomment for breadcrumbs
			/*if(function_exists('bcn_display')) : ?>
				<ol class="breadcrumb">
					<?php if(function_exists('bcn_display_list')) : bcn_display_list(); endif; ?>
				</ol>
			<?php endif;*/
			?>

			<?php if(is_category()) : ?>
				<h1 class="archive-title h2">
					<?php printf(__('Category Archives: %s', 'blankout'), single_cat_title('', FALSE)); ?>
				</h1>

				<?php
				$category_description = category_description();
				if(!empty($category_description)) {
					echo apply_filters('archive_meta', '<div class="archive-meta">'.$category_description.'</div>');
				}
				?>

			<?php elseif(is_tag()) : ?>
				<h1 class="archive-title h2">
					<span><?php _e("Posts Tagged:", 'blankout'); ?></span> <?php echo mapi_single_term_title(); ?>
				</h1>

			<?php
			elseif(is_author()) : global $post; ?>
				<h1 class="archive-title h2">
					<span><?php _e("Posts By:", 'blankout'); ?></span> <?php echo get_the_author_meta('display_name', $post->post_author); ?>
				</h1>
			<?php
			elseif(is_day()) : ?>
				<h1 class="archive-title h2">
					<span><?php _e("Daily Archive:", 'blankout'); ?></span> <?php the_time(get_option('date_format', 'l, F j, Y')); ?>
				</h1>

			<?php
			elseif(is_month()) : ?>
				<h1 class="archive-title h2">
					<span><?php _e("Monthly Archive:", 'blankout'); ?></span> <?php the_time('F Y'); ?>
				</h1>

			<?php
			elseif(is_year()) : ?>
				<h1 class="archive-title h2">
					<span><?php _e("Yearly Archive:", 'blankout'); ?></span> <?php the_time('Y'); ?>
				</h1>
			<?php endif; ?>

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<header class="article-header post-header">
						<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<small class="byline vcard"><?php _e("Posted", 'blankout'); ?>
							<time class="updated" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format', 'l, F j, Y')); ?></time> <?php _e("by", 'blankout'); ?>
							<span class="author"><?php the_author_posts_link(); ?></span> <span class="amp">&amp;</span> <?php _e("filed under", 'blankout'); ?> <?php the_category(', '); ?>.
						</small>
					</header>
					<section class="entry-content clearfix">
						<?php if(has_post_thumbnail()) : ?>
							<?php
							mapi_featured_img(
								array(
									'w' => get_option('medium_size_w', 125),
									'h' => get_option('medium_size_h', 125)
								)
							);
							?>
						<?php endif; ?>
						<?php echo mapi_excerpt(); ?> <?php echo mapi_excerpt_more(); ?>
					</section>
					<footer class="article-footer">
						<?php the_taxonomies('before=<p class="tags">&after=</p>&template=%s: %l'); ?>
						<?php echo mapi_edit_link(); ?>
					</footer>
				</article>

			<?php endwhile; ?>

				<?php blankout_page_nav(); ?>

			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
