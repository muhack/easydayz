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
	<?php if($this->countModules(advbar)):?>
<div class="container-fluid advbar">
	<div class="row">
		<div class="col-xs-12">
			<jdoc:include type="modules" name="advbar" style="none" />
		</div>
	</div>
</div>
<?php endif;?>
<header class="container">
	<div class="row">
		<div class="col-xs-12">
			<a href="<?php echo $this->baseurl;?>" class="logo" style="background-image:url('<?php echo $this->params->get('logoFile');?>')"></a>
		</div>
	</div>
</header>
<jdoc:include type="modules" name="menu" style="Navigator" />
<jdoc:include type="message" />
<jdoc:include type="component" />
<?php if ($this->params->get('showmap')) : ?>
<div class="container-fluid show-google-maps">
<?php if($this->countModules('map-images-up')):?>
    <div class="row">
        <jdoc:include type="modules" name="map-images-up" style="CoverColumns"/>
    </div>
<?php endif;?>
    <div class="row">
        <div class="col-xs-4 address-text">
				<a class="fa fa-map-marker fa-3x" target="_blank" href="https://www.google.it/maps/place/<?php echo $this->params->get('street').'+'.$this->params->get('civicnumber').'+'.$this->params->get('city').'+'.$this->params->get('province').'+'.$this->params->get('region').'+'.$this->params->get('nation');?>"></a>
        <span><?php echo $this->params->get('street').' '.$this->params->get('civicnumber').', '.$this->params->get('city').'<br>'.$this->params->get('province').', '.$this->params->get('region').', '.$this->params->get('nation');?></span>
        </div>
        <div class="col-xs-12 google-maps">
        </div>
    </div>
<?php if($this->countModules('map-images-down')):?>
    <div class="row">
        <jdoc:include type="modules" name="map-images-down" style="CoverColumns"/>
    </div>
<?php endif;?>
</div>
<?php endif;?>
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
</body>
<jdoc:include type="modules" name="debug" style="none" />
<jdoc:include type="modules" name="hidden" style="none" />
<?php if ($this->params->get('showmap')) : ?>
<script type="text/javascript" src="<?php echo $this->baseurl . '/templates/'.$this->template.'/js/gmap3.min.js';?>"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript">
//<![CDATA[
jQuery(window).load(function() {
                    jQuery(".google-maps").gmap3({
                                                 marker:{
                                                 address:"<?php echo $this->params->get('civicnumber').','.$this->params->get('street').','.$this->params->get('city').','.$this->params->get('province').','.$this->params->get('region').','.$this->params->get('nation');?>",
                                                 options:{
                                                    icon: "<?php echo $this->baseurl . '/templates/' . $this->template.'/img/marker.png';?>"
                                                    }
                                                 },
                                                 map:{
                                                    options:{
                                                        zoom: 15,
                                                        scrollwheel:false,
                                                        mapTypeControl: false,
                                                        scaleControl: false,
                                                        zoomControl: false,
                                                        disableDefaultUI: true,
                                                        draggable: false
                                                    }
                                                 }
                                                 });
                    });
//]]>
</script>

<?php endif;?>
</html>
