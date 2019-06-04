<?php

    require_once '_db.php';
    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case 'insertar_sal':
                insertar_sal();
            break;
            case 'consultar_sal':
                consultar_sal($_POST["id"]);
            break;
            case 'eliminar_sal':
                eliminar_sal($_POST["id"]);
            break;
            case 'editar_sal':
                editar_rol();
            /*case 'cambiar_sal':
                cambiar_statusRol();
            break;*/
            case 'mostrar_sal':
                mostrar_sal();
            break;
        }
    }

    function insertar_sal(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("salones",[
                                            "sal_num"=>$num,
                                            "sal_cap"=>$cap,
                                            "sal_av"=>$av,
                                            "sal_fa" => date("Y").date("m").date("d")
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
        return;
    }

    function consultar_sal($id){
        global $db;
         $consultar = $db -> get("salones","*",["AND" => [ "sal_id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_sal($id){
        global $db;
        $eliminar = $db->delete("salones",["sal_id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

   function editar_rol(){
        global $db;
        extract($_POST);
         $editar=$db ->update("salones",["sal_num"=>$num,
                                        "sal_cap"=>$cap,
                                        "sal_av"=>$av,
                                      ],["sal_id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        }
    }
    function mostrar_sal(){
                                global $db;
                                $salones = $db->select("salones","*",["AND" => [ "sal_id"=>$id]]);
                                echo json_encode($salones);
    }

//  CHECBOX ESTATUS ANGEL
/*

function cambiar_statusRol(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Roles",["rol_Estatus"=>$status,
                                        ],["rol_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        }
    }
*/
// FUNCIONES DE NIVELES
/*
    function insertar_nivel(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("Niveles",[
                                            "niv_Nombre"=>$nom,
                                            "niv_Descripcion"=>$desc,
                                            "niv_Estatus"=>$est ,
                                            "niv_FechaAlta" => date("Y").date("m").date("d")
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
    }

    function consultar_nivel($id){

        global $db;
         $consultar = $db -> get("Niveles","*", ["AND" =>[ "niv_Id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_nivel($id){
        global $db;

        $eliminar = $db->delete("Niveles",["niv_Id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

    function mostrar_niveles(){

                            global $db;
                            $niveles = $db->select("Niveles","*","");
                            echo json_encode($niveles);

    }

   function editar_nivel(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Niveles",["niv_Nombre"=>$nom,
                                        "niv_Descripcion"=>$desc,
                                        "niv_Estatus"=>$est,
                                        ],["niv_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        }
    }

function cambiar_statusNivel(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Niveles",["niv_Estatus"=>$status,
                                        ],["niv_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        }
    }

*/
?>
