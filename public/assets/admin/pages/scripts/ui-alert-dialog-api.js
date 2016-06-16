var UIAlertDialogApi = function () {

    var handleDialogs = function() {

        $('#demo_1').click(function(){
                bootbox.alert("Hello world!");    
            });
            //end #demo_1

            $('#demo_2').click(function(){
                bootbox.alert("Hello world!", function() {
                    alert("Hello world callback");
                });  
            });
            //end #demo_2
        
            $('#demo_3').click(function(){
                bootbox.confirm("Are you sure?", function(result) {
                   alert("Confirm result: "+result);
                }); 
            });
            //end #demo_3

            $('#demo_4').click(function(){
                bootbox.prompt("What is your name?", function(result) {
                    if (result === null) {
                        alert("Prompt dismissed");
                    } else {
                        alert("Hi <b>"+result+"</b>");
                    }
                });
            });
            //end #demo_6

            $('#demo_5').click(function(){
                bootbox.dialog({
                    message: "I am a custom dialog",
                    title: "Custom title",
                    buttons: {
                      success: {
                        label: "Success!",
                        className: "green",
                        callback: function() {
                          alert("great success");
                        }
                      },
                      danger: {
                        label: "Danger!",
                        className: "red",
                        callback: function() {
                          alert("uh oh, look out!");
                        }
                      },
                      main: {
                        label: "Click ME!",
                        className: "blue",
                        callback: function() {
                          alert("Primary button");
                        }
                      }
                    }
                });
            });
            //end #demo_7

    }

    var handleAlerts = function() {
		
        var msg_id = $('#msg_type').val();
		var msg = "";
		switch(msg_id)
		{
			case 'update_success': 
				msg = "Project Succesfully Updated!" ;
				break;
			case 'add_component_success': 
				msg = "Component Added Succesfully!" ;
				break;
			default:
				msg = "";
				break;
		}
		if(msg != "")
		{
            Metronic.alert({
                container: '#update_msg', // alerts parent container(by default placed after the page breadcrumbs)
                place:'append', // append or prepent in container 
                type: 'success',  // alert's type
                message: msg,  // alert's message
                close: true, // make alert closable
                reset: true, // close all previouse alerts first
                focus: true, // auto scroll to the alert after shown
                closeInSeconds: '5', // auto close after defined seconds
                icon: 'check' // put icon before the message
            });
		}
        

    }

    return {

        //main function to initiate the module
        init: function () {
            handleDialogs();
            handleAlerts();
        }
    };

}();