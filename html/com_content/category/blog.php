<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>
<main class="blog"  itemscope itemtype="https://schema.org/Blog">
    <?php foreach ($this->lead_items as &$item) : ?>
        <div class="leading" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
            <?php
            $this->item = & $item;
            echo $this->loadTemplate('item');
            ?>
        </div>
    <?php endforeach; ?>
    <div class="equalheight">
    <?php foreach ($this->intro_items as $key => &$item) : ?>
        <div class="cols-xs-12 col-sm-<?php echo (int) $this->columns; ?>">
            <div class="item" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                <?php
                    $this->item = & $item;
                    echo $this->loadTemplate('item');
                ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <?php if (!empty($this->link_items)) : ?>
        <?php echo $this->loadTemplate('links'); ?>
    <?php endif;?>
</main>