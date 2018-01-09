<?php

require_once 'app/init.php';

if (Auth::guest()) redirect_to(App::url());

$user_id = Auth::user()->id;

if(isset($_SESSION["propid"])){
	$property_id = $_SESSION["propid"];
}else{
	// ***************************** PENDING DO SOMETHING IF NO SESSION ID *************************
}

$fecha = time();
$filename = $property_id."-".$user_id."-".$fecha;

require_once 'stepswizard.php';
/**/
?>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOKK1 | User Profile</title>
	<meta name="csrf-token" content="<?php echo csrf_token() ?>">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  
  <!-- CSS file links -->
<!-- x 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->
  <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="css/nouislider.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <link href="css/styledev.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/forms2.css">
  <link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->
  
 
  <!--[if lt IE 9]>
    <script src="global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="global/vendor/media-match/media.match.min.js"></script>
    <script src="global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
	  
	    <!-- Stylesheets -->

  <link rel="stylesheet" href="global/css/bootstrap-extend.min.css">

 
  <!-- File picker -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,600,500,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.0/cropper.min.css">
    <link rel="stylesheet" href="/imgpicker/assets/css/fileicons.css">
    <link rel="stylesheet" href="/imgpicker/assets/css/filepicker.css">
  <!--[if lt IE 9]>
    <script src="global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="global/vendor/media-match/media.match.min.js"></script>
    <script src="global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>
<body>
	<?php $user = User::find(Auth::user()->id); ?>
	
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- logo -->
      <div class="navbar-header">
          <a class="navbar-brand" href="/"><img src="images/logo.png" alt="NOKK" /></a>
      </div>
      <!-- nav toggle -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <!-- main menu -->
      <div class="navbar-collapse collapse">
        <div class="main-menu-wrap">
			<?php require_once 'menuright.php'; ?>	
          <div class="clear"></div>
        </div>
      </div>
	<!-- end main menu -->
    </div>
  </nav>
</header>

<section class="subheader">
  <div class="container">
    <h1>List Property</h1>
    <div class="breadcrumb right">Home <i class="fa fa-angle-right"></i> <a href="#" class="current">List Property</a></div>
    <div class="clear"></div>
  </div>
</section>

<section class="module login">
  			<div class="container">
	  
	  			<div class="row">
    <div class="col-md-12">

      <div class="center">
        <div class="form-nav">
          <div class="form-nav-item completed"><span>1</span><br/> Basic Info</div>
          <div class="form-nav-item completed"><span>2</span><br/> Description &amp; price</div>
          <div class="form-nav-item completed"><span>3</span><br/> Additional info</div>
          <div class="form-nav-item current"><span>4</span><br/> Photographs</div>
          <div class="form-nav-item"><span>5</span><br/> Preview listing</div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="multi-page-form-content">

        <table class="property-submit-title">
          <tr>
            <td><span class="property-submit-num">3</span></td>
            <td>
              <h4>Photographs</h4>
              <p>Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </td>
          </tr>
        </table>

		<div class="divider"></div>
		  
		  
		  
		  
		
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>


<style>
.inside-list-group-item {
  cursor: move;
  cursor: -webkit-grabbing;
  cursor: -webkit-grab;
cursor: -moz-grab;
cursor: grab;
}


.inside-list-group-item:hover > .contbotones {
	display: block;
}
 
.list-group-item {
  float:left;
}
#draggable {
	width:100%;
	background:inherit;
}
#droppable {
  /* border: 2px dashed #000; */
  border: 2px solid #000;
  min-height: 280px;
  position: relative;
  width:100%; 
  background-position: center center;
  background-size: cover;
  border-radius: 5px;
}

#droppable > *{
  width:100%;
  height:276px;
  
}
#droppable .list-group-item {
	margin:0;
	padding:0;
	background:inherit;
	width:100%;
	height: 276px;
	
}
.esconde {
  display:none;
}

#draggable .inside-list-group-item {
	max-width:450px; width:100%; min-height:180px; margin:auto;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center center;
	border-radius: 4px;
}

#droppable .list-group-item	.inside-list-group-item {
	max-width:100%; width:100%; min-height:100%; height:100%; margin:auto;
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
	border-radius: 5px;
	filter: blur(4px) grayscale( 60% ); 
     /* -webkit-filter: contrast(0.4) saturate(0.8) sepia(2.6) blur(2px) */
	/*border: 2px dashed red;*/
	/* filter: contrast(0.4) saturate(0.8) sepia(1.6) blur(1px) grayscale( 10% ) hue-rotate(10deg); */
     /* -webkit-filter: contrast(0.4) saturate(0.8) sepia(2.6) blur(2px) grayscale( 100% ) hue-rotate(180deg); */

	}
	
