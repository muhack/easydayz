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
?>
<div class="row featured-singleton <?php echo $item->state == 0 ? ' system-unpublished' : null; ?> clearfix"
	itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" style="background-image:url('<?php echo $images->image_intro;?>')">
	<div class="heading col-xs-12">
		<?php echo $this->item->title;?>
	</div>
	<div class="pairheight col-xs-12">
	<div class="description col-xs-12 col-md-5">
			<?php echo $this->item->introtext;?>
	</div>
		<div class="cover col-xs-12 col-md-7" style="background-image:url('<?php echo $images->image_fulltext;?>')">

		</div>
  </div>
	<?php	if($this->item->readmore):?>
		<div class="col-xs-12 cta">
			<a class="evidence" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>">
		<?php $attribs = json_decode($this->item->attribs); ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
	</a>
		</div>
	<?php endif;	?>
</div>
