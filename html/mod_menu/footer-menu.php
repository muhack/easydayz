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
$client=new JApplicationWebClient();
$deeper=0;
if(!$client->mobile):?>
	<?php // The menu class is deprecated. Use nav instead. ?>
	<ul class="list menu-list">
		<?php foreach ($list as $i => &$item):?>
			<?php if(!$item->deeper):?>
				<li>
					<a href="<?php echo $item->flink;?>"><?php echo $item->title?></a>
				</li>
			<?php endif;?>
		<?php endforeach;?>
	</ul>

<?php endif;?>
