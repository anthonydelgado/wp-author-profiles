<?php

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'log-in' );
}


add_action('init', 'cng_author_base');
function cng_author_base() {
    global $wp_rewrite;
    $author_slug = 'profile'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'wp_enqueue_media' );
add_action( 'show_user_profile', 'wp_enqueue_media' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>


	<tr>
			<th><label for="job_title">Job Title</label></th>

			<td>
				<input type="text" name="job_title" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Job Title.</span>
			</td>
		</tr>

	<tr>
			<th><label for="profile_pic">Profile Picture</label></th>

			<td>
				<img src="<?php echo esc_attr( get_the_author_meta( 'profile_pic', $user->ID ) ); ?>" width="75" /><br />
 
<label for="upload_image">
    <input id="upload_image" type="text" size="36" name="profile_pic" value="<?php echo esc_attr( get_the_author_meta( 'profile_pic', $user->ID ) ); ?>" /> 
    <input id="upload_image_button" class="button" type="button" value="Upload Image" />
    <br />Enter a URL or upload an image
</label>

				<span class="description">Please select your Profile Picture.</span>
			</td>
		</tr>

	</table>
<?php }



add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'job_title', $_POST['job_title'] );
	update_usermeta( $user_id, 'profile_pic', $_POST['profile_pic'] );
}


add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {

wp_enqueue_media();
        wp_register_script('custom_uploader-js','/wp-content/themes/tdnyc/custom_uploader.js', array('jquery'));
        wp_enqueue_script('custom_uploader-js');

   if (strpos($_SERVER['PHP_SELF'],'/wp-admin/profile.php') !== false) { 
        wp_enqueue_media();
        wp_register_script('custom_uploader-js','/wp-content/themes/tdnyc/custom_uploader.js', array('jquery'));
        wp_enqueue_script('custom_uploader-js');
    }
}



//show_admin_bar( false );



// Create the function to remove dashboard widgets from the action hook
 //Remove unwanted widgets from Dashboard

 function disable_dashboard_widgets() {  
  
    remove_meta_box('dashboard_primary', 'dashboard', 'core');  
}  
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');



?>
