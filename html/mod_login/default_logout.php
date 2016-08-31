<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
?>
<nav class="menu-user logout">
    <ul class="nav navbar-nav">
            <li>
                <form action="<?php echo JRoute::_(htmlspecialchars(JUri::getInstance()->toString(), ENT_COMPAT, 'UTF-8'), true, $params->get('usesecure')); ?>" method="post" id="login-form" class="logout-button">
                        <button type="submit" name="Submit" class="submit"><?php echo JText::_('JLOGOUT'); ?></button>
                        <input type="hidden" name="option" value="com_users" />
                        <input type="hidden" name="task" value="user.logout" />
                        <input type="hidden" name="return" value="<?php echo $return; ?>" />
                        <?php echo JHtml::_('form.token'); ?>
                </form>
            </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle menu-list" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <span class="fa fa-user"></span> <?php if ($params->get('name') == 0) : ?>
                    <?php echo JText::sprintf(htmlspecialchars($user->get('name'), ENT_COMPAT, 'UTF-8')); ?>
                <?php else : ?>
                    <?php echo JText::sprintf(htmlspecialchars($user->get('username'), ENT_COMPAT, 'UTF-8')); ?>
                <?php endif; ?>
            </a>
            <?php /*<ul class="dropdown-menu">
                <li>
                </li>
            </ul>
            */
            ?>
        </li>
    </ul>
</nav>