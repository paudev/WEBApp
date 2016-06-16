

<div id="some_id" class="some_class" name="some_name"></div>

// reference

# = id -> must be unique
. = class -> can be reused
name = for post method

// in jquery ..

$('#tc_checker').select2();

// form submisson
$('.form').on('submit', function (ev) {
			ev.preventDefault();
			var cbarray = [];
		
			var currTable = $("#atst_table").dataTable();
			var rowcollection =  currTable.$(".tid:checked", {"page": "all"});
		
			rowcollection.each(function(index,elem){
				var checkbox_value = $(elem).val();
				//var checkbox_result = resultcollection[index].val();
			cbarray.push(checkbox_value);
			});
			
			var formdata = $(this).serializeArray();
			
			
			$.ajax({
				url : "Project/addToSmokeTest",
				type: "POST",
				data : {tc:cbarray, release_id:formdata[1].value, browser_id:formdata[2].value, exec_id:formdata[3].value} ,
				success: function(res)
				{
					var jsonData = JSON.parse(res);
					var project_name = jsonData.project_name ;
					var release_name = jsonData.release_name ;
					var browser_name = jsonData.browser_name ;
					var conf = confirm('Applied to SmokeTest! Proceed to SmokeTest?');
					if(conf == true)
					{
						window.location = "SmokeTest/Component/" +project_name+ "/" +release_name + "/" + browser_name ;
					}
					else
					{
						return false
					}
				}
			});
			
		});

