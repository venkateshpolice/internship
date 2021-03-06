<!--
| CHAT HEADER SECTION
-->
<h2 class="chat-header">
	Chat Window
    <!--<i class="fa fa-comment"></i> 
    <span class="btn btn-xs btn-<?php echo $cur_user->online== 1 ? 'success' : 'danger'; ?>" id="current_status"><?php echo $cur_user->online== 1 ? 'Online' : 'Offline'; ?></span>
-->
    <a href="javascript:;" class="chat-form-close pull-right"><i class="fa fa-remove"></i></a>
   <!-- <span class="dropdown user-dropdown">
    <a href="javascript:;" class="pull-right chat-config" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-cog"></i>
    </a>
    <ul class="dropdown-menu">
        <li class="divider"></li>
        <li>
            <a href="javascript: void(0);" id="edit-profile">
              <span class="pull-left">Profile</span>
              <span class="fa fa-user pull-right"></span>
              <span class="clearfix"></span>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="javascript: void(0);" id="change-password">
              <span class="pull-left">Change Password</span>
              <span class="fa fa-lock pull-right"></span>
              <span class="clearfix"></span>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="javascript: void(0);">
              <div class="btn-group btn-toggle status-btn-group"> 
                <button class="btn btn-xs btn-<?php echo $cur_user->online== 1 ? 'success' : 'default'; ?>">Online</button>
                <button class="btn btn-xs btn-<?php echo $cur_user->online== 0 ? 'success' : 'default'; ?>">Offline</button>
              </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="javascript: void(0);" id="logout">
              <span class="pull-left">Sign Out</span>
              <span class="fa fa-sign-out pull-right"></span>
              <span class="clearfix"></span>
            </a>
        </li>
    </ul>
    </span>-->
</h2>
<!--
| CHAT CONTACTS LIST SECTION
-->
<div class="chat-inner" id="chat-inner" style="position:relative;">
<div class="chat-group">
	<!-- admin users-->

  <div class="">
    <div class="chat-heading" >    
        <span class="pull-left">Admin Users</span>
        <span class="pull-right icon clickable" id="flip"><i class="fa fa-minus" aria-hidden="true"></i></span>
    </div>        
   
 <div class="admin-users " id="panel">
     <?php foreach ($adminuser as $adminusers) {  if($adminusers->id != $cur_user->id ){ ?> 
    <a class="user_details" href="javascript: void(0)" data-toggle="popover" >
    <div class="contact-wrap">
      <input type="hidden" value="<?php echo $adminusers->id; ?>" name="user_id" />
       <input type="hidden" value="admin" name="user_key" />
       <div class="contact-profile-img">
           <div class="profile-img">
			   <?php if(isset($adminusers->profile_image) && $adminusers->profile_image!=''){?>
				    <img width="60" height="60" src="<?php echo $adminusers->profile_image; ?>" class="img-responsive">
				   
			  <?php }else{ ?>
				  <img width="60" height="60" src="<?php echo ASSETS;?>assets/img/user-thumb.jpg" class="img-responsive">
				  
			  <?php  }?>
			    
           
           
           </div>
       </div>
        <span class="contact-name">
            <small class="user-name"><?php echo ucwords($adminusers->display_name); ?></small>
            <span class="badge progress-bar-danger" rel="<?php echo $adminusers->id; ?>"><?php echo $adminusers->unread; ?></span>
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
            <!--<?php //$status = $adminusers->online == 1 ? 'is-online' : 'is-offline'; ?> 
            <span class="user-status <?php //echo $status; ?>"></span>-->
        </span>
    </div>
    </a>
 <?php  }} ?>
</div>
</div>   
 <!--admin users end-->
 
 
