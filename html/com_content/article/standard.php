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

// Create shortcuts to some parameters.
$params  = $this->item->params;
$urls    = json_decode($this->item->urls);
$info    = $params->get('info_block_position', 0);
$images = json_decode($this->item->images);
$attribs=json_decode($this->item->attribs);
JHtml::_('behavior.caption');
jimport('joomla.application.module.helper');
$sidebar = JModuleHelper::getModules('sidebar');
$client=new JApplicationWebClient();
$client->string="".($client->mobile)? "-mobile":"";
?>
<main class="article ">
	<?php echo $this->loadTemplate("cover".$client->string); ?>
	<?php	if($client->mobile):?>
		<?php if(!empty($sidebar)):?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 modal-sidebar">
						<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary btn-lg shadow" data-toggle="modal" data-target="#modalSideBar">
							  <?php echo $attribs->alternative_readmore;?>
							</button>
							<!-- Modal -->
							<div class="modal fade" id="modalSideBar" tabindex="-1" role="dialog" aria-labelledby="modalSideBarLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="modalSideBarLabel"><?php echo $this->item->title;?></h4>
							      </div>
							      <div class="modal-body">
											<div class="sidebar">
												<?php
													foreach($sidebar as $module) {
										    			echo JModuleHelper::renderModule($module);
													}
												?>
											</div>
							      </div>
							    </div>
							  </div>
							</div>

					</div>
				</div>
			</div>
		<?php endif;?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php echo $this->item->fulltext;?>
				</div>
			</div>
		</div>
	<?php	else:?>
		<div class="pairheight container" id="ReadMore">
			<div class="row">
		<div class="fulltext <?php echo (!empty($sidebar)) ? "col-xs-8" : "col-xs-12";?>">
			<?php echo $this->item->fulltext;?>
		</div>
		<?php if(!empty($sidebar)):?>
			<div class="sidebar col-xs-4">
				<?php
					foreach($sidebar as $module) {
		    			echo JModuleHelper::renderModule($module);
					}
				?>
			</div>
		<?php endif;?>
	</div>
	</div>
	<?php endif;?>
</main>
