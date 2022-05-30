<?php
/*
    Template Name: Home Page
 */
get_header(); 

// Field Manager VARIABLES ================
$pagebackgroundcolor = get_post_meta( get_the_ID(), 'pagebackgroundstyle', true);	
$content1 = get_post_meta( get_the_ID(), 'content1', true);
$content2 = get_post_meta( get_the_ID(), 'content2', true); 
$content3 = get_post_meta( get_the_ID(), 'content3', true);
// $mediaone = get_post_meta('media-one', true);
$hidecontentatmobile = get_post_meta( get_the_ID(), 'hidecontentatmobile', true);
$backgroundstyle = get_post_meta( get_the_ID(), 'backgroundstyle', true);

	
?>
<div class="<?php if($pagebackgroundcolor) echo "page-background--{$pagebackgroundcolor}"; ?>">
    <div class="content">   
        <section>
            <h1><?php the_title(); ?></h1>

            <!-- Gutenberg blocks -->
            <?php the_content(); ?>

            <div class="<?php if($backgroundstyle) echo "background--{$backgroundstyle}"; ?>"> 

                <?php if($content1) : ?>
                    <div class="<?php echo $hidecontentatmobile ? 'content_one hide' : 'content_one' ?>">
                        <?php echo $content1; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php echo $mediaone; ?>

            <div class="row">
                <?php if($content2) : ?>
                    <div class="col-12 col-md-6"><?php echo $content2; ?></div>
                <?php endif; ?>
                <?php if($content3) : ?>
                    <div class="col-12 col-md-6"><?php echo $content3; ?></div>
                <?php endif; ?>
            </div>
        </section>

    </div>
</div>
	

<?php get_footer(); ?>
