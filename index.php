<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>CONALEP QROO - Calendario de Eventos</title>
<?php
include("conexion_bd.php");
?>
    <link rel="stylesheet" type="text/css" href="codebase/dhtmlxwindows.css">
    <link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxwindows_dhx_skyblue.css">

    <link rel="stylesheet" type="text/css" href="codebase/dhtmlxlayout.css">
    <link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxlayout_dhx_skyblue.css">
    <script src="codebase/dhtmlxcommon.js"></script>
    <script src="codebase/dhtmlxlayout.js"></script>
    <script src="codebase/dhtmlxcontainer.js"></script>

    <script src="codebase/dhtmlxwindows.js"></script>
<!-- ##############################     Crea Calendario    #################################################-->
    <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.print.css' media='print' />
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js'></script>
    <script type='text/javascript' src='jquery/jquery-ui-1.8.11.custom.min.js'></script>
    <script type='text/javascript' src='fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript'>

	    $(document).ready(function() {
		$('#calendar').fullCalendar({
//################ Secciones que tendra en el encabezado #############
editable: true,
		    header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
            slotMinutes: 30,
          minTime : 8,
          maxTime : 21,
//############### Si sera editable en calendario ####################
			editable: false,
//############### carga datos de la base de datos ####################
		   //	events: "json-events.php",
                events:"eventos.php",

			eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
		});
	});
</script>
<script>
$(document).ready(function(){
   $("#login").click(function(evento){
      dhxLayout.cells("b").attachURL("login/index.php");

   });
})
</script>

<style>
html, body {
    	width: 100%;
    	height: 100%;
    	margin: 0px;
    	padding: 0px;
    	overflow: hidden;

}
/* ----------------------- Header -----------------------------------*/
#header {
         width: 100%;
         color: #333;
         padding: 00px;
         border: 1px solid #ccc;
         height: 45px;
         margin: 0px 0px 0px 0px;
         background-color:#007D68;
}
#header h1 {
        color: #fff;
    	font: bold 20px/30px Helvetica;
    	text-shadow: #2d3642 0 -1px 0;
    	text-align: center;
    	text-overflow: ellipsis;
    	white-space: nowrap;
    	overflow: hidden;
    	width: 49%;
    	padding: 5px 0;
    	margin: 2px 0 0 -24%;
    	position: absolute;
    	top: 0;
    	left: 50%;
}
/* ----------------------- Cuerpo -----------------------------------*/
#wrapper{
        background-image: url(bg_page.jpg);
	    background-repeat:repeat-x;
		font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
}

#leftcolumn {
         color: #333;
         margin: 10px 0px 10px 0px;
         padding: 10px;
         width: 200px;
         float: left;
  text-align: left
}
#rightcolumn {
         float: right;
         color: #333;
         margin: 0px 15px 0px 0px;
         padding: 0px;
         display: inline;
         position: relative;
}
/* ----------------------- footer -----------------------------------*/
#footer {
        color:#ffffff;
        width: 100%;
        color: #333;
        background-color:#007D68;
}
/* credits */
#credits { margin: 0px auto; width: 952px; color: #8eb2c9; font-size: 85%; line-height: 200%;
           font-family:Trebuchet, Arial, serif; font-size:80%; }
#credits a, #credit a:visited { color: #cfe6f4; }
.loginout {	background: url(images/ico-admin.gif) no-repeat left center; padding-left: 18px; padding-bottom: 2px; margin-left: 8px;}

/* ----------------------- alignments -----------------------------------*/
.center { text-align: center;}
/* ----------------------- Calendario de eventos -----------------------------------*/

#loading {
		position: absolute;
		top: 5px;
		right: 5px;
		}
	#calendar {
		width: 800px;
		margin: 0 auto;
        background-color: #ffffff;
		}
    #tit{
        text-align: center;
		font-size: 16px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }
    #login{
        text-align: left;
		font-size: 16px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }
    #direcciones{
        text-align: center;
		font-size: 10px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }


</style>
</head>
<body>
<div id="header" style="width: 100%; height: 100%; overflow: auto; display: none;" align="center">
    <h1>Calendario de Actividades del CONALEP Quintana Roo</h1>
</div>

<!-- Begin Wrapper -->
<div id="wrapper" style="width: 100%; height: 100%; overflow: auto; display: none;" align="center">
	  <!-- Begin Left Column -->
		 <div id="leftcolumn">
		 <?php
         $sql="SELECT * FROM tb_direcciones";
         $recurso=mysql_query($sql,$cn);
         $num_reg=mysql_num_rows($recurso);
         while ($arreglo=mysql_fetch_array($recurso) ){
         ?>
            <table widht="100%" id="direcciones" >
                <tr>
                    <td width="10px" style="background-color: #<?php echo $arreglo['cod_color'];?>"></td>
                    <td align="left"><?php echo $arreglo['nom_direccion'];?></td>
                </tr>
            </table>
           <?php } ?>
           <br />
           <br />
           <br />


          Para tener acceso a dar de alta eventos, presiona aquí<br />
           <div id="login"><a href="#" >
           <img src="users.png" width="48" height="48" alt="" /></a></div>

		 </div>
		 <!-- End Left Column -->

		 <!-- Begin Right Column -->
		 <div id="rightcolumn">
	          <div id='calendar'></div>
		 </div>
		 <!-- End Right Column -->
</div>
 <!-- End Wrapper -->

<!-- //////////////   FOOTER   ///////////////-->
<div id="footer" style="width: 100%; height: 100%; overflow: hidden; display: none;">
<div id="credits" class="clearfix">

	<div class="center">&copy; 2011 - 2016 Gobierno de Quintana Roo | &copy; 2011 - 2016 Conalep Q. Roo <a href="http://conalepquintanaroo.edu.mx" target="_blank">CONALEP Q.ROO</a> | Dise&ntilde;o CSS y XHTML v&aacute;lido. | @JEPC </div>

</div>

</div>


<script>
	var dhxLayout = new dhtmlXLayoutObject(document.body, "3e");
    dhxLayout.cells("a").hideHeader();
    dhxLayout.cells("b").hideHeader();
    dhxLayout.cells("c").hideHeader();
    dhxLayout.cells("a").setHeight(45);
    dhxLayout.cells("c").setHeight(40);
    dhxLayout.cells("a").attachObject("header");
    dhxLayout.cells("b").attachObject("wrapper");
    dhxLayout.cells("c").attachObject("footer");
</script>


</body>

</html>