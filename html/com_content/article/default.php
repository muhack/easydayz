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
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$info    = $params->get('info_block_position', 0);
?>

<main class="article">
    <div class="cover" style="background-image:url('<?php echo $images->image_fulltext;?>')">
        <div class="headline">
            <div class="transition"></div>
            <div class="text">
                <h1><?php echo $this->item->title; ?></h1>
            </div>
        </div>
    </div>
    <div class="details">
        <ul class="list list-inline list-detail">
            <li>
                <span class="fa fa-calendar">&nbsp;</span><?php echo JHtml::_('date', $displayData['item']->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
            </li>
            <li>
                <span class="fa fa-user">&nbsp;</span><?php echo $this->item->created_by_alias;?>
            </li>
            <li class="tags-list">
                <span class="fa fa-tags">&nbsp;</span>
                <?php foreach($this->item->tags->itemTags as $tag):?>
                    &nbsp;<span class="fa fa-tag"></span>&nbsp;<?php echo $tag->title;?>
                <?php endforeach;?>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="text-intro">
            <?php echo $this->item->introtext;?>
        </div>
        <div class="text-full">
            <?php print_r($this->item->fulltext);?>
        </div>
    </div>
    <?php echo $this->item->event->afterDisplayContent; ?>
</main>