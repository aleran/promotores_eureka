<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");
ini_set('memory_limit', '2000M');
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Reporte de presupuesto");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Reporte de presupuesto");
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$estilo1 = new PHPExcel_Style();
$estilo1->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => '800000')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
$estilo2 = new PHPExcel_Style();
$estilo2->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'DCDCDC')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));

	
//$objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(40); 

$objPHPExcel->getActiveSheet()->getStyle("A3:ZZ3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
//centrar
$estilo = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("G6")->applyFromArray($estilo);

$objPHPExcel->getActiveSheet()->getStyle("A8:ZZ3")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);

//poner imagen
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('../assets/images/logo_eureka.png');

$objPHPExcel->getActiveSheet()->mergeCells('A1:A4');

$objDrawing->setCoordinates('A1');                      
//setOffsetX works properly
$objDrawing->setOffsetX(50); 
$objDrawing->setOffsetY(5);                
//set width, height
$objDrawing->setWidth(200); 
$objDrawing->setHeight(75); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());




$estilo_centrar = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$estilo_negrita = array(
    'font' => array(
        'bold' => true
    )
);
$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');
$objPHPExcel->getActiveSheet()->mergeCells('B5:E5');

$objPHPExcel->getActiveSheet()->getStyle("C3")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($estilo_negrita);

$objPHPExcel->getActiveSheet()->getStyle("B5")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($estilo_negrita);

$sql_periodo="SELECT periodo FROM periodos WHERE id='".$_POST["periodo"]."'";

$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();

$objPHPExcel->getActiveSheet()->SetCellValue("C3", "Eureka Libros SAS");
$objPHPExcel->getActiveSheet()->SetCellValue("B5", "Presupuesto General Periodo: ".$gp_periodo["periodo"]."");



