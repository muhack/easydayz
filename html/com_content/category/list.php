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

JHtml::_('behavior.caption');

?>
<div class="courses container <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Blog">
	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->category->description;?>
		</div>
	</div>
	<?php $leadingcount = 0;
	$date="";
	$date_to_print="";
	?>
	<?php if (!empty($this->lead_items)) : ?>

			<?php foreach ($this->lead_items as &$item) : ?>
					<?php
					$this->item = & $item;
					$date_to_print=(JString::strcmp($this->item->publish_down,'0000-00-00 00:00:00')==0)? $this->item->publish_up : $this->item->publish_down;
					if(JString::strcmp($date,JHtml::_('date', $date_to_print, JText::_('d/m/Y')))!=0):?>
					<div class="row">
						<div class="col-xs-12 date-line">
							<p class="h3"><?php echo JHtml::_('date', $date_to_print, JText::_('d l')); ?></p>
						</div>
					</div>
					<?php
						endif;
						$date=JHtml::_('date', $date_to_print, JText::_('d/m/Y'));
					echo $this->loadTemplate('item');
					?>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
<?php unset($date_to_print); unset($date);?>
	<?php endif; ?>

	<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
	?>

	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
			<?php if ($rowcount == 1) : ?>
				<?php $row = $counter / $this->columns; ?>
				<div class="items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?> row-fluid clearfix">
			<?php endif; ?>
			<div class="span<?php echo round((12 / $this->columns)); ?>">
				<div class="item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
					<?php
					$this->item = & $item;
					echo $this->loadTemplate('item');
					?>
				</div>
				<!-- end item -->
				<?php $counter++; ?>
			</div><!-- end span -->
			<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
				</div><!-- end row -->
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
			<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
		<div class="cat-children">
			<?php echo $this->loadTemplate('children'); ?> </div>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php endif; ?>
</div>
