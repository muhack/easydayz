<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="container-fluid linkitems">
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
	}
	$open=false;?>
	<?php foreach ($this->link_items as $key => &$item) : ?>
		<?php
		$params  = &$this->item->params;
		$images  = json_decode($this->item->images);
		?>
		<?php if(($key-1)%$this->params['num_columns']==0):?>
					<?php $open=true;?>
					<div class="row spantop45 pairheight">
		<?php endif;?>
		<div class="<?php echo $col;?> preview">
			<div class="cover" style="background-image:url('<?php echo $images->image_intro;?>');">
			</div>
			<div class="cta">
				<!-- Button trigger modal -->
				<button type="button" class="evidence" data-toggle="modal" data-target="#myModal-links-<?php echo $key;?>">
					<?php
					if ($attribs->alternative_readmore == null) :
						echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
					elseif ($readmore = $this->item->alternative_readmore) :
						echo $readmore;
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
					else :
						echo JText::_('COM_CONTENT_READ_MORE');
						echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
					endif; ?>
				</button>
			</div>
		</div>

	<?php if((($key)%$this->params['num_columns']==0)&&($open)):
	$open=false;
	echo '</div>';
	endif;?>
	<?php endforeach; ?>
	<? echo (!$open) ? "</div>" : "";unset($open);?>

	<?php foreach ($this->link_items as $key => &$item) : ?>
			<?php
			$params  = &$this->item->params;
			$images  = json_decode($this->item->images);
			?>
	<div class="modal fade" id="myModal-links-<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="label-title-links-<?php echo $key;?>">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="label-title-links-<?php echo $key;?>"><?php echo $this->item->title;?></h4>
	      </div>
	      <div class="modal-body" style="background-image:url('<?php echo $images->image_intro;?>')">

	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>
<?php endforeach;?>
</div>
