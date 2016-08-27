<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
if(!JString::stristr($item->anchor_css,"no_standard")):
?>
<div class="col-xs-12 <?php echo $item->anchor_css?>">
	<div class="introcover" style="background-image:url('<?php echo $item->menu_image;?>')">
		<div class="title">
			<a class="cta-title" href="<?php echo $item->flink; ?>"
				<?php echo $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';?>
				<?php echo $item->anchor_rel ? 'rel="' . $item->anchor_rel . '"' : '';?>>
				<?php echo $item->title; ?>
			</a>
		</div>
	</div>
</div>
<?php
else:
	?>
	<a class="<?php echo $item->anchor_css; ?>" href="<?php echo $item->flink; ?>"
		<?php echo $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';?>
		<?php echo $item->anchor_rel ? 'rel="' . $item->anchor_rel . '"' : '';?>>
		<?php echo $item->title; ?>
	</a>
<?php endif;?>
