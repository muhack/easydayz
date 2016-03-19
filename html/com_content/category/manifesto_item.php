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
?>

<div class="background row scrollbackground" style="background-image:url('<?php echo $images->image_intro;?>');">
  <div class="col-xs-12 col-sm-9 col-md-7 col-lg-5">
    <div class="preview">
      <div class="h1 title">
        <?php echo $this->item->title;?>
      </div>
      <div class="subtitle">
        <?php echo $this->item->introtext;?>
      </div>
      <div class="text">
        <?php echo $this->item->fulltext;?>
      </div>
    </div>
  </div>
  <div class="hidden-xs col-sm-3 col-md-5 col-lg-7">

  </div>
</div>
<?php echo $this->item->event->afterDisplayContent; ?>
