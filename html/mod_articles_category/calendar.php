<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="calendar">
    <p class="h1 text-center">
        <?php echo $module->title;?>
    </p>
    <div class="list-events">
    <?php foreach($list as $item):?>
        <section class="event">
            <div class="first-row equalheight">
                <p class="time">
                    <span class="day"><?php echo JHtml::_('date', $item->publish_up, JText::_('d')); ?></span>/<span class="month"><?php echo JHtml::_('date', $item->publish_up, JText::_('n')); ?></span>
                </p>
                <div>
                    <p class="title">
                        <?php echo $item->title; ?>
                    </p>
                    <p class="author"><span class="fa fa-user"></span>
                        <?php echo $item->created_by_alias; ?>
                    </p>
                </div>
            </div>
            <ul class="cta list list-inline">
                <?php $urls=json_decode($item->urls);?>
                <?php if(empty($urls->urla)):?>
                    <li><a class="fa fa-<?php echo $urls->urlatext;?>" href="<?php echo $urls->urla;?>" target="<?php echo $urls->targeta;?>"></a></li>
                <?php endif;?>
                <?php if(empty($urls->urlb)):?>
                    <li><a class="fa fa-<?php echo $urls->urlbtext;?>" href="<?php echo $urls->urlb;?>" target="<?php echo $urls->targetb;?>"></a></li>
                <?php endif;?>
                <?php if(empty($urls->urlc)):?>
                    <li><a class="fa fa-<?php echo $urls->urlctext;?>" href="<?php echo $urls->urlc;?>" target="<?php echo $urls->targetc;?>"></a></li>
                <?php endif;?>
                <li><a class="fa fa-info" href="<?php echo $item->link; ?>"></a></li>
            </ul>
        </section>
    <?php endforeach;?>
    </div>
</div>
