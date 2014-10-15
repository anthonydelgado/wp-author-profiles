<?php get_header();?>

	<?php //get_template_part( 'heading' );?> 

	<div id="<?php echo $layout_out; ?>">
		<div class="wrap">
			<div class="cols">
				<div class="<?php echo $blog_col.$blog_style; ?>" id="content">
					<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?> <br>





<div class="user">
            <div class="user-image">
<?php if (!empty($curauth->profile_pic)) { ?>
  <img src="<?php echo $curauth->profile_pic; ?>" width="175" /><?php
}else{  
     $avataridd = $curauth->ID; echo get_avatar( $avataridd , 175 );  
}

?>
            </div>
            <div class="user-info">
              <h1><?php echo $curauth->display_name; ?></h1>
              <span class="pos"><?php echo $curauth->job_title; ?></span>
              <div class="user-social-profile">
<?php if (!empty($curauth->facebook)) { ?><a href="<?php echo $curauth->facebook; ?>"><i class="icon-facebook"></i></a><?php } ?>
<?php if (!empty($curauth->twitter)) { ?><a href="<?php echo $curauth->twitter; ?>"><i class="icon-twitter"></i></a><?php } ?>
<?php if (!empty($curauth->googleplus)) { ?><a href="<?php echo $curauth->googleplus; ?>"><i class="icon-google-plus"></i></a><?php } ?>
<?php if (!empty($curauth->linkedin)) { ?><a href="<?php echo $curauth->linkedin; ?>"><i class="icon-linkedin"></i></a><?php } ?>
  <?php if (!empty($curauth->user_url)) { ?><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->nickname; ?>'s Website.</a><?php } ?>
              </div>
              <p><?php echo $curauth->description; ?></p>
			  
			  
<p class="no-margin"><a class="color button normal" href="http://www.tdnyc.com/radvision-avaya/">Contact <?php echo $curauth->nickname; ?></a></p>
            </div>
          </div>


		  
					
				</div> <!--// #content -->

			</div><!--// .cols -->
		</div><!--// .wrap -->
	</div><!--// id -->

<?php get_footer();?>
