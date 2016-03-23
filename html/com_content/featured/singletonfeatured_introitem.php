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
<div class="introitem col-xs-12 <?php echo $this->col;?>">
	<?php if($images->image_intro!=''):?>
		<div class="cover" style="background-image:url('<?php echo $images->image_intro;?>')">
	<?php else:?>
		<div class="cta">
			<a class="circle evidence fa fa-5x <?php echo $images->image_intro_alt;?>" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>"></a>
	<?php endif;?>
	</div>
	<div class="heading shadow-title">
		<p class="h1"><?php echo $this->item->title;?></p>
			<!--[<?php echo intval($this->key) - intval($this->params['num_leading_articles']);?>][<?php echo $this->params['num_columns'];?>]-->
	</div>
	<div class="text">
			<?php echo $this->item->introtext;?>
	</div>
	<div class="cta spantop45 spanbottom45">
		<a class="evidence" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>">
			<?php $attribs = json_decode($this->item->attribs); ?>
			<?php
			if ($readmore = $this->item->alternative_readmore) :
				echo $readmore;
			else :
				echo JString::substr(JText::_('COM_CONTENT_READ_MORE'),0,(JString::strpos(JText::_('COM_CONTENT_READ_MORE'),':')));
			endif; ?>
		</a>
	</div>
</div>
