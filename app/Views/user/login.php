<style>
	div.action_view{
		padding: 20px;
		background: #fff;
		transition: all 2s ease-in-out;
		min-height: calc(100% - 300px);
		background: #40deba;
		backface-visibility: hidden;
		perspective: 300px;
		transform: translate3d(0,0,0);
		
		 margin: 70px 36%;


	}
	@media (max-width: 500px){
		div.action_view{
		
				background-color: #fff;
				 margin: 70px 10%;

		}
	}
	div.login-box{
		width: 300px;
		margin: 20px auto 0;
		padding: 20px;
		background-color: #fff;
		box-shadow: 0 0 50px #26789a;
		border-radius: 10px;
	}
	
	div.login-box form img{
		display: block;
		margin: 10px auto 20px;
		border-radius: 50%;
	}
	div.login-box form h1{
		width: 206px;
    	height: 51px;
    	background-color: #387c80;
    	margin: 10px auto;
    	text-align: center;
    	line-height: 1.5;
	}
	div.login-box form input{
		border: 1px solid #f2f5f6;
		background-color: #f2f5f6;
		padding: 12px 10px 7px;
		display: block;
		box-sizing: border-box;
		border-radius: 5px;
		margin:10px auto;
		direction: rtl


	}
	div.login-box form input[type="text"],div.login-box form input[type="password"]{
		padding-right: 35px;
		position: relative;
	}
	div.login-box form i.fa-user{
		    position: absolute;
		    top: 286px;
		    right: 97px;

	}
	div.login-box form i.fa-lock{
		    position: absolute;
		    top: 338px;
		    right: 97px;

	}
	div.login-box form input[type="submit"]{
		background-color: green;
		color: #fff;
		transition: all 2s ease-in-out;
		width: 90%;
		font-size: 18px

	}
	div.login-box form input[type="submit"]:hover{
		background-color: #9eb2bd;
		

	}
	div.login-box form input[type="submit"]:active{
		background-color: #9eb2bd;
		

	}
	div.login-box form input[type="text"] : focus,div.login-box form input[type="password"] : focus{
		border: 1px solid #f1f1f1;
		background-color: #f9f9fa;
	}
	div.login-box form input:-webkit-autofill{
		background-color: #f2f5f6 !important;
		box-shadow: 0 0 0 9999px #f2f5f6;
		
	}
	div.login-box form input:-webkit-autofill:focus{
		border-color:#f9f9fa;
		border-bottom: 1px solid #f9f9fa;
		box-shadow: 0 0 0 9999px #f9f9fa;
		
	}

	.animate{
		animation-name: login;
		animation-duration: 2s;
		backface-visibility: hidden;
	}
	@keyframes login{
		0%{
			transform:scale(0) rotateY(360deg);

		}
		50%{
			transform:scale(1) rotateY(180deg);
		}
		100%{
			transform:scale(1) rotateY(0);
		}

	}
	 p.message{
      font-size: 21px;
    background-color: #222;
    color: #fff;
    padding: 2px 5px;
    line-height: 1.5;
    margin: 3px 0 20px 0;
    border-radius: 3px;
    
   /* position: absolute;
   
    top: 120px;
    width: 318px;*/
    text-align: center;
	}
	 p.message.t1{
	  
	  background-color: #68ab68;
	 
	}
	 p.message.t3{
	  
	  background-color:#e2b072;
	 
	}
	 p.message.t2{
	  
	  background-color: #900;
	 
	}
	 p.message.t4{
	  
	  background-color: #ff0;
	 
	}


</style>
<div class="action_view login">
	<?php
    	if(isset($error) && $error == true){
    		?>
    			<div class="alert alert-danger text-center h3">
    				<span>عفوا اسم المستخدم او كلمة المرور خطا</span>
    			</div>
    		<?php
    	}

    	?>
    <div class="login-box animate">
    	<form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded" action="index.php?p=user/login">
    		<div class="border"></div>
    		<h1>صفحة الدخول </h1>
    		<img src="upload/image1.jpg" width="120" height="120">
    		<div class="input_wrapper_username">
    			<input type="text" name="username" placeholder="من فضلك ادخل اسمك" id="ucname" maxlength="50" required="required" >
    			
    		</div>
    		<div class="input_wrapper_password">
    			<input type="password" name="password" placeholder="من فضلك ادخل كلمة المرور" id="ucpwd" required="required" >
    			
    		</div>
    		<input type="submit" name="login" value="تسجيل الدخول">
    		
    	</form>

    </div>

</div>