.sortable-fallback {
  background:inherit;
}
.sortable-fallback div{
  /* border-radius: 50%; */
}

.sortable-ghost{
  
}
.sortable-chosen div{

}

.chosen{
  border-radius: 60%;
}
.chosen div{
  border-radius: 40%;
}
.fileinput {
	border:2px solid #000; width:100%; height:100%; line-height:100%; display: table-cell; vertical-align: middle; color:#000;
}
.fileinput:hover {
	background: #EEE;
}

.botondelete {
	color:#FFF;
	border-radius: 3px;
	display: block;
	float: right;
	margin: 4px 3px;
	
}
.botondelete i{
background:black;
	border:1px solid black;
	border-radius: 10px;
	font-size: 1.45em;
	padding: 0 1px;
}

.botondelete:hover > i {
	background:white;
	color: red;
	
}


.botoncrop {
	color:black;
	border-radius: 3px;
	display: block;

	float: right;
	margin: 4px 3px;
	
}
.botoncrop i{
background:white;
	border:2px solid black;
	border-radius: 4px;
	font-size: 1em;
	padding:2px;
}
.botoncrop:hover > i {
	background:black;
	color: #ffd980;
	
}
.contbotones{
	width:28px;
	float:right;
	display: none;
}

.preview {
	position: absolute;
top: 10px;
z-index: 1;
width: 100%;
padding-right: 30px;
}
.contprogress {
	position: absolute;
top: 50px;
z-index: 2;
width:100%;
padding-right: 30px;

}
.contprogress {

	
}
.contprogress p {
	text-align: center;
	color: black;
	background:white;
	padding:3px 5px;
	border-radius: 3px;
	width: 70px;
	margin:auto;
	margin-bottom:10px;
	
}
.preview canvas {
	width:100%;
	border-radius: 4px;
	border: 1px solid black;
	filter: contrast(1) saturate(1)grayscale( 1 );
	opacity: 0.4;
     /*-webkit-filter: contrast(0.4) saturate(0.8) sepia(2.6) blur(2px) grayscale( 100% ) hue-rotate(180deg); */
}
.headerdroppable {
	 background-color: rgb(0, 0, 0);
    /* RGBa with 0.6 opacity */
    background-color: rgba(0, 0, 0, 0.6);
    /* For IE 5.5 - 7*/
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    /* For IE 8*/
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	position:absolute;
	right:10px;
	top:10px;
	width: 300px;
	display: block;
	-webkit-border-radius: 25px;
	-moz-border-radius: 25px;
	border-radius: 25px;
	font-size:1.4em;
	padding: 6px 12px;
	-webkit-box-shadow: 0 0 0 1px rgba(255,255,255,0.35);
-moz-box-shadow: 0 0 0 1px rgba(255,255,255,0.35);
box-shadow: 0 0 0 1px rgba(255,255,255,0.35);
color: #ffd980;
border: 2px solid #ffd980;
	
}
</style>
	
	
	
	<!-- Latest Sortable -->
  <script src="assets/js/Sortable.js"></script>
   <!-- droppable 
  <div class="row" style="max-width:900px; margin:auto;">
  
  <div id="droppable" class="list-group"> </div>
  
	<div id="draggable" class="files">
		<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item" id="http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0" data-id="http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0"><div class="inside-list-group-item" style="background-image:url('http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0.jpg');">1</div></div>
		<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item" id="http://onmrkt.development.mx/files/thumb/ISpp0vgqjk4d0u0000000000" data-id="http://onmrkt.development.mx/files/thumb/ISpp0vgqjk4d0u0000000000"><div class="inside-list-group-item" style="background-image:url('http://onmrkt.development.mx/files/thumb/ISpp0vgqjk4d0u0000000000.jpg');">2</div></div>
		<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item" id="http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0" data-id="http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0"><div class="inside-list-group-item" style="background-image:url('http://onmrkt.development.mx/files/thumb/e81a2e0beb018b74dc957bd72afd8bf0.jpg');">3</div></div>
	</div>
  
  </div>
  
  -->

	<div id="filepicker" class="row" style="max-width:900px; margin:auto;">
		<div id="droppable" class="list-group">
		
				<h1 class="headerdroppable" style="height:inherit; width:auto;">Cover Photo <i class="fa fa-star"></i></h1>
			
		</div>
		<div id="draggable" class="files">
		</div>
	</div>
 
	
	
	<script>
	$(window).on('load', function() {

	//$( ".files" ).append( '<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item" id="uploadbutton"><div class="inside-list-group-item" style="display: table;"><div class="btn fileinput"><i class="fa fa-plus"></i> Add files<input type="file" style="height:100%" name="files[]" multiple></div></div></div>' );
	
	//var heightadd = ($('.inside-list-group-item').width()*0.6666).toFixed(0);
	//alert(height);
	//	$('#uploadbutton .inside-list-group-item').css('height', heightadd+'px');
	//$('.loader-overlay').css('background', 'black');
	//	$('.loader-overlay').remove();
	//alert("caca2");
	
		$.ajax({
		  method: "POST",
		  url: "getcover.php",
		  data: { userid: <?php echo $user_id; ?>,propid: <?php echo $property_id; ?> }
		})
		.done(function( cover ) {
			//alert( "Data Saved: " + cover );
			document.getElementById("droppable").style.backgroundImage = "url('/files/"+cover+"')";
			$("[data-id='"+cover+"']").addClass( "esconde" );
			
		});
   });
   
	$(window).load(updateHeight);
	$(window).resize(updateHeight);
	
	//$(window).ready(updateHeight);
	//$(window).resize(updateHeight);

	function updateHeight()
	{
	var height = ($('.inside-list-group-item').width()*0.6666).toFixed(0);
	//alert(height);
		$('.inside-list-group-item').css('height', height+'px');
	}
	
	</script>
  
  
   
  
  <script>
  

