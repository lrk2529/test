<html>
	<head>
		<meta charset="utf-8">
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	</head>
	<body>

		<script type="text/javascript">

			
		// INTIALIZATION AND SETUP CODE	
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));

		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1713561585583869',
		      xfbml      : true,
		      version    : 'v2.11'
		    });
		    FB.AppEvents.logPageView();
		      FB.Canvas.setAutoGrow();
		  };

      // INITIALIZATION SETUP END HERE

		  function fblogin(){
		  	 
		  	FB.getLoginStatus(function(response) {
			  if (response.status === 'connected') {

			  getUserProfile();
			    

			  }
			  else {

			    FB.login();
			    fblogin();
			    console.log(response);
			    $("#status").empty().text("please login the facebook ");
			  }
			 });
		  }
       

       	 // fetching the all information  from login id

			  function getUserProfile(){
			  	console.log("fetching user information ....");
			  	var body = 'Reading JS SDK documentation';
		/*	  
			  	FB.api('/me','get', { fields: "id,name,email,picture.width(9999).height(9999),gender,cover,link" },function(response) {
					console.log(response);
				  var profilePic = "http://graph.facebook.com/"+response.id+"/picture?type=large";

				  var userinfo="<img src='"+response.picture.data.url+"'/><br>";
				  	userinfo +=response.name+" ("+response.gender+" )<br/>"+response.email+"<br/>"+"<img src='"+response.cover.source+"'/><br>";
				   document.getElementById("status").innerHTML = userinfo; 
				});  */
				FB.api('/me/events',function(response) {
					document.getElementById("status").innerHTML="You used facebook Api for post the message"; 
					  console.log(response);
					  console.log("events");
					});


				FB.api('/me',{fields: "name,about,email,gender,education,birthday,hometown,languages,work,events,tagged_places,relationships_status"},function(response) {
					console.log(response);
					 console.log("Just i need this data");
					console.log(response.name);
					 document.getElementById("mobile").innerHTML =  response.phone ;
					 document.getElementById("name").innerHTML =  response.name ;
					 document.getElementById("email").innerHTML =  response.email ;
					 document.getElementById("gender").innerHTML =  response.gender ;
					 document.getElementById("birthday").innerHTML =  response.birthday ;
					 document.getElementById("hometown").innerHTML =  response.hometown.name ;
					 document.getElementById("position").innerHTML =  response.work[0].position.name;
					 document.getElementById("work").innerHTML =  response.work[0].employer.name + "," +response.work[0].location.name;
					 console.log( response.hometown);
					 console.log(response.work);
					 // document.getElementById("mobile").innerHTML =  response.mobile ;
				});
			  }
		 // post the message using bellow code
			 function fbpost(){
		  		FB.api('/me/feed','post', { message: "My First Api for access FB !" },function(response) {
					document.getElementById("status").innerHTML="You used facebook Api for post the message"; 
					  console.log(response);
					});
			  }
		  // share the link using bellow code
			 function fbshare(){
			  		FB.api('/me/feed','post', { link: "http://www.google.com" },function(response) {
						document.getElementById("status").innerHTML ="You used facebook Api for Share the link"; 
						 console.log(response);
				     });
			  }
          // upload the image using bellow code
        	 function fbupload(){
			  		FB.api('/me/feed','post', { source: "http://static.businessinsider.com/image/518d4cd169bedda32700000c/image.jpg" },function(response) {			
						  document.getElementById("status").innerHTML ="You used facebook Api for Post the image"; 
						  console.log(response);
						});
			  }

		  // bellow javascript code for share the link
			 function all_final(){
				  FB.ui({
				    method: 'share',
				    display: 'popup',
				    href: 'http://www.reconnectenergy.com',
				  }, function(response){});
				}
			// bellow javascript code for like the post or anything , bellow code is optional
			  function like(){
			  	 FB.XFBML.parse();
			  }

		</script>
		<!-- login the facebook -->
		<fb:login-button scope="public_profile,email,publish_actions,user_education_history,user_birthday,user_location,user_hometown,user_likes,user_photos,user_videos,user_work_history,user_about_me,user_relationships,user_tagged_places" onlogin="fblogin();" data-size="xlarge"> </fb:login-button>
	    <div id="status">
	        
	    </div>
		


		<div class="container">

		  <form class="form-horizontal" action="/action_page.php">
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Name:</label>
		      <div class="col-sm-10">
		         <label id="name"> </label>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Email:</label>
		      <div class="col-sm-10">          
		          <label id="email"></label>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">gender:</label>
		      <div class="col-sm-10">          
		          <label id="gender"></label>
		      </div>
		    </div>
		     <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Date of birth:</label>
		      <div class="col-sm-10">          
		          <label id="birthday"></label>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">hometown:</label>
		      <div class="col-sm-10">          
		          <label id="hometown"></label>
		      </div>
		    </div>

		     <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Designation :</label>
		      <div class="col-sm-10">          
		          <label id="position"></label>
		      </div>
		    </div>


		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">work:</label>
		      <div class="col-sm-10">          
		          <label id="work"></label>
		      </div>
		    </div>

		   <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Mobile:</label>
		      <div class="col-sm-10">          
		          <label id="mobile"></label>
		      </div>
		    </div>

		  </form>
</div>






	</body>
</html>		