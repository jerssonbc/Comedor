<?php

include "../fpdf/fpdf.php";
include "../modelo/modeloConexion.php";

$codigo=$_REQUEST["codigo"];
//include "fpdf/mc_table.php";
//MakeFont('fpdf/font/calligra.ttf','cp1252');
class  MiPDF extends FPDF {
        
        public function Header(){
            
       
        }

    
}

$conexion = Conexion_Model::getConexion();
$consultaSql="SELECT u.id,u.usuario,c.dni,concat(c.ape_paterno,' ',c.ape_maerno),c.nombre,c.codigo_comensal,c.id from usuarios u inner join comensales c 
                                on u.id_comensal=c.id where u.estado=1 and u.id_comensal is not null and u.id=".$codigo." ";
        $result = mysql_query($consultaSql);
        if($result){
            $row=mysql_fetch_row($result);
            $img=$row[0];
            $apellidos=$row[3];
            $nombre=$row[4];
            $codigoComensal=$row[5];
            $link_photo_car = "../uploads/".$row[0].".png";
                  
                if (file_exists("../uploads/".$row[0].".png")) 
                { 
                    $show_path_photo_car = $link_photo_car;
                    //$tipo="PNG"; // Photo unavailable 
                    $mTmpFile = $link_photo_car;
                    $mTipo = exif_imagetype($mTmpFile);
                    if (($mTipo == IMAGETYPE_JPEG)){
                        $tipo="JPG";
                    }else{
                        $tipo="PNG";
                    }
                } 
                else 
                { 
                    $show_path_photo_car ="../uploads/imgdefecto.png";
                    $tipo='JPG';
                }   

        }

$mipdf = new MiPDF('L','mm','A4');
$mipdf -> addPage();
        $mipdf -> Image('../img/untm1.png', 25,7, 60 ,40);
        $mipdf -> SetFont( 'Arial' , 'B' , 13);
        $mipdf -> Cell(70,5,"COMEDOR UNIVERSITARIO",0,0,'C');
        $tipos='../uploads/'.$img.'.png';                                 
        $mipdf -> Image($show_path_photo_car, 5,10, 25 ,30,$tipo);
        $tipos='../img/unt.png';                                 
        $mipdf -> Image( $tipos , 65,3, 16 ,18);
        $mipdf -> Image( $tipos , 200 , 100, 100 , 100);
        $mipdf -> Ln(0);
        
        
         $mipdf -> Ln(10);
        $mipdf -> SetFont( 'Arial' , 'B' , 10);
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> Cell(50,5,"APELLIDOS:",0,1,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 8);
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> Cell(50,5,utf8_decode($apellidos),0,1,'L');
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 10);
        $mipdf -> Cell(50,5,"NOMBRES:",0,1,'L');
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 8);
        $mipdf -> Cell(50,5,utf8_decode($nombre),0,1,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 10);
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> Cell(50,5,"CODIGO:",0,1,'L');
        $mipdf -> Cell(30,5,"",0,0,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 8);
        $mipdf -> Cell(50,5,$codigoComensal,0,1,'L');
        $mipdf -> SetFont( 'Arial' , 'B' , 8);
        $mipdf -> Ln(2);
        $mipdf -> SetFillColor ( 51 , 135 , 215 );   
        $mipdf -> Cell(80,6,"         UNIVERSIDAD NACIONAL DE TRUJILLO",0,1,'L',true);
        
 

$mipdf -> Output();


?>
