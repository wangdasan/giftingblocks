$(document).ready(function()
{
	function checkEmail(str) 
	{
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if (!filter.test(str)) 
	    {
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	 
	}
	$("#clkSgnUp").click(function()
	{
		var fn=$("#firstNameInput-SignUp").val();
		var ln=$("#lastNameInput-SignUp").val();
		var em=$("#emailInput-SignUp").val();
		if (fn=="")
		{
			alert("Please Input First Name");
			return false;
		}
		if (ln=="")
		{
			alert("Please Input Last Name");
			return false;
		}
		if (checkEmail(em)==false)
		{
			alert("Please Input valid email");
			return false;
		}
		
		if ($("#termchk").hasClass("checked")==false)
		{
			alert("Please accept terms & conditions");
			return false;
		}
		else
		{
			
			$.post('/sendverif',{"em" : em, "fn":fn,"ln":ln}, function(data)
	        {
	            if (data=="ok")
	            {
	                alert("You 'll get verification email within 3 mins");
	            }

	        });
		}
	});
});