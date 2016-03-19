<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params  = &$this->item->params;
$images  = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
$info    = $this->item->params->get('info_block_position', 0);
//print_r($this->params);
?>
<div class="col-xs-12 <?php echo $col;?>">
	<div class="heading">
		<?php echo $this->item->title;?>
			[<?php echo intval($this->key) - intval($this->params['num_leading_articles']);?>]
			[<?php echo $this->params['num_columns'];?>]
	</div>
	<div class="">
			<?php echo $this->item->introtext;?>
	</div>
		<div class="cover col-xs-12 col-md-7" style="background-image:url('<?php echo $images->image_fulltext;?>')">

		</div>
</div>