var sortable = Sortable.create(draggable, {
  group: {
    name: "shared",
    pull: "clone",
    revertClone:1,
    //put: "false"
  },
   forceFallback: true,
    //chosenClass: 'chosen',
	 filter: ".ignore-elements",
	 preventOnFilter: false,
	onFilter: function (/**Event*/evt) {
		var itemEl = evt.item;  // HTMLElement receiving the `mousedown|tapstart` event.
		//itemEl.style.background = "red";
		//$( "#addpics" ).click();
	//	$("#addpics").css({border:"2px dashed red"});
		
		
		
		
	},
	

  
  onRemove: function (evt) {
    var el = evt.item;
    //el.parentNode.removeChild(el);
    //alert('Se Fue: ' + el.textContent);
	el.className = 'esconde';
	//alert('Se Fue: ' + el);
    //var order = el.children.length;
    //alert(evt.from);
    
  },
  
   store: {
    get: function (sortable) {
      var order = localStorage.getItem(sortable.options.group);
      //alert(order);
      return order ? order.split('|') : [];     
    },

    set: function (sortable) {
      var order = sortable.toArray();
      localStorage.setItem(sortable.options.group, order.join('|'));
	  
		$.ajax({
		  method: "POST",
		  url: "ordena.php",
		  data: { orden: order, location: "Australia" }
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
		});
	  
      //alert(order); // saca el orden
    }
  },

  
  
  
});


Sortable.create(droppable, {
  group: {
    name: "shared",
    //pull: "clone"
    //put: "false"
  },
  sort: false,
  
  
  onAdd: function (evt) {
    var el = evt.item;
    el.parentNode.removeChild(el);
    var el2 = document.getElementById(""+el.getAttribute('id')+"");
	document.getElementById("droppable").style.backgroundImage = "url('"+el.getAttribute('id')+"')";
	
	
	//document.getElementById("droppable").style.backgroundImage = "url('http://onmrkt.development.mx/files/thumb/ISpp0vgqjk4d0u0000000000.jpg')";
	
    //alert(el2);
    //el2.style.display = "none";
	//alert(el.getAttribute('id')); // saca el id del cover
    
    var escondido = document.getElementById("draggable").getElementsByClassName('esconde');

    while(escondido.length > 0){
      escondido[0].className = 'col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item';
    }
    
    //el2.classList.add('esconde');
    
    el2.className = 'esconde';
    //alert('Dropped: ' + el.textContent);
	//alert(el.getAttribute('data-id'));
		// ADD COVER
		$.ajax({
		  method: "POST",
		  url: "addcover.php",
		  data: { imgname: el.getAttribute('data-id'),userid: <?php echo $user_id; ?>,propid: <?php echo $property_id; ?> }
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
		});
	
  }
});


