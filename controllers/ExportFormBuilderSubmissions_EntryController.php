<?php
namespace Craft;

class ExportFormBuilderSubmissions_EntryController extends BaseController
{

  	public function actionAllEntries()
  	{
    	$formItems = fb()->forms->getAllForms();
    	$variables['title']       = 'Export Form Builder 2 Submissions';
    	$variables['formItems']   = $formItems;
    	return $this->renderTemplate('exportformbuildersubmissions/index', $variables);
  	}

  	public function actionGetSubmissions($formId)
  	{
    	$entries = fb()->entries->getAllEntriesFromFormID($formId);
    	if( count($entries) > 0 ) {
    		$formName = fb()->forms->getFormById($formId);
	    	$variables['title'] = 'Get All Entries';
	    	$fileName = $formName . '-' . date('ymdhsi') . '.csv';
	    	$formSubmisions = array();
	    	foreach ($entries as $entry) {
	    		$formSubmisions[] = json_decode($entry['submission'], true);
	    	}
	    	$this->createCsv($formSubmisions, $fileName);
	    	return true;
    	}
    	return $this->redirect('exportformbuildersubmissions');
  	}
  	private function createCsv( $array, $filename = "export.csv" )
	{
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
	    header( 'Content-Disposition: attachment; filename="' . $filename . '";' );
	    ob_end_clean();
	    $handle = fopen( 'php://output', 'w' );
	    fputcsv( $handle, array_keys( $array['0'] ) );
	    foreach ( $array as $value ) {
	        fputcsv( $handle, $value, ',' );
	    }
	    fclose( $handle );
		exit();
	}


}
