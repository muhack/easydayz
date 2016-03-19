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

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space

?>
<div class="container-fluid">
<div class="row blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="http://schema.org/Blog">
<?php if ($this->params->get('show_page_heading') != 0) : ?>
<div class="col-xs-12 page-header">
	<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
</div>
<?php endif; ?>

</div>
</div>
<div class="container-fluid">
<?php if (!empty($this->lead_items)) : ?>

	<?php foreach ($this->lead_items as &$item) : ?>
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
	<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($this->intro_items)) : ?>
	<?php foreach ($this->intro_items as $key => &$item) : ?>
		<?php if($key%$this->params['num_columns']==0):?>
			<div class="row"><?php echo $key;?>
		<?php endif;?>
		<?php
				$this->item = &$item;
				$this->key= &$key;
				echo $this->loadTemplate('introitem');
		?>
		<?php if($key%$this->params['num_columns']==0):?>
			</div>
		<?php endif;?>
	<?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($this->link_items)) : ?>
	<div class="items-more">
	<?php echo $this->loadTemplate('links'); ?>
	</div>
<?php endif; ?>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
	<div class="pagination">

		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php  endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
<?php endif; ?>

</div>
</div>
