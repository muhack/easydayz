<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
?>
<div class="container bicolumn <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	<div class="header row">
		<h1 class="title text-center shadow col-xs-12"><?php echo $this->escape($this->item->title); ?></h1>
	</div>
	<div class="body-article pairheight row">
		<div class="cover-article col-xs-12 col-md-4 col-md-push-8" style="background-image:url('<?php echo htmlspecialchars($images->image_fulltext); ?>')"></div>
		<div class="text-article col-xs-12 col-md-8 col-md-pull-4">
				<?php echo $this->item->text; ?>
		</div>

	</div>
</div>
