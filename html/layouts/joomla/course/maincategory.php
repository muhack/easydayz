<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
// Note that this layout opens a div with the page class suffix. If you do not use the category children
// layout you need to close this div either by overriding this file or in your main layout.
$params    = $displayData->params;
$extension = $displayData->get('category')->extension;
$canEdit   = $params->get('access-edit');
$className = substr($extension, 4);
?>
<div class="container-fluid course">
	<div class="row cover" style="background-image:url('<?php echo $displayData->get('category')->getParams()->get('image'); ?>')">
	<?php if ($params->get('show_page_heading')) : ?>
		<div class="col-xs-12 heading">
			<h1><?php echo $displayData->escape($params->get('page_heading')); ?></h1>
		</div>
	<?php endif;?>
		<div class="hidden-xs hidden-sm col-md-12 description">
			<?php echo JHtml::_('content.prepare', $displayData->get('category')->description, '', $extension . '.category'); ?>
		</div>
	</div>

</div>
