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
?>
<?php if($client->mobile):?>
	<nav class="bottombar navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
				<?php
					$length=100/sizeof($list);
					$length.="vw";
				?>
				<?php foreach ($list as $i => &$item):?>
					<li style="max-width:<?php echo $length;?>">
					<?php switch($item->anchor_css):
						case "tel":?>
						<a class="fa fa-2x fa-phone" href="tel:<?php echo $item->flink;?>"><?php echo (json_decode($item->params)->menu_text)?$item->title:"";?></a>
					<?php break;?>
					<?php case "mail":?>
						<a class="fa fa-2x fa-envelope" href="<?php echo $item->flink;?>"><?php echo (json_decode($item->params)->menu_text)?$item->title:"";?></a>
					<?php break;?>
					<?php case "social":?>
						<a class="fa fa-2x fa-<?php echo JString::strtolower($item->title);?>" target="_blank" href="<?php echo $item->flink;?>"><?php echo (json_decode($item->params)->menu_text)?$item->title:"";?></a>
					<?php break;?>
					<?php endswitch;?>
				</li>
				<?php endforeach;?>
          </ul>
        </li>
      </ul>
  </div><!-- /.container-fluid -->
</nav>
<?php endif;?>
