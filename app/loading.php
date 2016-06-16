<div id="fade"></div>
<div id="modal">
	<img src="assets/admin/layout/img/progress-dialog.gif" alt="logo" class="logo-default"/>
</div>

<style>
	#fade {
	    display: none;
	    position:fixed;
	    top: 0%;
	    left: 0%;
	    width: 100%;
	    height: 100%;
	    background-color: #ababab;
	    z-index: 1001;
	    -moz-opacity: 0.8;
	    opacity: .70;
	    filter: alpha(opacity=80);
	}

	#modal {
	    display: none;
	    position: fixed;
	    top: 45%;
	    left: 45%;
	    width: 200px;
	    height: 200px;
	    padding:30px 15px 0px;
	    border: 3px solid #ababab;
	    box-shadow:1px 1px 10px #ababab;
	    border-radius:20px;
	    background-color: white;
	    z-index: 1002;
	    text-align:center;
	    overflow: auto;
	}
</style>