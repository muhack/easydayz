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
	<!-- Button trigger modal -->
	<button type="button" class="btn fa fa-3x fa-share-alt" data-toggle="modal" data-target="#shareModal">
	</button>

	<!-- Modal -->
	<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="shareModalLabel"><<?php $this->title;?></h4>
	      </div>
	      <div class="modal-body">
					<ul class="list social-list">
						<?php foreach ($list as $i => &$item):?>
							<li class="social-icon">
								<a class="fa fa-3x <?php echo $item->anchor_css;?>"href="<?php echo $item->flink; ?>"></a>
							</li>
						<?php endforeach;?>
					</ul>
	      </div>
	    </div>
	  </div>
	</div>
<?php else:?>
<ul class="list social-list">
	<?php foreach ($list as $i => &$item):?>
		<li class="social-icon">
			<a class="fa fa-3x <?php echo $item->anchor_css;?>"href="<?php echo $item->flink; ?>"></a>
		</li>
	<?php endforeach;?>
</ul>
<?php endif;?>
