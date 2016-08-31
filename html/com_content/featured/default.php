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

JHtml::_('behavior.caption');
$images=json_decode($this->images);
?>

<div class="blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="https://schema.org/Blog">

	<?php if (!empty($this->lead_items)) : ?>
		<div class="items-leading clearfix">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="leading" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->intro_items)) : ?>
		<?php
		    switch($this->columns){
                default:
                case 1:
                    $this->columns=12;
                    break;
                case 2:
                    $this->columns=6;
                    break;
                case 3:
                    $this->columns=4;
                    break;
                case 4:
                    $this->columns=3;
                    break;
                case 6:
                    $this->columns=2;
                    break;
            }
		?>
		<div class="intro-items pairheight">
			<?php foreach ($this->intro_items as $key => &$item) : ?>
				<div class="item col-xs-12 col-sm-<?php echo $this->columns;?>"
					 itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
				<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
				?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->link_items)) : ?>
        <div class="links-item">
            <?php foreach ($this->intro_items as $key => &$item) : ?>
                <div class="item col-xs-12"
                     itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <?php
                    $this->item = &$item;
                    echo $this->loadTemplate('links');
                    ?>
                </div>
            <?php endforeach; ?>
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
