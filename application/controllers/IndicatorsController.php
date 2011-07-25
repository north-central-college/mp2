<?php
class IndicatorsController extends Zend_Controller_Action
{
 	
	protected $userService;
	protected $userID = 2;
		
	
	
	public function preDispatch()
	{
		$this->studentService = new App_StudentService(); 	
		
    	$sessionNamespace = new Zend_Session_Namespace();
   		$this->view->userInfo = array('userID' => $sessionNamespace->userID,
   									  'role' => $sessionNamespace->userRole,
  	 								  'last_name' => $sessionNamespace->userLName, 
        							  'first_name' => $sessionNamespace->userFName,
                                );
		
	}
	
    public function init()
    {
        /* Initialize action controller here */
    	
    }

    public function indexAction()
    {
    	$this->view->standard_id = $this->_getParam('standard');
    	
    	$this->view->ind = $this->studentService->GetAllIndicatorsArtifactsbyStandard(
    		$this->view->userInfo['userID'], $this->view->standard_id);
var_dump($this->view->ind);    		
var_dump($this->view->standard_id);
var_dump($this->view->userInfo['userID']);


		//$this->view->ind = $this->studentService->GetIndicatorsbyStandard($this->view->standard_id);
	
		//$this->view->indart = $this->studentService->GetArtifactsbyIndicator(
    	//	$this->view->userInfo['userID'], $this->view->ind['indicator_id']);
    	    	  	
    	
    }
}

