<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$client=new JWebClient();
$client->string="".($client->mobile)? "-mobile":"";
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="nav navbar-nav <?php echo $class_sfx;?>"<?php
	$tag = '';

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php
foreach ($list as $i => &$item):
	?>
	<?php
	$class = 'item-' . $item->id;

	if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper dropdown full-width';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li' . $class . '>';

	// Render the menu item.
	if($item->deeper):?>
		<a class="dropdown-toggle <?php echo $item->anchor_css ? $item->anchor_css: '';?>"
		href="#" data-toggle="dropdown"
		<?php echo $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';?>
		<?php echo $item->anchor_rel ? 'rel="' . $item->anchor_rel . '"' : '';?>
		role="button" aria-haspopup="true" aria-expanded="false"
		><?php echo $item->title; ?></a>
		<?php
	else:
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
			case 'heading':
				require JModuleHelper::getLayoutPath('mod_menu', 'nav_' . $item->type.''.$client->string);
				break;
			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'nav_url'.$client->string);
				break;
		endswitch;
endif;
	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="dropdown-menu">';
		if(!$client->mobile):
			?>
			<div class="row">
			<div class="col-xs-4">
				<div class="introcover" style="background-image:url('<?php echo $item->menu_image;?>')">
					<div class="title">
						<a class="cta-title" href="<?php echo $item->flink; ?>"
							<?php echo $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';?>
							<?php echo $item->anchor_rel ? 'rel="' . $item->anchor_rel . '"' : '';?>>
							<?php echo $item->title; ?>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xs-8 items">
			<?php
		endif;
	}
	elseif ($item->shallower)
	{
		// The next item is shallower.
		echo (!$client->mobile)?'</div></div></li>':'</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}
endforeach;
?></ul>
