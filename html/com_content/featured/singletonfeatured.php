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

</div>
</div>
<div class="container-fluid">
<?php if (!empty($this->lead_items)) : ?>
	<div class="row">
	<?php foreach ($this->lead_items as &$item) : ?>
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if (!empty($this->intro_items)) : ?>
	<?php
	switch($this->params['num_columns']){
		case 0:
		default:
			$col="";
			break;
		case 2:
			$col="col-sm-6";
			break;
		case 3:
			$col="col-sm-4";
			break;
		case 4:
			$col="col-sm-2 col-md-6";
			break;
		case 6:
			$col="col-sm-6 col-md-4 col-lg-2";
			break;
	}?>
	<?php foreach ($this->intro_items as $key => &$item) : ?>
		<?php if($key%$this->params['num_columns']==0):?>
			<?php $open=true;?>
			<div class="row spantop45 pairheight">
		<?php endif;?>
		<?php
				$this->item = &$item;
				$this->key= &$key;
				$this->col=&$col;
				echo $this->loadTemplate('introitem');
		?>
		<?php if((($key+1)%$this->params['num_columns']==0)&&($open)):
			$open=false;
			echo '</div>';
		endif;?>
	<?php endforeach; ?>
	<? echo (!$open) ? "</div>" : "";unset($open);?>
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