<div class="chat-search">
 
    <div class="searchdata_container">
        <span class="pull-left">Friends</span>
        
        <span class="pull-right icon" id="flip1"><i class="fa fa-minus" aria-hidden="true"></i></span>
        
        <div class="main-search pull-right">
            <input class="pull-right " id="serach-show" type="text" onkeyup="getSearchUsers(this.value)" value=""  name="search"/>
            <span class="search-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
    </div>
    
 <div id="searchdata">
 
  
 <?php  foreach ($users as $user) {  //if($user->id != $cur_user->id ){ ?>
    
    <a class="user_details" href="javascript: void(0)" data-toggle="popover" >
    <div class="contact-wrap">
      <input type="hidden" value="<?php echo $user->id; ?>" name="user_id" />
       <input type="hidden" value="alumni" name="user_key" />
       <div class="contact-profile-img">
           <div class="profile-img">
			   <?php if(isset($user->profile_image) && $user->profile_image!=''){?>
				    <img width="60" height="60" src="<?php echo $user->profile_image; ?>" class="img-responsive">
				   
			  <?php }else{ ?>
				  <img width="60" height="60" src="<?php echo ASSETS;?>assets/img/user-thumb.jpg" class="img-responsive">
				  
			  <?php  }?>
			    
           
           
           </div>
       </div>
        <span class="contact-name">
            <small class="user-name"><?php echo ucwords($user->display_name); ?> <?php if($user->passout_year!=''){?>(<?php echo ucwords($user->passout_year); ?>)<?php } ?></small>
            <span class="badge progress-bar-danger" rel="<?php echo $user->id; ?>"><?php echo $user->unread; ?></span>
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
            <?php //$status = $user->online == 1 ? 'is-online' : 'is-offline'; ?> 
            <!--<span class="user-status <?php echo $status; ?>"></span>-->
        </span>
    </div>
    </a>
 <?php  }//} ?>
 </div>
    </div>    
 
</div>
</div>
<!--
| CHAT CONTACT HOVER SECTION
-->
<!--<div class="popover" id="popover-content">
    <div id="contact-image"></div>
    <div class="contact-user-info">
        <div id="contact-user-name"></div>
        <div id="contact-user-status" class="online-status"></div>
    </div>
</div>-->
<!--
| INDIVIDUAL CHAT SECTION
-->
<div id="chat-box" style="top: 400px">
<div class="chat-box-header">
    <a href="javascript: void(0);" class="chat-box-close pull-right">
        <i class="fa fa-remove"></i>
    </a>
    <span class="user-status is-online"></span>
    <span class="display-name"></span>
    <small></small>
</div>

<div class="chat-container">
    <div class="chat-content">
        <input type="hidden" name="chat_buddy_id" id="chat_buddy_id"/>
        <ul class="chat-box-body"></ul>
    </div>
    <div class="chat-textarea">
        <input placeholder="Type your message" class="form-control" />
    </div>
</div>
</div>
<script>
function getSearchUsers(val){
	if(val!=''){
		$("#serach-show").addClass('serachshow');
	}else{
		$("#serach-show").removeClass('serachshow');
	}
	
	 var userdata = $("#searchform").serialize();
		 console.log(userdata);
	     $.ajax({
		url: "<?php echo base_url(); ?>chat/users/getSearch",
		method: "POST",
		data:{userdata:val},
		dataType: "json"
	}).done(function(msg){
		  
		     var str="";
		  if(msg!='error'){
		  $.each( msg, function( key, value ) {
			    
			  str+='<a class="user_details" href="javascript: void(0)" data-toggle="popover" >\
                    <div class="contact-wrap">';
                str+='<input type="hidden" value="'+value.id+'" name="user_id" />\
                   <input type="hidden" value="alumni" name="user_key" />\
                    <div class="contact-profile-img">\
                     <div class="profile-img">';
			        if(value.profile_image!=''){
				   str+='<img width="60" height="60" src="'+value.profile_image+'" class="img-responsive">';
	               }else{ 
		 		  str+='<img width="60" height="60" src="<?php echo base_url();?>../assets/img/user-thumb.jpg" class="img-responsive">';
			        } 
				str+='</div></div>\
					<span class="contact-name">';
            str+='<small class="user-name">'+value.display_name+' ('+value.passout_year+')</small>';
            str+='<span class="badge progress-bar-danger" rel="'+value.id+'">';
			if(value.unread==""){
			 	
			}else{
				+value.unread+'</span>';
			}
		str+='</span>\
        <span style="display: table-cell;vertical-align: middle;" class="user_status">\
        </span>\
          </div>\
            </a>';
		   });
	   }else{
		   str+='<span class="data_result">data unavailable</span>';
	   }
		 $('#searchdata').html(str);	    
			   
	 });
  }
    

   // $(document).ready(function(){
    $("#flip").click(function(){
		if ($('#flip').find('.fa-minus').length) {
			$('#flip .fa-minus').removeClass('fa-minus').addClass('fa-plus');
		}else{
			$('#flip .fa-plus').removeClass('fa-plus').addClass('fa-minus');
		}
        $("#panel").slideToggle("slow");
    });
    $("#flip1").click(function(){
		if ($('#flip1').find('.fa-minus').length) {
			$('#flip1 .fa-minus').removeClass('fa-minus').addClass('fa-plus');
		}else{
			$('#flip1 .fa-plus').removeClass('fa-plus').addClass('fa-minus');
		}
        $("#searchdata").slideToggle("slow");
    });
//});

    
    
</script>

