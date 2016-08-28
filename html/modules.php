<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	$moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'));
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'));

	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="well ' . htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}
function modChrome_navmenu($module, &$params, &$attribs){
	echo "TEST FES";
	$client=new JWebClient();
	if($client->mobile):?>
	<a class="logo hidden-sm" href="<?php echo $attribs["baseurl"];?>" style="background-image:url('<?php echo $attribs["logo"];?>'')"></a>
	<nav class="navbar navbar-default navbar-fixed-top <?php echo $attribs["typemenu"];?>">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#<?php echo $attribs["idmenu"];?>" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $attribs["baseurl"];?>" style="background-image:url('<?php echo $attribs["logomobile"];?>')"></a>
			</div>
			<div class="collapse navbar-collapse" id="<?php echo $attribs["idmenu"];?>">
		<?php else:?>
	<div class="pre-navigator container-fluid">
		<div class="header row">
			<div class="col-xs-1">

			</div>
			<div class="col-xs-10 logo">
				<a href="<?php echo $attribs["baseurl"];?>" style="background-image:url('<?php echo $attribs["logo"];?>');"></a>
			</div>
			<div class="col-xs-1">

			</div>
		</div>
		<nav class="navbar">
			<div class="container-fluid">
			<div id="<?php echo $attribs["idmenu"];?>">
	<?php	endif;
	if ($module->content)
		echo $module->content;
 	if($client->mobile):?>
		</div>
	</div>
	</nav>
<?php	else:?>
</nav>
</div>
	<?php endif;
}

function modChrome_bottombar($module, &$params, &$attribs){
	$client=new JWebClient();
	if($client->mobile):?>
	<div class="bottom">
		<?php echo $module->content;?>
	</div>
<?php endif;
}
function modChrome_blockfooter($module, &$params, &$attribs){
	?>
		<?php echo $module->content;?>
	<?php
}
