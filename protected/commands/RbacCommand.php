<?php
class RbacCommand extends CConsoleCommand
{
   
    private $_authManager;
 
    
	public function getHelp()
	{
		
		$description = "DESCRIPTION\n";
		$description .= '    '."This command generates an initial RBAC authorization hierarchy.\n";
		return parent::getHelp() . $description;
	}

	
	/**
	 * The default action - create the RBAC structure.
	 */
	public function actionIndex()
	{
		 
		$this->ensureAuthManagerDefined();
		
		//provide the oportunity for the use to abort the request
		$message = "This command will create three roles: Owner, Member, and Reader\n";
		$message .= " and the following permissions:\n";
		$message .= "create, read, update and delete user\n";
		$message .= "create, read, update and delete project\n";
		$message .= "create, read, update and delete issue\n";
		$message .= "Would you like to continue?";
	    
	    //check the input from the user and continue if 
		//they indicated yes to the above question
	    if($this->confirm($message)) 
		{
		     //first we need to remove all operations, 
			 //roles, child relationship and assignments
			 $this->_authManager->clearAll();

			 //create the lowest level operations for users
			 $this->_authManager->createOperation(
				"createUser",
				"create a new user"); 
			 $this->_authManager->createOperation(
				"readUser",
				"read user profile information"); 
			 $this->_authManager->createOperation(
				"updateUser",
				"update a users in-formation"); 
			 $this->_authManager->createOperation(
				"deleteUser",
				"remove a user from a project"); 

			 //create the lowest level operations for projects
			 $this->_authManager->createOperation(
				"createPlace",
				"create a new place"); 
			 $this->_authManager->createOperation(
				"readPlace",
				"read place information"); 
	 		 $this->_authManager->createOperation(
				"updatePlace",
				"update place information"); 
			 $this->_authManager->createOperation(
				"deletePlace",
				"delete a place"); 

			 //create the lowest level operations for projects
			 $this->_authManager->createOperation(
			   "createEvent",
			   "create a new Event");
			 $this->_authManager->createOperation(
			   "readEvent",
			   "read event information");
			 $this->_authManager->createOperation(
			   "updateEvent",
			   "update event information");
			 $this->_authManager->createOperation(
			   "deleteEvent",
			   "delete a event");

			 //create the lowest level operations for projects
			 $this->_authManager->createOperation(
			   "createNotice",
			   "create a new Notice");
			 $this->_authManager->createOperation(
			   "readNotice",
			   "read Notice information");
			 $this->_authManager->createOperation(
			   "updateNotice",
			   "update Notice information");
			 $this->_authManager->createOperation(
			   "deleteNotice",
			   "delete a Notice");
			 
			 
			 //create the lowest level operations for projects
			 $this->_authManager->createOperation(
			   "createReservation",
			   "create a new Reservation");
			 $this->_authManager->createOperation(
			   "readReservation",
			   "read Reservation information");
			 $this->_authManager->createOperation(
			   "updateReservation",
			   "update Reservation information");
			 $this->_authManager->createOperation(
			   "deleteReservation",
			   "delete a Reservation");	 
			 
			 //create the lowest level operations for issues
			 $this->_authManager->createOperation(
				"createRoom",
				"create a new room"); 
			 $this->_authManager->createOperation(
				"readRoom",
				"read room information"); 
			 $this->_authManager->createOperation(
				"updateRoom",
				"update room information"); 
			 $this->_authManager->createOperation(
				"deleteRoom",
				"delete an room from a project");     

			 
			 //create the normal role and add the appropriate 
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("normal"); 
			 $role->addChild("readUser");
			 $role->addChild("readReservation");
			 $role->addChild("readRoom");
			 $role->addChild("readNotice");
			 $role->addChild("readPlace"); 
			 $role->addChild("readEvent"); 
			 $role->addChild("createReservation");
			 $role->addChild("createEvent");
			 
			 
			 //create the reader role and add the appropriate
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("roommanager");
			 $role->addChild("normal");
			 $role->addChild("createRoom");
			 $role->addChild("updateRoom");
			 $role->addChild("deleteRoom");
			 $role->addChild("createNotice");
			 $role->addChild("updateNotice");
			 $role->addChild("deleteNotice");
			 
			 //create the reader role and add the appropriate
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("eventmanager");
			 $role->addChild("normal");
			 $role->addChild("createEvent");
			 $role->addChild("updateEvent");
			 $role->addChild("deleteEvent");
			 

			 //create the reader role and add the appropriate
			 //permissions as children to this role
			 $role=$this->_authManager->createRole("placemanager");
			 $role->addChild("roommanager");
			 $role->addChild("createPlace");
			 $role->addChild("updatePlace");
			 $role->addChild("deletePlace");
			 
			 
			 
			 //create the owner role, and add the appropriate permissions, 
			 //as well as both the reader and member roles as children
			 $role=$this->_authManager->createRole("admin"); 
			 $role->addChild("normal"); 
			 $role->addChild("roommanager");    
			 $role->addChild("eventmanager"); 
			 $role->addChild("placemanager"); 
			 
		     //provide a message indicating success
		     echo "Authorization hierarchy successfully generated.\n";
        }
 		else
			echo "Operation cancelled.\n";
    }

	public function actionDelete()
	{
		$this->ensureAuthManagerDefined();
		$message = "This command will clear all RBAC definitions.\n";
		$message .= "Would you like to continue?";
	    //check the input from the user and continue if they indicated 
	    //yes to the above question
	    if($this->confirm($message)) 
	    {
			$this->_authManager->clearAll();
			echo "Authorization hierarchy removed.\n";
		}
		else
			echo "Delete operation cancelled.\n";
			
	}
	
	protected function ensureAuthManagerDefined()
	{
		//ensure that an authManager is defined as this is mandatory for creating an auth heirarchy
		if(($this->_authManager=Yii::app()->authManager)===null)
		{
		    $message = "Error: an authorization manager, named 'authManager' must be con-figured to use this command.";
			$this->usageError($message);
		}
	}
}