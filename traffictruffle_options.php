<div class="wrap">
<h2>Traffic Truffle</h2>

<?php if ( current_user_can('administrator') ) { ?>

    <form method="post" action="options.php">
    <?php settings_fields('traffictruffle'); ?>
    
    <p>All you need to do is to paste in the 32 character Traffic Truffle code you were given when you signed up</p>
    <p>Add this to the box below, click <?php _e('Save Changes') ?> and then you can see your business leads on <a target="_blank" href="https://my.traffictruffle.com">https://my.traffictruffle.com</a> </p>
    
    <table class="form-table">
    
    <tr valign="top">
    <th scope="row">Traffic Truffle ID:</th>
    <td><input type="text" size="60" name="truffleID" value="<?php echo get_option('truffleID'); ?>" /></td>
    </tr>
    
    </tr>
    
    </table>
    
    <input type="hidden" name="action" value="update" />
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
    
    </form>
    
<?php } else { ?>
	<p>Only Administrators can change this setting. Have a nice day!</p>
<?php } ?>
    
</div>
