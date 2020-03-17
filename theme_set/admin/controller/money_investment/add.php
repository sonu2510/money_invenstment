<?php
include("mode_setting.php");

//Start : bradcums
$bradcums = array();
$bradcums[] = array(
	'text' 	=> 'Dashboard',
	'href' 	=> $obj_general->link('dashboard', '', '',1),
	'icon' 	=> 'fa-home',
	'class'	=> '',
);

$bradcums[] = array(
	'text' 	=> $display_name.' List',
	'href' 	=> $obj_general->link($rout, '', '',1),
	'icon' 	=> 'fa-list',
	'class'	=> '',
);

$bradcums[] = array(
	'text' 	=> $display_name.' Detail',
	'href' 	=> '',
	'icon' 	=> 'fa-edit',
	'class'	=> 'active',
);
//Close : bradcums

//Start : edit

$added_money_id = '';

$edit = '';
if(isset($_GET['added_money_id']) && !empty($_GET['added_money_id'])){
	$added_money_id=base64_decode($_GET['added_money_id']);
	if(!$obj_general->hasPermission('edit',$menuId)){
		$display_status = false;
	}else{
		$added_money_id= base64_decode($_GET['added_money_id']);
		$money = $obj_money->getMoney($added_money_id);

	
		$edit = 1;
	}
	
}else{
	if(!$obj_general->hasPermission('add',$menuId)){
		$display_status = false;
	}
}

//Close : edit


if($display_status){

//insert
if(isset($_POST['btn_save'])){
	$post = post($_POST);
	//printr($post);die;
	
		$insert_id = $obj_money->addMoney($post);		
		$_SESSION['success'] = ADD;
		page_redirect($obj_general->link($rout, '', '',1));

}
//$money_id=0;
//edit
$money_id=0;
if(isset($_POST['btn_update']) && $edit){
	$post = post($_POST);
		$money_id = $money['added_money_id'];	
		$obj_money->updatemoney($money_id,$post);	
		$_SESSION['success'] = UPDATE;
		page_redirect($obj_general->link($rout, 'filter_edit='.$_GET['filter_edit'], '',1));

}	
?>

<section id="main-content">
  <section class="main padder">
    <div class="row">
      <h4><i class="fa fa-list"></i> Add Money </h4>
    </div>
    <div class="row">
      <div class="col-lg-12">
         <?php include("common/breadcrumb.php");?>  
        </div>   
      <div class="col-sm-12">
          <div class="card">  
        <section class="main-content">

          <div class="card-title">
                <h4><?php echo $display_name;?>  </h4>
                                    
             </div>
         	<br>
         
            <form class="form-horizontal" method="post" name="form" id="form" enctype="multipart/form-data">        
            
            		<div class="form-group has-success">
                         <div class="row">
                                <label class="col-sm-2 control-label">Member Name</label>
                                     <div class="col-sm-6">
                                              <input type="text" name="member_name" value="<?php echo isset($money['member_name'])?$money['member_name']:'';?>" class="form-control validate[required]" />
                                    </div>
                         </div>
                  </div>  
            		<div class="form-group has-success">
                         <div class="row">
                                <label class="col-sm-2 control-label">Date</label>
                                     <div class="col-sm-3">
                                              <input type="date" name="date" value="<?php echo isset($money['date'])?$money['date']:'';?>" class="form-control validate[required]">
                                    </div>

                                
                          </div>
                 </div> 
                  <div class="form-group has-success">
                         <div class="row">
                              <label class="col-sm-2 control-label">Amount</label>
                                     <div class="col-sm-3">
                                              <input type="text" name="amount" value="<?php echo isset($money['amount'])?$money['amount']:'';?>" class="form-control validate[required,custom[email]]">
                                    </div>   
                          </div>
                  </div>    
                  <div class="form-group has-success">
                         <div class="row">
                              <label class="col-sm-2 control-label">Remarks</label>
                                     <div class="col-sm-3">
                                             <textarea name="remarks" class="form-control "> <?php echo isset($money['remarks'])?$money['remarks']:'';?></textarea>
                                    </div>   
                          </div>
                  </div> 
                 
				<div class="row">
                <div class="col-md-8 col-md-offset-3">
                	<center>                <?php if($edit){?>
                  	<button type="submit" name="btn_update" id="btn_update" class="btn btn-success btn-rounded m-b-10 m-l-5">Update </button>
                <?php } else { ?>
                	<button type="submit" name="btn_save" id="btn_save" class="btn btn-success btn-rounded m-b-10 m-l-5">Save </button>	
                <?php } ?>  
                  <a class="btn btn-default btn-rounded m-b-10 m-l-5" href="<?php echo $obj_general->link($rout, '', '',1);?>">Cancel</a>
               </center>

                </div>
                </div>
              
               </form>
          </div>
        </section>
        
      </div>
    </div>
  </section>
</section>

<link rel="stylesheet" href="<?php echo HTTP_SERVER;?>js/validation/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo HTTP_SERVER;?>js/validation/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php echo HTTP_SERVER;?>js/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php echo HTTP_SERVER;?>ckeditor3/ckeditor.js"></script>
<style type="text/css">

}
</style>

<script>

   
	function checkUser(name){
		var orgname = '<?php echo isset($money['user_name'])?$money['user_name']:'';?>';
		if(name.length > 0 && orgname != name){
			$(".uniqusername").remove();
			var status_url = getUrl("<?php echo $obj_general->ajaxLink($rout, '&mod=ajax&fun=UserNameAlreadyExsist', '',1);?>");
			$("#loading").show();
			$.ajax({
				url : status_url,
				type :'post',
				data :{name:name},
				success: function(json) {
					if(json > 0){
						$("#user_name").val('');
						$("#user_name").after('<span class="required uniqusername">Username already exists!</span>');
						$("#loading").hide();
						return false;
					}else{
						$("#loading").hide();
						$(".uniqusername").remove();
						return true;
					}
				}
			});
		}else{
			$("#loading").hide();
			$(".uniqusername").remove();
			return true;
		}
	}


</script> 
<!-- Close : validation script -->

<?php
} else { 
	include_once(DIR_ADMIN.'access_denied.php');
}
?>