$(document).mousedown(function() {
      $("#droppable").bind('mouseover',function(){
          $(this).css({border:"2px dashed red"});
      });
  })
  .mouseup(function() {
    $("#droppable").unbind('mouseover');
    $("#droppable").css({border:"2px solid black"});
  });
  
  </script>
	
	
	
<!-- Crop Modal -->
    <div id="crop-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title">Make a selection</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning crop-loading">Loading image...</div>
                    <div class="crop-preview"></div>
                </div>
                <div class="modal-footer">
                    <div class="crop-rotate">
                        <button type="button" class="btn btn-default btn-sm crop-rotate-left" title="Rotate left">
                            <i class="fa fa-undo"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm crop-flip-horizontal" title="Flip horizontal">
                            <i class="fa fa-arrows-h"></i>
                        </button>
                        <!-- <button type="button" class="btn btn-default btn-sm crop-flip-vertical" title="Flip vertical">
                            <i class="fa fa-arrows-v"></i>
                        </button> -->
                        <button type="button" class="btn btn-default btn-sm crop-rotate-right" title="Rotate right">
                            <i class="fa fa-repeat"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success crop-save" data-loading-text="Saving...">Save</button>
                </div>
            </div>
        </div>
    </div><!-- end of #crop-modal -->
    <!-- Camera Modal -->
    <div id="camera-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title">Take a picture</h4>
                </div>
                <div class="modal-body">
                    <div class="camera-preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left camera-hide" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success camera-capture">Take picture</button>
                </div>
            </div>
        </div>
    </div><!-- end of #camera-modal -->

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.5.2/jquery.timeago.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.0/cropper.min.js"></script>
	
    <script src="/imgpicker/assets/js/filepicker.js"></script>
    <script src="/imgpicker/assets/js/filepicker-ui.js"></script>
    <script src="/imgpicker/assets/js/filepicker-drop.js"></script>
    <script src="/imgpicker/assets/js/filepicker-crop.js"></script>
    <script src="/imgpicker/assets/js/filepicker-camera.js"></script>

    <script>
	var orden = 99;
        $('#filepicker').filePicker({
			url: 'imgpicker/uploader/index.php',
			maxFileSize: 50000000,
			acceptedFiles: /(\.|\/)(gif|jpe?g|png)$/i,
			ui: {
                autoUpload: true,
				perpage: 140,
				
            },
			data: function() { 
			
			orden++;
			
			return {
				//orden: Math.floor((Math.random() * 100) + 1),
				orden: orden,
				imagename: "<?php echo $filename; ?>-",	
				userid: <?php echo $user_id; ?>,	
				propid: <?php echo $property_id; ?>,	
			} 
		},
            plugins: ['ui', 'drop', 'camera', 'crop']
		})
		.on('renderdone.filepicker', function (e, data) {
					//alert(data);
			if ( !$( "#uploadbutton" ).length ) {
 
				$( ".files" ).append( '<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item ignore-elements" id="uploadbutton"><div class="inside-list-group-item" style="display: table;"><div class="btn fileinput"><i class="fa fa-plus"></i> Add photos<input type="file" id="addpics" style="height:100%;" name="files[]" multiple></div></div></div>' );
				var heightadd = ($('.inside-list-group-item').width()*0.6666).toFixed(0);
				$('#uploadbutton .inside-list-group-item').css('height', heightadd+'px');
			 
			}
			
		})
		
		.on('done.filepicker', function (e, data) {
			
			var list = $('.files');
			// Iterate through the uploaded files
			$.each(data.files, function (i, file) {
				if (file.error) {
					list.append('<li>' + file.name + ' - ' + file.error + '</li>');
				} else {
					//list.append('<li>' + file.name + '</li>');
				}
			});
		})
		.on('fail.filepicker', function () {
			alert('Oops! Something went wrong.');
		});
		
		
		

		
    </script>
	
	
	<!-- Upload Template -->
    <script type="text/x-tmpl" id="uploadTemplate">
	
	<div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item download-template">
	<div class="inside-list-group-item">
	<div class="contprogress">
		<p>{%= o.file.sizeFormatted || '' %}</p>
               
		<div class="progress">
            <div class="progress-bar progress-bar-striped active"></div>
        </div>
	 </div>
		<div class="inside-list-group-item">
		<div class="column-preview">
                <div class="preview">
                    
                </div>
            </div>
		</div>
	</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
    </script><!-- end of #uploadTemplate -->

    <!-- Download Template -->
    <script type="text/x-tmpl" id="xdownloadTemplate">
        {% o.timestamp = function (src) {
            return (src += (src.indexOf('?') > -1 ? '&' : '?') + new Date().getTime());
        }; %}
        <tr class="download-template">
            <td class="column-preview">
                <div class="preview">
                    {% if (o.file.versions && o.file.versions.thumb) { %}
                        <a href="{%= o.file.url %}" target="_blank">
                            <img src="{%= o.timestamp(o.file.versions.thumb.url) %}" width="64" height="64"></a>
                        </a>
                    {% } else { %}
                        <span class="fa file-icon-{%= o.file.extension %}"></span>
                    {% } %}
                </div>
            </td>
            <td class="column-name">
                <p class="name">
                    {% if (o.file.url) { %}
                        <a href="{%= o.file.url %}" target="_blank">{%= o.file.name %}</a>
                    {% } else { %}
                        {%= o.file.name %}
                    {% } %}
                </p>
                {% if (o.file.error) { %}
                    <span class="text-danger">{%= o.file.error %}</span>
                {% } %}
            </td>
            <td class="column-size"><p>{%= o.file.sizeFormatted %}</p></td>
            <td class="column-date">
                {% if (o.file.time) { %}
                    <time datetime="{%= o.file.timeISOString() %}">
                        {%= o.file.timeFormatted %}
                    </time>
                {% } %}
            </td>
            <td>
                {% if (o.file.imageFile && !o.file.error) { %}
                    <a href="#" class="action action-primary crop" title="Crop">
                        <i class="fa fa-crop">cr</i>
                    </a>
                {% } %}
                {% if (o.file.error) { %}
                    <a href="#" class="action action-warning cancel" title="Cancel">
                        <i class="fa fa-ban">ca</i>
                    </a>
                {% } else { %}
                    <a href="#" class="action action-danger delete" title="Delete">
                        <i class="fa fa-trash-o">de</i>
                    </a>
                {% } %}
            </td>
        </tr>
    </script><!-- end of #downloadTemplate -->

    <!-- Pagination Template -->
    <script type="text/x-tmpl" id="paginationTemplate">
        {% if (o.lastPage > 1) { %}
            <ul class="pagination pagination-sm">
                <li {% if (o.currentPage === 1) { %} class="disabled" {% } %}>
                    <a href="#!page={%= o.prevPage %}" data-page="{%= o.prevPage %}" title="Previous">&laquo;</a>
                </li>

                {% if (o.firstAdjacentPage > 1) { %}
                    <li><a href="#!page=1" data-page="1">1</a></li>
                    {% if (o.firstAdjacentPage > 2) { %}
                       <li class="disabled"><a>...</a></li>
                    {% } %}
                {% } %}

                {% for (var i = o.firstAdjacentPage; i <= o.lastAdjacentPage; i++) { %}
                    <li {% if (o.currentPage === i) { %} class="active" {% } %}>
                        <a href="#!page={%= i %}" data-page="{%= i %}">{%= i %}</a>
                    </li>
                {% } %}

                {% if (o.lastAdjacentPage < o.lastPage) { %}
                    {% if (o.lastAdjacentPage < o.lastPage - 1) { %}
                        <li class="disabled"><a>...</a></li>
                    {% } %}
                    <li><a href="#!page={%= o.lastPage %}" data-page="{%= o.lastPage %}">{%= o.lastPage %}</a></li>
                {% } %}

                <li {% if (o.currentPage === o.lastPage) { %} class="disabled" {% } %}>
                    <a href="#!page={%= o.nextPage %}" data-page="{%= o.nextPage %}" title="Next">&raquo</a>
                </li>
            </ul>
        {% } %}
    </script><!-- end of #paginationTemplate -->
	
	
	
	<!-- Mi Template -->
    <script type="text/x-tmpl" id="downloadTemplate">
	{% o.timestamp = function (src) {
            return (src += (src.indexOf('?') > -1 ? '&' : '?') + new Date().getTime());
        }; %}
        <div class="col-sm-12 space-top-5 col-lg-4 col-md-6 list-group-item download-template" id="files/thumb/{%= o.file.name %}" data-id="{%= o.file.name %}"><div class="inside-list-group-item" style="background-image:url('{%= o.timestamp(o.file.versions.thumb.url) %}');">
		<div class="contbotones">
		
                {% if (o.file.error) { %}
                    <a href="#" class="action action-warning cancel botoncancel" title="Cancel">
                        <i class="fa fa-ban"></i>
                    </a>
                {% } else { %}
                    <a href="#" class="action action-danger delete botondelete" title="Delete">
                        <i class="fa fa-times-circle"></i>
                    </a>
                {% } %}
				{% if (o.file.imageFile && !o.file.error) { %}
                    <a href="#" class="action action-primary crop botoncrop" title="Crop">
                        <i class="fa fa-crop"></i>
                    </a>
				<a href="#" class="action action-primary coverphoto botoncrop" title="Cover photo">
                        <i class="fa fa-star"></i>
                    </a>
                {% } %}
		</div></div></div>

    </script><!-- end of #miTemplate -->
	
		<!-- FORM -->
		  <form class="multi-page-form"  id="form10-6"  method="post" action="p.php" >
						<div style="display:none">
							<input name="photos" id="photos" type="hidden" value="1">
							<input name="formid" id="formid" type="hidden" value="10">
							<input name="step" id="step" type="hidden" value="6">
						</div>
		  <div style="width:100%;  max-width: 860px; margin: 30px auto;">
		  
		  
		   <a class="btn-progress-back link-icon va-container va-container-v pull-left text-gray link--accessibility-outline botback" href="submit-property-step5.php"><span class="iconback hide-sm"></span><span class="va-middle textbotback"><h5 class="text-normal"><span>Back</span></h5></span></a>
		  
		  <button type="submit" form="form10-6" class="button button-icon right form-next nextbtn"><i class="fa fa-angle-right"></i> Next</button>

		  </div>
					</form><!-- END FORM -->	
	


	

	<!-- End FILEPICKER -->
	
	<div class="divider d-none d-sm-block" ></div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  

        

  </div><!-- end col -->
  </div><!-- end row -->
	 
	  
			</div>
	<!-- END CONTENT -->

