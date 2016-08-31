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
$client =new JWebClient();
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
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');
endif;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <jdoc:include type="head" />
        <?php if ($this->params->get('googleFont')) : ?>
            <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
            <style type="text/css">
                h1,h2,h3,h4,h5,h6,.site-title{
                    font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
                }
            </style>
        <?php endif; ?>
        <!--[if lt IE 9]>
        <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
        <![endif]-->
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
        <div class="container navigator">
            <div class="row">
                <div class="col-xs-12">
                    <jdoc:include type="modules" name="position-2" />
                </div>
            </div>
            <div class="row content equalheight">
                <div class="col-xs-12 col-sm-8">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="position-3" />
                </div>
                <div class="col-xs-12 col-sm-4 sidebar">
                    <jdoc:include type="modules" name="position-4" />
                </div>
            </div>
        </div>
        <jdoc:include type="modules" name="position-5" />
        <footer>
            <div class="container">
                <?php if($this->countModules('position-6') || $this->countModules('position-7')):?>
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
                <?php echo $params->get('street');?>, <?php echo $params->get('civicnumber');?> • <?php echo $params->get('city');?>, <?php echo $params->get('province');?> • <?php echo $params->get('state');?> • <?php echo $params->get('nation');?>
            </p>
        </div>
    </body>
</html>
