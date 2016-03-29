<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
switch(count($this->link_items)%4){
	default:
		$first=$col="col-xs-12";
		break;
	case 0:
		$first=$col="col-xs-12 col-sm-6 col-md-3";
		break;
	case 1:
		$col="col-xs-12 col-sm-6 col-md-3";
		$first="col-xs-12";
		break;
	case 2:
		$col="col-xs-12 col-sm-6";
		break;
	case 3:
		$col="col-xs-12 col-sm-6";
		$first="col-xs-12";
		break;
}
?>

<div class="list-courses container-fluid">
	<div class="row">
<?php
$key=0;
	foreach ($this->link_items as &$item) :?>
	<div	class="<?php echo if($key==0)? $first : $col; $key++;?>">
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
			<?php echo $item->title; ?></a>
	</div>
<?php endforeach; ?>
</div>
</div>
