<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
$images = json_decode($this->item->images);
$urls=json_decode($this->item->urls);
$date_to_print=(JString::strcmp($this->item->publish_down,'0000-00-00 00:00:00')==0)? $this->item->publish_up : $this->item->publish_down;
?>

<div class="list-course row">
  <div class="col-xs-12 col-sm-2 time">
    <p class="h4"><time datetime="<?php echo JHtml::_('date', $date_to_print, 'c'); ?>" itemprop="datePublished">
      <?php echo JHtml::_('date', $date_to_print, JText::_('H:i')); ?>
    </time></p>
  </div>
  <div class="col-xs-12 col-sm-6 title">
      <p class="h4"><?php echo $this->item->title;?></p>
  </div>
  <div class="col-xs-12 col-sm-4 author">
      <p class="h4"><?php echo $this->item->author;?></p>
  </div>
</div>
<div class="list-course row">
  <div class="col-xs-12 col-sm-4 details">
    <ul class="links">
      <li class="icon">
        <?php echo ($urls->urla)? '<a href="'.$urls->urla.'"':'<span';?>
        class="fa fa-3x <?php echo $urls->urlatext;?>">
        <?php echo ($urls->urla)? "</a>":"</span>";?>
      </li>
      <li class="icon">
        <?php echo ($urls->urlb)? '<a href="'.$urls->urlb.'"':'<span';?>
        class="fa fa-3x <?php echo $urls->urlbtext;?>">
        <?php echo ($urls->urlb)? "</a>":"</span>";?>
      </li>
      <li class="icon">
        <?php echo ($urls->urlc)? '<a href="'.$urls->urlc.'"':'<span';?>
        class="fa fa-3x <?php echo $urls->urlctext;?>">
        <?php echo ($urls->urlc)? "</a>":"</span>";?>
      </li>
    </ul>
    <?php
    if($images->image_intro):?>
      <div class="avatar" style="background-image:url('<?php echo $images->image_intro;?>');'"></div>
    <?php endif;?>
  </div>
  <div class="col-xs-12 col-sm-8 desc">
    <?php echo $this->item->introtext;?>
      <?php	if($this->item->readmore):?>
          <button data-toggle="modal" data-target="#course-<?php echo $this->item->id;?>" class="evidence">
          <?php $attribs = json_decode($this->item->attribs); ?>
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
      <!-- Modal -->
    <div class="modal fade" id="course-<?php echo $this->item->id;?>" tabindex="-1" role="dialog" aria-labelledby="course-<?php echo $this->item->id;?>-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="course-<?php echo $this->item->id;?>-label">
                <?php echo $this->item->title;?>
              </h4>
          </div>
          <div class="modal-body">
            <?php if($images->image_fulltext):?>
              <div class="cover" style="background-image:url('<?php echo $images->image_fulltext;?>');"></div>
            <?php endif;?>
            <?php echo $this->item->fulltext;?>
            <div class="modal-footer">
              <button type="button" class="evidence" data-dismiss="modal" aria-label="Close">Torna indietro</button>
            </div>
          </div>
      </div>
      </div>
    </div>
  <?php else:?>
    </div>
  <?php endif;	?>
</div>
<?php echo $this->item->event->afterDisplayContent; ?>