</section>


	
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget">
                <a class="footer-logo" href="index.html"><img src="images/logo-white.png" alt="Homely" /></a>
                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut 
                purus eget nunc ut dignissim cursus at a nisl. Mauris vitae 
                turpis quis eros egestas tempor sit amet a arcu. Duis egestas 
                hendrerit diam.</p>
                <div class="divider"></div>
                <ul class="social-icons circle">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget from-the-blog">
                <h4><span>From the Blog</span> <img src="images/divider-half.png" alt="" /></h4>
                <ul>
                    <li>
                      <a href="#"><h3>Open House at 123 Smith Drive</h3></a>
                      <p>Vel fermentum ipsum. Quis molestie odio. Interdum et...<br/> <a href="#">Read More</a></p>
                      <div class="clear"></div>
                    </li>
                     <li>
                        <a href="#"><h3>Open House at 123 Smith Drive</h3></a>
                        <p>Vel fermentum ipsum. Quis molestie odio. Interdum et...<br/> <a href="#">Read More</a></p>
                        <div class="clear"></div>
                      </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 widget footer-widget">
                <h4><span>Get In Touch</span> <img src="images/divider-half.png" alt="" /></h4>
                <p>123 Smith Drive<br/>
                Annapolis, MD 21012<br/>
                United States
                </p>
                <p>
                <b class="open-hours">Open Hours</b><br/>
                Mondy - Friday: 9 am - 5 pm<br/>
                Saturday: 9 am - 1pm<br/>
                Sunday: Closed
                </p>
                <p class="footer-phone"><i class="fa fa-phone icon"></i> (123) 456-7890</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 widget footer-widget newsletter">
                <h4><span>Newsletter</span> <img src="images/divider-half.png" alt="" /></h4>
                <p><b>Subscribe to our newsletter!</b> Vel lorem ipsum. Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                <form class="subscribe-form" method="post" action="#">
                    <input type="text" name="email" value="Your email" />
                    <input type="submit" name="submit" value="SEND" class="button small alt" />
                </form>
            </div>
        </div><!-- end row -->
    </div><!-- end footer container -->
</footer>

<div class="bottom-bar">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
            &copy; NOKK 2017.&nbsp;&nbsp;All Rights Reserved
          </div>
          <div class="col-md-6 text-right">
            <a href="#">Terms of service</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Privacy policy</a>
          </div>
    </div>
</div>
	<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
</body>
</html>