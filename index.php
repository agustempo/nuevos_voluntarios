<?php
session_start();
header("Content-Type: text/html;charset=utf-8");

unset($_SESSION['ingreso']);
if(!isset($_SESSION['ingreso'])){
    $_SESSION['ingreso']=1;
    $seccion='general';
    include 'guardarIngreso.php';
}

if (isset($_GET['page'])) {
    if(is_file("pages/{$_GET['page']}.php"))
        $page=$_GET['page'];
    else
        $page='techo';
}else
    $page='techo';

if(!isset($_GET['paso'])){
    unset($_SESSION["Id_vol"]);
    unset($_SESSION["Nombre_index"]);
    unset($_SESSION["Id_ciudad"]);
    unset($_SESSION["sPaso"]);
    unset($_SESSION["sAsunto"]);
}else{
    $_SESSION["sPaso"]=2;
    $_SESSION["sAsunto"]=$_GET['page'];
}
?><!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>TECHO - Nuevos Voluntarios</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style type="text/css">
        .techo{
            color: #FFF;
            padding-left: 10px;
        }
        .techo h2{
            background: rgba(2,2,2,0.7);
        }
        .techo p{
            background: rgba(2,2,2,0.5);
        }
        .bloque{
           /* height: 500px !important;*/
        }
        .titulo_menu{
            color:#FFF;
            font-size:16px;
            background-color:#777;
            text-shadow: 0 0 0 !important;
            height: 50px;
            line-height: 27px;
        }
        .titulo_menu:hover{
            color:#FFF !important;
            font-size:16px !important;
            background-color:#777 !important;
            text-shadow: 0 0 0 !important;
        }
        .just p{
            text-align: justify;
        }
        .just h2{
            color:#0092dd;
        }
        </style>
    </head>
    
    <body>
        <?php include('inc_head.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include('inc_menu.php') ?>

                
                <?php include("pages/$page.php"); ?>
  
                
                <?php include('inc_form_login.php'); ?>
                    
                    
                </div>
            </div>
            <hr>
            <!--<footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>-->
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script type="text/javascript">
        
        function resetForm($form){
            $form.find('input:text, input:password, input:file,  textarea, input[type="email"]').val('');
            $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
            $form.find('select').prop('selectedIndex',0);
        }
        $(function() {

            $('button.link').click(function(){
                var url = $(this).find('a').attr('href');
                window.location.href=url;
            });

            $('#Id_ciudad').change(function(){
                $(this).parent().parent().hide('fast');
                $('#datos').show('fast');
            });
            $('.boton_anotarse').click(function(){
                var plan=$(this).attr('data-subject');
                $('#asunto').val(plan);
                $('#boton_registro').find('a').attr('href','?page=registro&plan='+plan);
            });
            $('#Id_provincia').change(function(){
                var id = $(this).val();
                if(id!=''){
                    if(id=='1')
                        $('#td_titulopartido').html("Partido (*)");
                    else if(id=='5')
                        $('#td_titulopartido').html("Departamento (*)");
                    else if(id=='24')
                        $('#td_titulopartido').html("Barrio (*)");
                    else
                        $('#td_titulopartido').html("Ciudad (*)");
                    $('#td_partido').load('../ajax/ajax_partido.php?Id_provincia='+id);
                    $('#tr_partido').show();
                    $('#tr_localidad').hide();

                    
                }
                //return false;
            });
            $('#Estudia').click(function() {
                $(".estudios").toggle(this.checked);
            });

             $('#form_registro').submit(function(){//.form-horizontal
                
                event.preventDefault();
                mform=this;
                var frm     = event.target.id;
                var frmData = $("#"+frm).serialize();
                var frmAction = $("#"+frm).attr('action');
                $('.mensaje').hide();
                $.ajax({
                    url:  frmAction,
                    data: frmData,
                    type: "POST",
                    cache: false,
                    success: function(response) {
                        var json_results=[];eval("json_results = "+response+";");
                        if(json_results['error']){
                            if(json_results['error']['required']){
                                alert('Todos los campos son obligatorios');
                            }else if(json_results['error']['where']){
                                alert(json_results['error']['message']);
                                
                            }

                        }else if(json_results['ok']){
                            <?php if($_GET['plan']=='dya'): ?>
                            window.location.href='../V_d_Anotdeteccion.php?Id_ciudad=1';
                            <?php else: ?>
                            window.location.href='?page=<?php echo $_GET['plan'] ?>&paso=2';
                            <?php endif ?>
                        }
                        //alert(response)
                    },
                    error: function() {
                        
                        
                    },
                    
                });
            });

            <?php if(isset($_GET['paso'])): ?>
            $('.boton_anotarse').attr('data-target','#anotarse_paso2_modal');
            $('#anotarse_modal').modal('hide');
            $('#anotarse_paso2_modal').modal('show');
            <?php endif; ?>

            $('.form_inscripcion').submit(function(){//.form-horizontal
                
                event.preventDefault();
                
                mform=this;
                
                var frm     = event.target.id;
                var frmData = $("#"+frm).serialize();

                $(mform).find('button').prop('disabled',true);

                $(mform).find('.loader').show();
                
                $('.mensaje').hide();
                $.ajax({
                    url:  'enviarForm.php',
                    data: frmData,
                    type: "POST",
                    cache: false,
                    success: function(response) {
                        
                        $(mform).find('.loader').hide();
                        $(mform).find('button').prop('disabled',false);
                        obj = JSON.parse(response);

                        
                        $("#"+frm).parent().find('.mensaje').html(obj.mensaje).show();

                        if(obj.redirect!='-'){
                            window.location.href=obj.redirect;
                        }
                        if(obj.paso=='2'){
                            $('.boton_anotarse').attr('data-target','#anotarse_paso2_modal');
                            $('#anotarse_modal').modal('hide');
                            $('#anotarse_paso2_modal').modal('show');
                        }
                        
                        if(obj.enviado=='1'){
                            resetForm($('#anotarse_form'));
                            $('.boton_anotarse').attr('data-target','#anotarse_modal');
                            $('#anotarse_modal').modal('hide');
                            $('#anotarse_paso2_modal').modal('hide');
                            $('#email_general').text(obj.email);
                            $('#email_general').attr('href','mailto:'+obj.email);
                            $('#anotarse_final').modal('show');
                        }
                    },
                    error: function() {
                        
                        
                    },
                    
                });
                
                //$('#login').modal('show');
                return false;
            });
        });
        </script> 
    </body>

</html>
