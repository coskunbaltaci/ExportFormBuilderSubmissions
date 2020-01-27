<?php
namespace Craft;

class ExportFormBuilderSubmissionsPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Export Form Builder Entries');
	}

	function getVersion()
	{
		return '0.1.0';
	}

	function getDeveloper()
	{
		return 'Coskun Baltacı';
	}

	function getDeveloperUrl()
	{
		return 'https://github.com/coskunbaltaci';
	}

	function hasCpSection()
	{
		return true;
	}

	public function registerCpRoutes()
	{
	    return array(
	      'exportformbuildersubmissions' => array('action' => 'exportFormBuilderSubmissions_Entry/allEntries'),
	    );
	}
}