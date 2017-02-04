<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
class JVPreportView extends JViewLegacy
{   
    function __construct(){
        parent::__construct();
    }
	
	function _JVButton( $link, $image, $text, $path='/administrator/images/', $target='', $onclick='' ) {
	 	if( $target != '' ) {
	 		$target = 'target="' .$target. '"';
	 	}
	 	if( $onclick != '' ) {
	 		$onclick = 'onclick="' .$onclick. '"';
	 	}
	 	if( $path === null || $path === '' ) {
	 		$path = '/administrator/images/';
	 	}
		?>
		<div style="float:left;" class="item-cpanel">
			<div class="icon">
				<a href="<?php echo $link; ?>" <?php echo $target;?>  <?php echo $onclick;?>>
					<?php
                                              echo '<img src="'.$path.$image.'" />';
                                        ?>
					<span><?php echo $text; ?></span>
				</a>
			</div>
		</div>
		<?php
	}

	
}
?>