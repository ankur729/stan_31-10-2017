	
			
				/* 1=>array('label'=>'Manage Students','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/student/list'),'current'=>'profile','msort'=>2,'child'=>array()),





				*/
				12=>array('label'=>'Manage Profile','icon_label'=>'<i class="fa fa-users"></i>','link'=>url('admin/profile/edit'),'current'=>'customers','msort'=>3,'child'=>array()),
				
				3=>array('label'=>'Role Management','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/inventory'),'current'=>'inventory','msort'=>4,
							'child'=>array(
								0=>array('label'=>'Add Role','link'=>url('admin/access/create')),
								1=>array('label'=>'Edit Role','link'=>url('admin/access/list'))
							)),
				/* 4=>array('label'=>'Manage Facility','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/facility/list'),'current'=>'customers','msort'=>5,'child'=>array(
						
						0=>array('label'=>'Add Category','link'=>url('admin/category/list')),
								1=>array('label'=>'Add Facility','link'=>url('admin/facility/list'))
							
							)), */
		
				5=>array('label'=>'Admin User Management','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/user/list'),'current'=>'customers','msort'=>6,'child'=>array()),

				6=>array('label'=>'Manage Complaints','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/complaint'),'current'=>'adminuser','msort'=>7,'child'=>array(
								0=>array('label'=>'Category','link'=>url('admin/complaint_category/list')),
								1=>array('label'=>'Sub Category','link'=>url('admin/complaint_subcategory/list')),
								2=>array('label'=>'Complaint Box','link'=>url('admin/complaint/list'))
					)),
				/*7=>array('label'=>'Manage Invoice','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/stock'),'current'=>'stock','msort'=>8,'child'=>array()),*/
				/* 7=>array('label'=>'Manage Hostel','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/ledger'),'current'=>'ledger','msort'=>8,
					'child'=>array(
								0=>array('label'=>'Room Mgmt.','link'=>url('admin/room/list')),
								1=>array('label'=>'Hostel Mgmt.','link'=>url('admin/hostel/list'))
							)), */
				/*9=>array('label'=>'Manage Event','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/accessmanage'),'current'=>'access','msort'=>10,'child'=>array()),*/
				
				8=>array('label'=>'Site Settings','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/adminuser'),'current'=>'adminuser','msort'=>9,
					'child'=>array(
								0=>array('label'=>'General Setting','link'=>url('admin/setting/general')),
								1=>array('label'=>'Content Setting','link'=>url('admin/information/list'))
							)
					),
			/*	12=>array('label'=>'Experience','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/adminuser'),'current'=>'adminuser','msort'=>13,
					'child'=>array(
								0=>array('label'=>'Category','link'=>url('admin/experience/category/list')),
								1=>array('label'=>'Image','link'=>url('admin/experience/image/list'))
							)
					),*/
				/*13=>array('label'=>'Gallery','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/gallery/images/create'),'current'=>'adminuser','msort'=>14,'child'=>array()),*/
				9=>array('label'=>'Manage Parents','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/guardian/list'),'current'=>'adminuser','msort'=>10,'child'=>array()),
				10=>array('label'=>'Vox Populi','icon_label'=>'<i class="fa fa-user"></i>','link'=>url('admin/communicate'),'current'=>'adminuser','msort'=>11,'child'=>array(
								0=>array('label'=>'Vox Populi','link'=>url('admin/communicate/list')),
								1=>array('label'=>'Category','link'=>url('admin/communicate_category/list')),
								2=>array('label'=>'Sub Category','link'=>url('admin/communicate_subcategory/list'))
					)),
				11=>array('label'=>'Payment Module','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/payment'),'current'=>'adminuser','msort'=>12,'child'=>array(
								0=>array('label'=>'Manage Taxes','link'=>url('admin/taxes/list')),
								1=>array('label'=>'Manage Payment','link'=>url('admin/payment/list')),
								/*2=>array('label'=>'Sub Category','link'=>url('admin/payment/list'))*/
					)),
				12=>array('label'=>'Events','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/event/list'),'current'=>'adminuser','msort'=>13,'child'=>array()),
				
				13=>array('label'=>'Manage Requests','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/request'),'current'=>'adminuser','msort'=>14,'child'=>array(
								0=>array('label'=>'View Requests','link'=>url('admin/request/list')),
								1=>array('label'=>'Manage Request Types','link'=>url('admin/request_type/list'))
									)),
				14=>array('label'=>'Food Management','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/menu'),'current'=>'adminuser','msort'=>15,'child'=>array(
								0=>array('label'=>'Manage Food Menu','link'=>url('admin/foodmenu/menulist')),
								1=>array('label'=>'Manage Food Items','link'=>url('admin/menu/list')),
								2=>array('label'=>'Manage Food Category','link'=>url('admin/f_cat/list'))
									)),
				15=>array('label'=>'Feedback Report','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/feedback/list'),'current'=>'adminuser','msort'=>16,'child'=>array()),
							
				16=>array('label'=>'Enquiries','icon_label'=>'<i class="fa fa-dashboard"></i>','link'=>url('admin/menu'),'current'=>'adminuser','msort'=>18,'child'=>array(
								0=>array('label'=>'Contact Us','link'=>url('admin/contactus/list')),
								1=>array('label'=>'Book Online','link'=>url('admin/bookonline/list')),
								2=>array('label'=>'	Arrange Viewing','link'=>url('admin/arrangeview/list'))
									)),