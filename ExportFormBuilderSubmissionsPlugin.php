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
		return '0.1.1';
	}

	function getDeveloper()
	{
		return 'Coskun Baltaci';
	}

	function getDeveloperUrl()
	{
		return 'https://github.com/coskunbaltaci';
	}

	function getDocumentationUrl()
  	{
    	return 'https://github.com/coskunbaltaci/ExportFormBuilderSubmissions';
  	}
  	
  	function getDescription()
	{
	    return Craft::t('Export Form Builder Submissions');
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