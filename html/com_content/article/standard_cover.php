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
$attribs = json_decode($this->item->attribs);
?>
<header class="container-fluid product<?php echo $this->pageclass_sfx; ?>" style="background-image:url('<?php echo $images->image_intro;?>');'">
	<div class="row nero60">
		<div class="col-xs-7">
			<div class="cover" style="background-image:url('<?php echo $images->image_fulltext;?>');'">
				<div class="title">
					<?php echo $this->item->title;?>
				</div>
			</div>
		</div>
		<div class="col-xs-5">
			<div class="desc">
				<?php echo $this->item->introtext;?>
				<a class="cta-title" href="#ReadMore"><?php echo $attribs->alternative_readmore;?></a>
			</div>
		</div>
	</div>
</header>
