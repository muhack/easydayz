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
$images = json_decode($this->item->images);
JHtml::_('behavior.caption');
jimport('joomla.application.module.helper');
$sidebar = JModuleHelper::getModules('sidebar');
$contact = JModuleHelper::getModules('contact');
$assistantcontact = JModuleHelper::getModules('assistantcontact');
$client=new JApplicationWebClient();
?>
<main class="sponsor-article">
	<div class="container-fluid abovethefold background" style="background-image:url('<?php echo $images->image_intro;?>')">
		<div class="row equalheight">
			<div class="col-xs-12 col-sm-7">
				<div class="corner">
					<div class="avatar" style="background-image:url('<?php echo $images->image_fulltext;?>')">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5">
				<div class="intro-space">
					<div class="bianco70">
						<h1><?php echo $this->item->title;?></h1>
						<p><?php echo $this->item->introtext;?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container content">
		<div class="row">
			<!--Test 1-->
			<?php if($client->mobile):?>
				<!--Test 2-->
				<article class="maintestimonial col-xs-12">
			<?php else:?>
				<!--Test 3-->
				<article class="maintestimonial <?php echo (!empty($sidebar))?"col-xs-8":"col-xs-12";?>">
			<?php endif;?>
			<!--Test 4-->
				<?php echo $this->item->fulltext;?>
			</article>
			<?php if(!$client->mobile):?>
				<?php if(!empty($sidebar)):?>
					<section class="col-xs-4">
							<?php
								foreach($sidebar as $module) {
										echo JModuleHelper::renderModule($module);
									}
									?>
								</section>
							<?php endif;?>
			<?php endif;?>
		</div>
		<div class="row contactsupport">
			<!--<?php
				foreach($assistantcontact as $module) {
						echo JModuleHelper::renderModule($module);
				}
			?>-->
				<?php if(!empty($assistantcontact)):?>
					<section class="col-xs-4">
							<?php
								foreach($assistantcontact as $module) {
										echo JModuleHelper::renderModule($module);
								}
							?>
					</section>
				<?php endif;?>
				<?php if(!empty($contact)):?>
					<section class="<?php echo (!empty($asssistantcontact))?"col-xs-8":"col-xs-12";?>">">
							<?php
								foreach($contact as $module) {
										echo JModuleHelper::renderModule($module);
								}
							?>
					</section>
				<?php endif;?>
		</div>
	</div>
</main>