$objPHPExcel->getActiveSheet()->mergeCells('C8:E8');
$objPHPExcel->getActiveSheet()->mergeCells('F8:H8');
$objPHPExcel->getActiveSheet()->mergeCells('I8:K8');
$objPHPExcel->getActiveSheet()->mergeCells('L8:N8');
$objPHPExcel->getActiveSheet()->mergeCells('O8:Q8');
$objPHPExcel->getActiveSheet()->mergeCells('R8:T8');
$objPHPExcel->getActiveSheet()->mergeCells('U8:W8');
$objPHPExcel->getActiveSheet()->mergeCells('X8:Z8');
$objPHPExcel->getActiveSheet()->mergeCells('AA8:AC8');
$objPHPExcel->getActiveSheet()->mergeCells('AD8:AF8');
$objPHPExcel->getActiveSheet()->mergeCells('AG8:AI8');
$objPHPExcel->getActiveSheet()->mergeCells('AJ8:AL8');
$objPHPExcel->getActiveSheet()->mergeCells('AM8:AO8');
$objPHPExcel->getActiveSheet()->mergeCells('AP8:AR8');
$objPHPExcel->getActiveSheet()->mergeCells('AS8:AU8');
$objPHPExcel->getActiveSheet()->mergeCells('AV8:AX8');
$objPHPExcel->getActiveSheet()->mergeCells('AY8:BA8');
$objPHPExcel->getActiveSheet()->mergeCells('BB8:BD8');
$objPHPExcel->getActiveSheet()->mergeCells('BE8:BG8');
$objPHPExcel->getActiveSheet()->mergeCells('BH8:BJ8');
$objPHPExcel->getActiveSheet()->mergeCells('BK8:BM8');
$objPHPExcel->getActiveSheet()->mergeCells('BN8:BP8');
$objPHPExcel->getActiveSheet()->mergeCells('BQ8:BS8');
$objPHPExcel->getActiveSheet()->mergeCells('BT8:BV8');
$objPHPExcel->getActiveSheet()->mergeCells('BW8:BY8');
$objPHPExcel->getActiveSheet()->mergeCells('BZ8:CB8');
$objPHPExcel->getActiveSheet()->mergeCells('CC8:CE8');
$objPHPExcel->getActiveSheet()->mergeCells('CF8:CH8');
$objPHPExcel->getActiveSheet()->mergeCells('CI8:CK8');
$objPHPExcel->getActiveSheet()->mergeCells('CL8:CN8');
$objPHPExcel->getActiveSheet()->mergeCells('CO8:CQ8');
$objPHPExcel->getActiveSheet()->mergeCells('CR8:CT8');
$objPHPExcel->getActiveSheet()->mergeCells('CU8:CW8');
$objPHPExcel->getActiveSheet()->mergeCells('CX8:CZ8');
$objPHPExcel->getActiveSheet()->mergeCells('DA8:DC8');
$objPHPExcel->getActiveSheet()->mergeCells('DD8:DF8');
$objPHPExcel->getActiveSheet()->mergeCells('DG8:DI8');
$objPHPExcel->getActiveSheet()->mergeCells('DJ8:DL8');
$objPHPExcel->getActiveSheet()->mergeCells('DM8:DO8');
$objPHPExcel->getActiveSheet()->mergeCells('DP8:DR8');
$objPHPExcel->getActiveSheet()->mergeCells('DS8:DU8');
$objPHPExcel->getActiveSheet()->mergeCells('DV8:DX8');
$objPHPExcel->getActiveSheet()->mergeCells('DY8:EA8');
$objPHPExcel->getActiveSheet()->mergeCells('EB8:ED8');
$objPHPExcel->getActiveSheet()->mergeCells('EE8:EG8');
$objPHPExcel->getActiveSheet()->mergeCells('EH8:EJ8');
$objPHPExcel->getActiveSheet()->mergeCells('EK8:EM8');
$objPHPExcel->getActiveSheet()->mergeCells('EN8:EP8');
$objPHPExcel->getActiveSheet()->mergeCells('EQ8:ES8');
$objPHPExcel->getActiveSheet()->mergeCells('ET8:EV8');
$objPHPExcel->getActiveSheet()->mergeCells('EW8:EY8');
$objPHPExcel->getActiveSheet()->mergeCells('EZ8:FB8');
$objPHPExcel->getActiveSheet()->mergeCells('FC8:FE8');
$objPHPExcel->getActiveSheet()->mergeCells('FF8:FH8');
$objPHPExcel->getActiveSheet()->mergeCells('FI8:FK8');
$objPHPExcel->getActiveSheet()->mergeCells('FL8:FN8');
$objPHPExcel->getActiveSheet()->mergeCells('FO8:FQ8');
$objPHPExcel->getActiveSheet()->mergeCells('FR8:FT8');
$objPHPExcel->getActiveSheet()->mergeCells('FU8:FW8');
$objPHPExcel->getActiveSheet()->mergeCells('FX8:FZ8');
$objPHPExcel->getActiveSheet()->mergeCells('GA8:GC8');
$objPHPExcel->getActiveSheet()->mergeCells('GD8:GF8');
$objPHPExcel->getActiveSheet()->mergeCells('GG8:GI8');
$objPHPExcel->getActiveSheet()->mergeCells('GJ8:GL8');
$objPHPExcel->getActiveSheet()->mergeCells('GM8:GO8');
$objPHPExcel->getActiveSheet()->mergeCells('GP8:GR8');
$objPHPExcel->getActiveSheet()->mergeCells('GS8:GU8');
$objPHPExcel->getActiveSheet()->mergeCells('GV8:GX8');
$objPHPExcel->getActiveSheet()->mergeCells('GY8:HA8');
$objPHPExcel->getActiveSheet()->mergeCells('HB8:HD8');
$objPHPExcel->getActiveSheet()->mergeCells('HE8:HG8');
$objPHPExcel->getActiveSheet()->mergeCells('HH8:HJ8');
$objPHPExcel->getActiveSheet()->mergeCells('HK8:HM8');
$objPHPExcel->getActiveSheet()->mergeCells('HN8:HP8');
$objPHPExcel->getActiveSheet()->mergeCells('HQ8:HS8');
$objPHPExcel->getActiveSheet()->mergeCells('HT8:HV8');
$objPHPExcel->getActiveSheet()->mergeCells('HW8:HY8');
$objPHPExcel->getActiveSheet()->mergeCells('HZ8:IB8');
$objPHPExcel->getActiveSheet()->mergeCells('IC8:IE8');
$objPHPExcel->getActiveSheet()->mergeCells('IF8:IH8');
$objPHPExcel->getActiveSheet()->mergeCells('II8:IK8');
$objPHPExcel->getActiveSheet()->mergeCells('IL8:IN8');
$objPHPExcel->getActiveSheet()->mergeCells('IO8:IQ8');
$objPHPExcel->getActiveSheet()->mergeCells('IR8:IT8');
$objPHPExcel->getActiveSheet()->mergeCells('IU8:IW8');
$objPHPExcel->getActiveSheet()->mergeCells('IX8:IZ8');
$objPHPExcel->getActiveSheet()->mergeCells('JA8:JC8');
$objPHPExcel->getActiveSheet()->mergeCells('JD8:JF8');
$objPHPExcel->getActiveSheet()->mergeCells('JG8:JI8');
$objPHPExcel->getActiveSheet()->mergeCells('JJ8:JL8');
$objPHPExcel->getActiveSheet()->mergeCells('JM8:JO8');
$objPHPExcel->getActiveSheet()->mergeCells('JP8:JR8');
$objPHPExcel->getActiveSheet()->mergeCells('JS8:JU8');
$objPHPExcel->getActiveSheet()->mergeCells('JV8:JX8');
$objPHPExcel->getActiveSheet()->mergeCells('JY8:KA8');
$objPHPExcel->getActiveSheet()->mergeCells('KB8:KD8');
$objPHPExcel->getActiveSheet()->mergeCells('KE8:KG8');
$objPHPExcel->getActiveSheet()->mergeCells('KH8:KJ8');
$objPHPExcel->getActiveSheet()->mergeCells('KK8:KM8');
$objPHPExcel->getActiveSheet()->mergeCells('KN8:KP8');
$objPHPExcel->getActiveSheet()->mergeCells('KQ8:KS8');
$objPHPExcel->getActiveSheet()->mergeCells('KT8:KV8');
$objPHPExcel->getActiveSheet()->mergeCells('KW8:KY8');
$objPHPExcel->getActiveSheet()->mergeCells('KZ8:LB8');
$objPHPExcel->getActiveSheet()->mergeCells('LC8:LE8');
$objPHPExcel->getActiveSheet()->mergeCells('LF8:LH8');
$objPHPExcel->getActiveSheet()->mergeCells('LI8:LK8');
$objPHPExcel->getActiveSheet()->mergeCells('LL8:LN8');
$objPHPExcel->getActiveSheet()->mergeCells('LO8:LQ8');
$objPHPExcel->getActiveSheet()->mergeCells('LR8:LT8');
$objPHPExcel->getActiveSheet()->mergeCells('LU8:LW8');
$objPHPExcel->getActiveSheet()->mergeCells('LX8:LZ8');
$objPHPExcel->getActiveSheet()->mergeCells('MA8:MC8');
$objPHPExcel->getActiveSheet()->mergeCells('MD8:MF8');
$objPHPExcel->getActiveSheet()->mergeCells('MG8:MI8');
$objPHPExcel->getActiveSheet()->mergeCells('MJ8:ML8');
$objPHPExcel->getActiveSheet()->mergeCells('MM8:MO8');
$objPHPExcel->getActiveSheet()->mergeCells('MP8:MR8');
$objPHPExcel->getActiveSheet()->mergeCells('MS8:MU8');
$objPHPExcel->getActiveSheet()->mergeCells('MV8:MX8');
$objPHPExcel->getActiveSheet()->mergeCells('MY8:NA8');
$objPHPExcel->getActiveSheet()->mergeCells('NB8:ND8');
$objPHPExcel->getActiveSheet()->mergeCells('NE8:NG8');
$objPHPExcel->getActiveSheet()->mergeCells('NH8:NJ8');
$objPHPExcel->getActiveSheet()->mergeCells('NK8:NM8');
$objPHPExcel->getActiveSheet()->mergeCells('NN8:NP8');
$objPHPExcel->getActiveSheet()->mergeCells('NQ8:NS8');
$objPHPExcel->getActiveSheet()->mergeCells('NT8:NV8');
$objPHPExcel->getActiveSheet()->mergeCells('NW8:NY8');
$objPHPExcel->getActiveSheet()->mergeCells('NZ8:OB8');
$objPHPExcel->getActiveSheet()->mergeCells('OC8:OE8');
$objPHPExcel->getActiveSheet()->mergeCells('OF8:OH8');
$objPHPExcel->getActiveSheet()->mergeCells('OI8:OK8');
$objPHPExcel->getActiveSheet()->mergeCells('OL8:ON8');
$objPHPExcel->getActiveSheet()->mergeCells('OO8:OQ8');
$objPHPExcel->getActiveSheet()->mergeCells('OR8:OT8');
$objPHPExcel->getActiveSheet()->mergeCells('OU8:OW8');
$objPHPExcel->getActiveSheet()->mergeCells('OX8:OZ8');
$objPHPExcel->getActiveSheet()->mergeCells('PA8:PC8');
$objPHPExcel->getActiveSheet()->mergeCells('PD8:PF8');
$objPHPExcel->getActiveSheet()->mergeCells('PG8:PI8');
$objPHPExcel->getActiveSheet()->mergeCells('PJ8:PL8');
$objPHPExcel->getActiveSheet()->mergeCells('PM8:PO8');
$objPHPExcel->getActiveSheet()->mergeCells('PP8:PR8');
$objPHPExcel->getActiveSheet()->mergeCells('PS8:PU8');
$objPHPExcel->getActiveSheet()->mergeCells('PV8:PX8');
$objPHPExcel->getActiveSheet()->mergeCells('PY8:QA8');
$objPHPExcel->getActiveSheet()->mergeCells('QB8:QD8');
$objPHPExcel->getActiveSheet()->mergeCells('QE8:QG8');
$objPHPExcel->getActiveSheet()->mergeCells('QH8:QJ8');
$objPHPExcel->getActiveSheet()->mergeCells('QK8:QM8');
$objPHPExcel->getActiveSheet()->mergeCells('QN8:QP8');
$objPHPExcel->getActiveSheet()->mergeCells('QQ8:QS8');
$objPHPExcel->getActiveSheet()->mergeCells('QT8:QV8');
$objPHPExcel->getActiveSheet()->mergeCells('QW8:QY8');
$objPHPExcel->getActiveSheet()->mergeCells('QZ8:RB8');
$objPHPExcel->getActiveSheet()->mergeCells('RC8:RE8');
$objPHPExcel->getActiveSheet()->mergeCells('RF8:RH8');
$objPHPExcel->getActiveSheet()->mergeCells('RI8:RK8');
$objPHPExcel->getActiveSheet()->mergeCells('RL8:RN8');
$objPHPExcel->getActiveSheet()->mergeCells('RO8:RQ8');
$objPHPExcel->getActiveSheet()->mergeCells('RR8:RT8');
$objPHPExcel->getActiveSheet()->mergeCells('RU8:RW8');
$objPHPExcel->getActiveSheet()->mergeCells('RX8:RZ8');
$objPHPExcel->getActiveSheet()->mergeCells('SA8:SC8');
$objPHPExcel->getActiveSheet()->mergeCells('SD8:SF8');
$objPHPExcel->getActiveSheet()->mergeCells('SG8:SI8');
$objPHPExcel->getActiveSheet()->mergeCells('SJ8:SL8');
$objPHPExcel->getActiveSheet()->mergeCells('SM8:SO8');
$objPHPExcel->getActiveSheet()->mergeCells('SP8:SR8');
$objPHPExcel->getActiveSheet()->mergeCells('SS8:SU8');
$objPHPExcel->getActiveSheet()->mergeCells('SV8:SX8');
$objPHPExcel->getActiveSheet()->mergeCells('SY8:TA8');
$objPHPExcel->getActiveSheet()->mergeCells('TB8:TD8');
$objPHPExcel->getActiveSheet()->mergeCells('TE8:TG8');
$objPHPExcel->getActiveSheet()->mergeCells('TH8:TJ8');
$objPHPExcel->getActiveSheet()->mergeCells('TK8:TM8');
$objPHPExcel->getActiveSheet()->mergeCells('TN8:TP8');
$objPHPExcel->getActiveSheet()->mergeCells('TQ8:TS8');
$objPHPExcel->getActiveSheet()->mergeCells('TT8:TV8');
$objPHPExcel->getActiveSheet()->mergeCells('TW8:TY8');
$objPHPExcel->getActiveSheet()->mergeCells('TZ8:UB8');
$objPHPExcel->getActiveSheet()->mergeCells('UC8:UE8');
$objPHPExcel->getActiveSheet()->mergeCells('UF8:UH8');
$objPHPExcel->getActiveSheet()->mergeCells('UI8:UK8');
$objPHPExcel->getActiveSheet()->mergeCells('UL8:UN8');
$objPHPExcel->getActiveSheet()->mergeCells('UO8:UQ8');
$objPHPExcel->getActiveSheet()->mergeCells('UR8:UT8');
$objPHPExcel->getActiveSheet()->mergeCells('UU8:UW8');
$objPHPExcel->getActiveSheet()->mergeCells('UX8:UZ8');
$objPHPExcel->getActiveSheet()->mergeCells('VA8:VC8');
$objPHPExcel->getActiveSheet()->mergeCells('VD8:VF8');
$objPHPExcel->getActiveSheet()->mergeCells('VG8:VI8');
$objPHPExcel->getActiveSheet()->mergeCells('VJ8:VL8');
$objPHPExcel->getActiveSheet()->mergeCells('VM8:VO8');
$objPHPExcel->getActiveSheet()->mergeCells('VP8:VR8');
$objPHPExcel->getActiveSheet()->mergeCells('VS8:VU8');
$objPHPExcel->getActiveSheet()->mergeCells('VV8:VX8');
$objPHPExcel->getActiveSheet()->mergeCells('VY8:WA8');
$objPHPExcel->getActiveSheet()->mergeCells('WB8:WD8');
$objPHPExcel->getActiveSheet()->mergeCells('WE8:WG8');
$objPHPExcel->getActiveSheet()->mergeCells('WH8:WJ8');
$objPHPExcel->getActiveSheet()->mergeCells('WK8:WM8');
$objPHPExcel->getActiveSheet()->mergeCells('WN8:WP8');
$objPHPExcel->getActiveSheet()->mergeCells('WQ8:WS8');
$objPHPExcel->getActiveSheet()->mergeCells('WT8:WV8');
$objPHPExcel->getActiveSheet()->mergeCells('WW8:WY8');
$objPHPExcel->getActiveSheet()->mergeCells('WZ8:XB8');
$objPHPExcel->getActiveSheet()->mergeCells('XC8:XE8');
$objPHPExcel->getActiveSheet()->mergeCells('XF8:XH8');
$objPHPExcel->getActiveSheet()->mergeCells('XI8:XK8');
$objPHPExcel->getActiveSheet()->mergeCells('XL8:XN8');
$objPHPExcel->getActiveSheet()->mergeCells('XO8:XQ8');
$objPHPExcel->getActiveSheet()->mergeCells('XR8:XT8');
$objPHPExcel->getActiveSheet()->mergeCells('XU8:XW8');
$objPHPExcel->getActiveSheet()->mergeCells('XX8:XZ8');
$objPHPExcel->getActiveSheet()->mergeCells('YA8:YC8');
$objPHPExcel->getActiveSheet()->mergeCells('YD8:YF8');
$objPHPExcel->getActiveSheet()->mergeCells('YG8:YI8');
$objPHPExcel->getActiveSheet()->mergeCells('YJ8:YL8');
$objPHPExcel->getActiveSheet()->mergeCells('YM8:YO8');
$objPHPExcel->getActiveSheet()->mergeCells('YP8:YR8');
$objPHPExcel->getActiveSheet()->mergeCells('YS8:YU8');
$objPHPExcel->getActiveSheet()->mergeCells('YV8:YX8');
$objPHPExcel->getActiveSheet()->mergeCells('YY8:ZA8');
$objPHPExcel->getActiveSheet()->mergeCells('ZB8:ZD8');
$objPHPExcel->getActiveSheet()->mergeCells('ZE8:ZG8');
$objPHPExcel->getActiveSheet()->mergeCells('ZH8:ZJ8');
$objPHPExcel->getActiveSheet()->mergeCells('ZK8:ZM8');
$objPHPExcel->getActiveSheet()->mergeCells('ZN8:ZP8');
$objPHPExcel->getActiveSheet()->mergeCells('ZQ8:ZS8');
$objPHPExcel->getActiveSheet()->mergeCells('ZT8:ZV8');
$objPHPExcel->getActiveSheet()->mergeCells('ZW8:ZY8');




