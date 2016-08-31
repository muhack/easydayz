<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
?>
<div class="intro-article">
	<div class="cover" style="background-image:url('<?php echo $images->image_intro;?>')">
		<div class="headline">
			<div class="transition"></div>
			<div class="text">
				<h1><?php echo $this->item->title; ?></h1>
			</div>
		</div>
	</div>
	<div class="downline">
		<div class="details">
			<ul class="list list-inline list-detail">
				<li>
					<span class="fa fa-calendar">&nbsp;</span><?php echo JHtml::_('date', $displayData['item']->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
				</li>
				<li>
					<span class="fa fa-user">&nbsp;</span><?php echo $this->item->created_by_alias;?>
				</li>
			</ul>
		</div>
		<a class="btn" href="<?php echo ($params->get('access-view')) ? JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)):"";?>">
			<?php echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');?>
		</a>
	</div>
</div>
