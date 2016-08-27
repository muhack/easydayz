<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;
$client=new JApplicationWebClient();

$params = $app->getTemplate(true)->params;

$sitename = $app->get('sitename');


JHtml::_('bootstrap.framework');
unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');


$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.css');
if($client->mobile):
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/tmpl_mobile.css');
else:
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/tmpl_desktop.css');
endif;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>

    </head>
    <body>
        <div class="topbar container-fluid">
            <div class="row">
                <div class="col-hidden-xs col-sm-8">
                    <jdoc:include type="modules" name="position-0" />
                </div>
                <div class="col-xs-12 col-sm-4">
                    <jdoc:include type="modules" name="position-1" />
                </div>
            </div>
        </div>
        <jdoc:include type="modules" name="position-2" baseurl="<?php echo $this->baseurl;?>" name="menu" style="navmenu" typemenu="navigation" idmenu="MenuNav" logo="<?php echo $params->get('logoFile');?>" logomobile="<?php echo $params->get('logoMobileFile');?>" />
        <div class="row content">
            <div class="col-xs-12 col-sm-8">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                <jdoc:include type="modules" name="position-3" />
            </div>
            <div class="col-xs-12 col-sm-4 sidebar">
                <jdoc:include type="modules" name="position-4" />
            </div>
        </div>
        <jdoc:include type="modules" name="position-5" />
        <footer>
            <div class="container">
                <?php if(countModules($this->countModules('position-6')) || countModules($this->countModules('position-7'))):?>
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <jdoc:include type="modules" name="position-6" />
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <jdoc:include type="modules" name="position-7" />
                    </div>
                    <div class="col-xs-12 col-sm-6">

                    </div>
                </div>
                <?php endif;?>
            </div>
        </footer>
        <div class="bottombar">
            <p class="text-center">
                <?php echo $params->get('address');?>, <?php echo $params->get('civicnumber');?> • <?php echo $params->get('city');?>, <?php echo $params->get('province');?> • <?php echo $params->get('state');?> • <?php echo $params->get('nation');?>
            </p>
        </div>
    </body>
</html>