$estilo_centrar = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("C8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("F8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("I8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("L8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("O8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("R8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("U8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("X8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("AY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("BZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("CX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("DY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ET8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("EZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("FX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("GY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("HZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("II8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("IX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("JY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("KZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("LX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("MY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("NZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("OX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("PY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("Q8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("QZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("RX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("SY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("TZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("UX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("VY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("WZ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XC8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XF8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XI8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XL8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XO8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XR8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XU8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("XX8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YA8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YD8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YG8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YJ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YM8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YP8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YS8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("YY8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZB8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZE8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZH8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZK8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZN8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZQ8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZT8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZW8")->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle("ZZ8")->applyFromArray($estilo_centrar);







$cols=["A","B","C","F","I","L","O","R","U","X","AA","AD","AG","AJ","AM","AP","AS","AV","AY","BB","BE","BH","BK","BN","BQ","BT","BW","BZ","CC","CF","CI","CL","CO","CR","CU","CX","DA","DD","DG","DJ","DM","DP","DS","DV","DY","EB","EE","EH","EK","EN","EQ","ET","EW","EZ","FC","FF","FI","FL","FO","FR","FU","FX","GA","GD","GG","GJ","GM","GP","GS","GV","GY","HB","HE","HH","HK","HN","HQ","HT","HW","HZ","IC","IF","II","IL","IO","IR","IU","IX","JA","JD","JG","JJ","JM","JP","JS","JV","JY","KB","KE","KH","KK","KN","KQ","KT","KW","KZ","LC","LF","LI","LL","LO","LR","LU","LX","MA","MD","MG","MJ","MM","MP","MS","MV","MY","NB","NE","NH","NK","NN","NQ","NT","NW","NZ","OC","OF","OI","OL","OO","OR","OU","OX","PA","PD","PG","PJ","PM","PP","PS","PV","PY","QB","QE","QH","QK","QN","QQ","QT","QW","QZ","RC","RF","RI","RL","RO","RR","RU","RX","SA","SD","SG","SJ","SM","SP","SS","SV","SY","TB","TE","TH","TK","TN","TQ","TT","TW","TZ","UC","UF","UI","UL","UO","UR","UU","UX","VA","VD","VG","VJ","VM","VP","VS","VV","VY","WB","WE","WH","WK","WN","WQ","WT","WW","WZ","XC","XF","XI","XL","XO","XR","XU","XX","YA","YD","YG","YJ","YM","YP","YS","YV","YY","ZB","ZE","ZH","ZK","ZN","ZQ","ZT","ZW","ZZ"];

$cols2=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN","DO","DP","DQ","DR","DS","DT","DU","DV","DW","DX","DY","DZ","EA","EB","EC","ED","EE","EF","EG","EH","EI","EJ","EK","EL","EM","EN","EO","EP","EQ","ER","ES","ET","EU","EV","EW","EX","EY","EZ","FA","FB","FC","FD","FE","FF","FG","FH","FI","FJ","FK","FL","FM","FN","FO","FP","FQ","FR","FS","FT","FU","FV","FW","FX","FY","FZ","GA","GB","GC","GD","GE","GF","GG","GH","GI","GJ","GK","GL","GM","GN","GO","GP","GQ","GR","GS","GT","GU","GV","GW","GX","GY","GZ","HA","HB","HC","HD","HE","HF","HG","HH","HI","HJ","HK","HL","HM","HN","HO","HP","HQ","HR","HS","HT","HU","HV","HW","HX","HY","HZ","IA","IB","IC","ID","IE","IF","IG","IH","II","IJ","IK","IL","IM","IN","IO","IP","IQ","IR","IS","IT","IU","IV","IW","IX","IY","IZ","JA","JB","JC","JD","JE","JF","JG","JH","JI","JJ","JK","JL","JM","JN","JO","JP","JQ","JR","JS","JT","JU","JV","JW","JX","JY","JZ","KA","KB","KC","KD","KE","KF","KG","KH","KI","KJ","KK","KL","KM","KN","KO","KP","KQ","KR","KS","KT","UK","VK","KW","KX","KY","KZ","LA","LB","LC","LD","LE","LF","LG","LH","LI","LJ","LK","LL","LM","LN","LO","LP","LQ","LR","LS","LT","LU","LV","LW","LX","LY","LZ","MA","MB","MC","MD","ME","MF","MG","MH","MI","MJ","MK","ML","MM","MN","MO","MP","MQ","MR","MS","MT","MU","MV",",W","MX","MY","MZ","NA","NB","NC","ND","NE","NF","NG","NH","NI","NJ","NK","NL","NM","NN","ON","NP","NQ","NR","NS","NT","NU","NV","NW","NX","NY","NZ","OA","OB","OC","OD","OE","OF","OG","OH","OI","OJ","OK","OL","OM","ON","OO","OP","OQ","OR","OS","OT","OU","OV","OW","OX","OY","OZ","PA","PB","PC","PD","PE","PF","PG","PH","PI","PJ","PK","PL","PM","PN","PO","PP","PQ","PR","PS","PT","PU","PV","PW","PX","PY","PZ","QA","QB","QC","QD","QE","QF","QG","QH","QI","QJ","QK","QL","QM","QN","QO","QP","QQ","QR","QS","QT","QU","QV","QW","QX","QY","QZ","RA","RB","RC","RD","RE","RF","RG","RH","RI","RJ","RK","RL","RM","RN","RO","RP","RQ","RR","RS","RT","RU","RV","RW","RX","RY","RZ","SA","SB","SC","SD","SE","SF","SG","SH","SI","SJ","SK","SL","SM","SN","SO","SP","SQ","SR","SS","ST","SU","SV","SW","SX","SY","SZ","TA","TB","TC","TD","TE","TF","TG","TH","TI","TJ","TK","TL","TM","TN","TO","TP","TQ","TR","TS","TT","TU","TV","TW","TX","TY","TZ","UA","UB","UC","UD","UE","UF","UG","UH","UI","UJ","UK","UL","UM","UN","UO","UP","UQ","UR","US","UT","UU","UV","UW","UX","UY","UZ","VA","VB","VC","VD","VE","VF","VG","VH","VI","VJ","VK","VL","VM","VN","VO","VP","VQ","VR","VS","VT","VU","VV","VW","VX","VY","VZ","WA","WB","WC","WD","WE","WF","WG","WH","WI","WJ","WK","WL","WM","WN","WO","WP","WQ","WR","WS","WT","WU","WV","WW","WX","WY","WZ","XA","XB","XC","XD","XE","XF","XG","XH","XI","XJ","XK","XL","XM","XN","XO","XP","XQ","XR","XS","XT","XU","XV","XW","XX","XY","XZ","YA","YB","YC","YD","YE","YF","YG","YH","YI","YJ","YK","YL","YM","YN","YO","YP","YQ","YR","YS","YT","YU","YV","YW","YX","YY","YZ","ZA","ZB","ZC","ZD","ZE","ZF","ZG","ZH","ZI","ZJ","ZK","ZL","ZM","ZN","ZO","ZP","ZQ","ZR","ZS","ZT","ZU","ZV","ZW","ZX","ZY","ZZ"];





$sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado, p.precio, p.tasa_compra, p.descuento, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='".$_POST["periodo"]."' AND p.aprobado=1";
	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();


foreach($presupuestos as $presupuesto) {
	$col=$presupuesto["columna"];

	$sq_gp = "SELECT  alumnos FROM grados_paralelos WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_grado='".$presupuesto["id_grado"]."' AND id_periodo='".$_POST["periodo"]."'";
														
		$req_gp = $bdd->prepare($sq_gp);
		$req_gp->execute();
		$gp = $req_gp->fetch();
		
		$tasa_c= $presupuesto["tasa_compra"] * 100;
		$alumnos_tasa= floor($gp["alumnos"] * $presupuesto["tasa_compra"]);

		

				$conta_cols3 = array_search($cols[$presupuesto["fila"]], $cols2);
				$conta_cols3 =$conta_cols3 +1;
				$conta_cols4 =$conta_cols3 +1;
				
				
		$objPHPExcel->getActiveSheet()->SetCellValue($cols[$presupuesto["fila"]].$presupuesto["columna"], "$gp[alumnos]");

		$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols3].$presupuesto["columna"], "$tasa_c");

		$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4].$presupuesto["columna"], "$alumnos_tasa");

							
								
		
		

}
$objPHPExcel->getActiveSheet()->getStyle('A9')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($estilo_negrita);
$objPHPExcel->getActiveSheet()->getStyle('A9')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($estilo_centrar);
$objPHPExcel->getActiveSheet()->SetCellValue("A9", "Tílulo");
$objPHPExcel->getActiveSheet()->SetCellValue("B9", "PVP");

$sql = "SELECT id, libro, precio, columna, id_grado, id_materia FROM libros ORDER BY id_materia";

$req = $bdd->prepare($sql);
$req->execute();
$libros = $req->fetchAll();

foreach ($libros as $libro) {

	$n_col=$libro["columna"];

	$sq_gp = "SELECT SUM(alumnos) as total_poblacion, AVG(descuento) as prom_descuento, SUM(floor(alumnos * tasa_compra)) as p_neta, p.precio * SUM(floor(alumnos * tasa_compra)) as total_venta FROM grados_paralelos a JOIN presupuestos p ON a.id_colegio=p.id_colegio WHERE p.id_libro='".$libro["id"]."' AND p.id_periodo='".$_POST["periodo"]."' AND a.id_periodo='".$_POST["periodo"]."' AND a.id_grado='".$libro["id_grado"]."' AND p.aprobado='1'";
														
	$req_gp = $bdd->prepare($sq_gp);
	$req_gp->execute();
	$total_poblacion = $req_gp->fetch();

	$prom_descuento=$total_poblacion["prom_descuento"] *100;
	$prom_descuento=number_format($prom_descuento,2);

	$poblacion_neta = $req->fetch();
	$poblacion_neta=floor($total_poblacion["p_neta"]);


		if ($libro["id_grado"] == 50 ) {

			$objPHPExcel->getActiveSheet()->getStyle('A'.$n_col)->applyFromArray($estilo_centrar);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$n_col)->applyFromArray($estilo_negrita);
			$objPHPExcel->getActiveSheet()->SetCellValue("A$n_col", "$libro[libro]");
		}
		else if ($libro["id_grado"] == 51 ) {
			$objPHPExcel->getActiveSheet()->getStyle('A'.$n_col)->applyFromArray($estilo_centrar);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$n_col)->applyFromArray($estilo_negrita);
			$objPHPExcel->getActiveSheet()->SetCellValue("A$n_col", "$libro[libro]");

		}
		else {

			$objPHPExcel->getActiveSheet()->SetCellValue("A$n_col", "$libro[libro]");
			$objPHPExcel->getActiveSheet()->SetCellValue("B$n_col", "$libro[precio]");
			$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+1].$n_col, "$total_poblacion[total_poblacion]");

			$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+2].$n_col, "$poblacion_neta");
			$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+3].$n_col, "$prom_descuento");
			$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+4].$n_col, "$total_poblacion[total_venta]");

		}
	
	

}


$sql = "SELECT c.id, c.colegio, p.fila FROM presupuestos p JOIN colegios c ON c.id=p.id_colegio WHERE p.id_periodo='".$_POST["periodo"]."' AND p.aprobado=1 GROUP BY c.id ORDER BY p.fila";
	$req = $bdd->prepare($sql);
	$req->execute();
	$colegios = $req->fetchAll();

$conta_cols=2;

$color=1;
foreach($colegios as $colegio) {

		$conta_cols2=$colegio["fila"];
		$conta_cols3 = array_search($cols[$colegio["fila"]], $cols2);
		$conta_cols3 = $conta_cols3 +1;
		$conta_cols4 = $conta_cols3 +1;

	if ($color % 2 !=0){

		$objPHPExcel->getActiveSheet()->getStyle($cols[$colegio["fila"]]."8")->applyFromArray(
		    array(
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => '62F261')
		        )
		    )
		);

		$objPHPExcel->getActiveSheet()->getStyle($cols[$conta_cols2]."9".":".$cols2[$conta_cols4]."9")->applyFromArray(
		    array(
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => '80F47F')
		        )
		    )
		);

	}
		$color++;

		$objPHPExcel->getActiveSheet()->SetCellValue($cols[$colegio["fila"]]."8", "$colegio[colegio]$colegio[fila]");

		$objPHPExcel->getActiveSheet()->SetCellValue($cols[$conta_cols2]."9", "Población");
		$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols3]."9", "% Compra");
		$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4]."9", "Neto");


	//}
	
}

	$objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols4+1]."9".":".$cols2[$conta_cols4+4]."9")->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '01F400')
        )
    )
);

$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+1]."9", "Total población");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+2]."9", "Neto");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+3]."9", "Promedio % descuento");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4+4]."9", "Valor");





foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto.xlsx"');
$objWriter->save('php://output');




?>