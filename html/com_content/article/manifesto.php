<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$urls    = json_decode($this->item->urls);
$images  = json_decode($this->item->images);
?>
<main class="article manifesto">
	<header class="cover" style="background-image:url('<?php echo $images->image_fulltext;?>');'">
		<div class="headline">
				<div class="transition"></div>
				<div class="text">
						<h1><?php echo $this->item->title; ?></h1>
				</div>
		</div>
	</header>
	<section class="intro">
					<?php echo $this->item->introtext;?>
	</section>
	<article class="columns-3">
					<?php echo $this->item->fulltext;?>
	</article>
	<footer>
		<div class="col-xs-4">
			<a href="<?php echo $urls->urla;?>">
				<?php echo $urls->texturla;?>
			</a>
		</div>
			<div class="col-xs-4">
					<a href="<?php echo $urls->urlb;?>">
						<?php echo $urls->texturlb;?>
					</a>
			</div>
				<div class="col-xs-4">
					<a href="<?php echo $urls->urlc;?>">
						<?php echo $urls->texturlc;?>
					</a>
				</div>
	</footer>
</main>
