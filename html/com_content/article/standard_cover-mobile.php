<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$images  = json_decode($this->item->images);

?>
<header class="container-fluid product <?php echo $this->pageclass_sfx; ?>" style="background-image:url('<?php echo $images->image_intro;?>');'">
	<div class="row">
		<div class="col-xs-12 nero60">
			<div>
				<div class="title">
					<?php echo $this->item->title;?>
				</div>
			</div>
		</div>
	</div>
</header>
