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

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);
//$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/equalheight.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

//Add Stylesheets
//JHtml::_('bootstrap.loadCss',false);
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif; ?>
	<?php // Template color ?>
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site">
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 advbar">
			<jdoc:include type="modules" name="advbar" style="none" />
		</div>
	</div>
</div>
<header class="container">
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-12">
			<a href="#" class="logo"></a>
		</div>
	</div>
</header>
<jdoc:include type="modules" name="menu" style="Navigator" />
<jdoc:include type="message" />
<jdoc:include type="component" />
</body>
	<jdoc:include type="modules" name="debug" style="none" />
	<jdoc:include type="modules" name="hidden" style="none" />
	<footer class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<jdoc:include type="modules" name="footer-1"/>
			</div>
			<div class="col-xs-12 col-sm-4">
				<jdoc:include type="modules" name="footer-2"/>
			</div>
			<div class="col-xs-12 col-sm-4">
				<jdoc:include type="modules" name="footer-3"/>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 credits">
					<jdoc:include type="modules" name="credits"/>
			</div>
		</div>
	</footer>
</html>
