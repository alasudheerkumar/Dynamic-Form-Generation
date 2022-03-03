
<html>
<head>
	<title>code(for)^2m</title>
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<script type="text/javascript">
	
	var i=0;

	function generatefield()
	{
		document.getElementById('fname').innerHTML=null;

		console.log("jiii");

		 var newdiv = document.createElement('div');
      newdiv.innerHTML = "<div class='container'><div class='row'><div class='col'><input type='text' name='fieldlabel"+(i+1)+"' class='form-control' placeholder='label of the field' required/></div><div class='col'><input type='text' name='fieldname"+(i+1)+"' class='form-control' placeholder='name of the field' required/></div><div class='col'><select name='fieldtype"+(i+1)+"' id='fieldtype"+(i+1)+"' class='form-control' onchange='generateattr("+(i+1)+")'><option value='' disabled selected>select type</option><option value='text'>text</option><option value='password'>password</option><option value='select'>select options</option><option value='email'>email</option><option value='radio'>radio</option><option value='date'>date</option></select></div><div class='col' id='attributes"+(i+1)+"'></div></div></div></br>";
      document.getElementById("fields").appendChild(newdiv);
      i++;
      console.log(i);
      document.getElementById('nooffields').value=i;
      var nooffields=document.getElementById('nooffields').value;
      console.log(nooffields);


      var newele = document.createElement('div');
      newele.innerHTML="<div class='container'><br/><br/><div class='row'><div class='col'><input type='text' name='fname' class='form-control' placeholder='name of file without extension' required /></div><div class='col'>&nbsp;</div><div class='col'><input type='submit' class='btn btn-primary' value='create code'/></div></div></div>";
      document.getElementById('fname').appendChild(newele);
     
	}


	function generateattr(k)
	{
		document.getElementById('attributes'+k).innerHTML=null;
		var fieldtype=document.getElementById('fieldtype'+k).value;
		




		var newele = document.createElement('div');

      if(fieldtype=='text' || fieldtype=='password')
      {

      newele.innerHTML="<select name='req"+k+"' class='form-control' required><option value='required'>required</option><option value=''>not required</option></select><br><input type='number' placeholder='min length' name='minlength"+k+"' required class='form-control' /><br><input type='number' placeholder='max length' name='maxlength"+k+"' required class='form-control' /><br><input type='text' placeholder='pattern in regex' name='pattern"+k+"' required class='form-control' />";
      }
      if(fieldtype=='select' || fieldtype=='radio')
      {
      	 newele.innerHTML="<select name='req"+k+"' class='form-control'><option value='required'>required</option><option value=''>not required</option></select><br><input type='number' class='form-control' onchange='generateoptions("+k+")' placeholder='no of options' name='options"+k+"' id='fieldoptions"+k+"' /><br><div id='options"+k+"'></div>";
      }

      if(fieldtype=='email' || fieldtype=='date')
      {
      	 newele.innerHTML="<select name='req"+k+"' class='form-control'><option value='required'>required</option><option value=''>not required</option></select><br>";
      }





      document.getElementById('attributes'+k).appendChild(newele);



	}


	function generateoptions(k)
	{
		 document.getElementById('options'+k).innerHTML=null;

		var noofoptions=document.getElementById('fieldoptions'+k).value;
		var i;
		var html='';
		for(i=1;i<=noofoptions;i++)
		{

			html=html+"<input type='text' class='form-control' placeholder='option"+i+"' required name='field"+k+"option"+i+"' />";


		}

		var newele = document.createElement('div');
      newele.innerHTML=html;
      document.getElementById('options'+k).appendChild(newele);
     

	}
</script>

<body>

	<form action="createcode.php" method="POST">
		
	<div class="row">
		<div class="col">
			&nbsp;
		</div>
		<div class="col">
		  <b>Create code for form here</b>
		</div>
		<div class="col">
		&nbsp;
		</div>
	</div>
	<div id="fields">

      </div>
	
	<div class="row">
		<div class="col">
			&nbsp;
		</div>
		<div class="col">
		  &nbsp;
		</div>
		<div class="col">
		  &nbsp;
		</div>
		<div class="col">
		<button type="button" class="btn btn-success btn-sm" onclick="generatefield()">ADD a field</button>
	
		</div>
	</div>
<input type="hidden" name="nooffields" required id="nooffields"/>
<div id="fname">
	</div>

	</form>
	

</body>

</html>
