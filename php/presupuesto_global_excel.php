<?php
require_once("../php/aut.php");
include("../conexion/bdd.php");
include("../lib/PHPExcel.php");


ini_set('memory_limit', '20000M');
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

$estilo_totales= array(
  'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '769EF2')
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



$estilo_centrar = array( 
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );




$cols=["A","B","C","I","O","U","AA","AG","AM","AS","AY","BE","BK","BQ","BW","CC","CI","CO","CU","DA","DG","DM","DS","DY","EE","EK","EQ","EW","FC","FI","FO","FU","GA","GG","GM","GS","GY","HE","HK","HQ","HW","IC","II","IO","IU","JA","JG","JM","JS","JY","KE","KK","KQ","KW","LC","LI","LO","LU","MA","MG","MM","MS","MY","NE","NK","NQ","NW","OC","OI","OO","OU","PA","PG","PM","PS","PY","QE","QK","QQ","QW","RC","RI","RO","RU","SA","SG","SM","SS","SY","TE","TK","TQ","TW","UC","UI","UO","UU","VA","VG","VM","VS","VY","WE","WK","WQ","WW","XC","XI","XO","XU","YA","YG","YM","YS","YY","ZE","ZK","ZQ","ZW","AAC","AAI","AAO","AAU","ABA","ABG","ABM","ABS","ABY","ACE","ACK","ACQ","ACW","ADC","ADI","ADO","ADU","AEA","AEG","AEM","AES","AEY","AFE","AFK","AFQ","AFW","AGC","AGI","AGO","AGU","AHA","AHG","AHM","AHS","AHY","AIE","AIK","AIQ","AIW","AJC","AJI","AJO","AJU","AKA","AKG","AKM","AKS","AKY","ALE","ALK","ALQ","ALW","AMC","AMI","AMO","AMU","ANA","ANG","ANM","ANS","ANY","AOE","AOK","AOQ","AOW","APC","API","APO","APU","AQA","AQG","AQM","AQS","AQY","ARE","ARK","ARQ","ARW","ASC","ASI","ASO","ASU","ATA","ATG","ATM","ATS","ATY","AUE","AUK","AUQ","AUW","AVC","AVI","AVO","AVU","AWA","AWG","AWM","AWS","AWY","AXE","AXK","AXQ","AXW","AYC","AYI","AYO","AYU","AZA","AZG","AZM","AZS","AZY","BAE","BAK","BAQ","BAW","BBC","BBI","BBO","BBU","BCA","BCG","BCM","BCS","BCY"];

$cols2=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN","DO","DP","DQ","DR","DS","DT","DU","DV","DW","DX","DY","DZ","EA","EB","EC","ED","EE","EF","EG","EH","EI","EJ","EK","EL","EM","EN","EO","EP","EQ","ER","ES","ET","EU","EV","EW","EX","EY","EZ","FA","FB","FC","FD","FE","FF","FG","FH","FI","FJ","FK","FL","FM","FN","FO","FP","FQ","FR","FS","FT","FU","FV","FW","FX","FY","FZ","GA","GB","GC","GD","GE","GF","GG","GH","GI","GJ","GK","GL","GM","GN","GO","GP","GQ","GR","GS","GT","GU","GV","GW","GX","GY","GZ","HA","HB","HC","HD","HE","HF","HG","HH","HI","HJ","HK","HL","HM","HN","HO","HP","HQ","HR","HS","HT","HU","HV","HW","HX","HY","HZ","IA","IB","IC","ID","IE","IF","IG","IH","II","IJ","IK","IL","IM","IN","IO","IP","IQ","IR","IS","IT","IU","IV","IW","IX","IY","IZ","JA","JB","JC","JD","JE","JF","JG","JH","JI","JJ","JK","JL","JM","JN","JO","JP","JQ","JR","JS","JT","JU","JV","JW","JX","JY","JZ","KA","KB","KC","KD","KE","KF","KG","KH","KI","KJ","KK","KL","KM","KN","KO","KP","KQ","KR","KS","KT","UK","VK","KW","KX","KY","KZ","LA","LB","LC","LD","LE","LF","LG","LH","LI","LJ","LK","LL","LM","LN","LO","LP","LQ","LR","LS","LT","LU","LV","LW","LX","LY","LZ","MA","MB","MC","MD","ME","MF","MG","MH","MI","MJ","MK","ML","MM","MN","MO","MP","MQ","MR","MS","MT","MU","MV",",W","MX","MY","MZ","NA","NB","NC","ND","NE","NF","NG","NH","NI","NJ","NK","NL","NM","NN","ON","NP","NQ","NR","NS","NT","NU","NV","NW","NX","NY","NZ","OA","OB","OC","OD","OE","OF","OG","OH","OI","OJ","OK","OL","OM","ON","OO","OP","OQ","OR","OS","OT","OU","OV","OW","OX","OY","OZ","PA","PB","PC","PD","PE","PF","PG","PH","PI","PJ","PK","PL","PM","PN","PO","PP","PQ","PR","PS","PT","PU","PV","PW","PX","PY","PZ","QA","QB","QC","QD","QE","QF","QG","QH","QI","QJ","QK","QL","QM","QN","QO","QP","QQ","QR","QS","QT","QU","QV","QW","QX","QY","QZ","RA","RB","RC","RD","RE","RF","RG","RH","RI","RJ","RK","RL","RM","RN","RO","RP","RQ","RR","RS","RT","RU","RV","RW","RX","RY","RZ","SA","SB","SC","SD","SE","SF","SG","SH","SI","SJ","SK","SL","SM","SN","SO","SP","SQ","SR","SS","ST","SU","SV","SW","SX","SY","SZ","TA","TB","TC","TD","TE","TF","TG","TH","TI","TJ","TK","TL","TM","TN","TO","TP","TQ","TR","TS","TT","TU","TV","TW","TX","TY","TZ","UA","UB","UC","UD","UE","UF","UG","UH","UI","UJ","UK","UL","UM","UN","UO","UP","UQ","UR","US","UT","UU","UV","UW","UX","UY","UZ","VA","VB","VC","VD","VE","VF","VG","VH","VI","VJ","VK","VL","VM","VN","VO","VP","VQ","VR","VS","VT","VU","VV","VW","VX","VY","VZ","WA","WB","WC","WD","WE","WF","WG","WH","WI","WJ","WK","WL","WM","WN","WO","WP","WQ","WR","WS","WT","WU","WV","WW","WX","WY","WZ","XA","XB","XC","XD","XE","XF","XG","XH","XI","XJ","XK","XL","XM","XN","XO","XP","XQ","XR","XS","XT","XU","XV","XW","XX","XY","XZ","YA","YB","YC","YD","YE","YF","YG","YH","YI","YJ","YK","YL","YM","YN","YO","YP","YQ","YR","YS","YT","YU","YV","YW","YX","YY","YZ","ZA","ZB","ZC","ZD","ZE","ZF","ZG","ZH","ZI","ZJ","ZK","ZL","ZM","ZN","ZO","ZP","ZQ","ZR","ZS","ZT","ZU","ZV","ZW","ZX","ZY","ZZ","AAA","AAB","AAC","AAD","AAE","AAF","AAG","AAH","AAI","AAJ","AAK","AAL","AAM","AAN","AAO","AAP","AAQ","AAR","AAS","AAT","AAU","AAV","AAW","AAX","AAY","AAZ","ABA","ABB","ABC","ABD","ABE","ABF","ABG","ABH","ABI","ABJ","ABK","ABL","ABM","ABN","ABO","ABP","ABQ","ABR","ABS","ABT","ABU","ABV","ABW","ABX","ABY","ABZ","ACA","ACB","ACC","ACD","ACE","ACF","ACG","ACH","ACI","ACJ","ACK","ACL","ACM","ACN","ACO","ACP","ACQ","ACR","ACS","ACT","ACU","ACV","ACW","ACX","ACY","ACZ","ADA","ADB","ADC","ADD","ADE","ADF","ADG","ADH","ADI","ADJ","ADK","ADL","ADM","ADN","ADO","ADP","ADQ","ADR","ADS","ADT","ADU","ADV","ADW","ADX","ADY","ADZ","AEA","AEB","AEC","AED","AEE","AEF","AEG","AEH","AEI","AEJ","AEK","AEL","AEM","AEN","AEO","AEP","AEQ","AER","AES","AET","AEU","AEV","AEW","AEX","AEY","AEZ","AFA","AFB","AFC","AFD","AFE","AFF","AFG","AFH","AFI","AFJ","AFK","AFL","AFM","AFN","AFO","AFP","AFQ","AFR","AFS","AFT","AFU","AFV","AFW","AFX","AFY","AFZ","AGA","AGB","AGC","AGD","AGE","AGF","AGG","AGH","AGI","AGJ","AGK","AGL","AGM","AGN","AGO","AGP","AGQ","AGR","AGS","AGT","AGU","AGV","AGW","AGX","AGY","AGZ","AHA","AHB","AHC","AHD","AHE","AHF","AHG","AHH","AHI","AHJ","AHK","AHL","AHM","AHN","AHO","AHP","AHQ","AHR","AHS","AHT","AHU","AHV","AHW","AHX","AHY","AHZ","AIA","AIB","AIC","AID","AIE","AIF","AIG","AIH","AII","AIJ","AIK","AIL","AIM","AIN","AIO","AIP","AIQ","AIR","AIS","AIT","AIU","AIV","AIW","AIX","AIY","AIZ","AJA","AJB","AJC","AJD","AJE","AJF","AJG","AJH","AJI","AJJ","AJK","AJL","AJM","AJN","AJO","AJP","AJQ","AJR","AJS","AJT","AJU","AJV","AJW","AJX","AJY","AJZ","AKA","AKB","AKC","AKD","AKE","AKF","AKG","AKH","AKI","AKJ","AKK","AKL","AKM","AKN","AKO","AKP","AKQ","AKR","AKS","AKT","AKU","AKV","AKW","AKX","AKY","AKZ","ALA","ALB","ALC","ALD","ALE","ALF","ALG","ALH","ALI","ALJ","ALK","ALL","ALM","ALN","ALO","ALP","ALQ","ALR","ALS","ALT","ALU","ALV","ALW","ALX","ALY","ALZ","AMA","AMB","AMC","AMD","AME","AMF","AMG","AMH","AMI","AMJ","AMK","AML","AMM","AMN","AMO","AMP","AMQ","AMR","AMS","AMT","AMU","AMV","AMW","AMX","MAY","AMZ","ANA","ANB","ANC","AND","ANE","ANF","ANG","ANH","ANI","ANJ","ANK","ANL","ANM","ANN","ANO","ANP","ANQ","ANR","ANS","ANT","ANU","ANV","ANW","ANX","ANY","ANZ","AOA","AOB","AOC","AOD","AOE","AOF","AOG","AOH","AOI","AOJ","AOK","AOL","AOM","AON","AOO","AOP","AOQ","AOR","AOS","AOT","AOU","AOV","AOW","AOX","AOY","AOZ","APA","APB","APC","APD","APE","APF","APG","APH","API","APJ","APK","APL","APM","APN","APO","APP","APQ","APR","APS","APT","APU","APV","APW","APX","APY","APZ","AQA","AQB","AQC","AQD","AQE","AQF","AQG","AQH","AQI","AQJ","AQK","AQL","AQM","AQN","AQO","AQP","AQQ","AQR","AQS","AQT","AQU","AQV","AQW","AQX","AQY","AQZ","ARA","ARB","ARC","ARD","ARE","ARF","ARG","ARH","ARI","ARJ","ARK","ARL","ARM","ARN","ARO","ARP","ARQ","ARR","ARS","ART","ARU","ARV","ARW","ARX","ARY","ARZ","ASA","ASB","ASC","ASD","ASE","ASF","ASG","ASH","ASI","ASJ","ASK","ASL","ASM","ASN","ASO","ASP","ASQ","ASR","ASS","AST","ASU","ASV","ASW","SAX","ASY","ASZ","ATA","ATB","ATC","ATD","ATE","ATF","ATG","ATH","ATI","ATJ","ATK","ATL","ATM","ATN","ATO","ATP","ATQ","ATR","ATS","ATT","ATU","ATV","ATW","ATX","ATY","ATZ","AUA","AUB","AUC","AUD","AUE","AUF","AUG","AUH","AUI","AUJ","AUK","AUL","AUM","AUN","AUO","AUP","AUQ","AUR","AUS","AUT","AUU","AUV","AUW","AUX","AUY","AUZ","AVA","AVB","AVC","AVD","AVE","AVF","AVG","AVH","AVI","AVJ","AVK","AVL","AVM","AVN","AVO","AVP","AVQ","AVR","AVS","AVT","AVU","AVV","AVW","AVX","AVY","AVZ","AWA","AWB","AWC","AWD","AWE","AWF","AWG","AWH","AWI","AWJ","AWK","AWL","AWM","AWN","AWO","AWP","AWQ","AWR","AWS","AWT","AWU","AWV","AWW","AWX","AWY","AWZ","AXA","AXB","AXC","AXD","AXE","AXF","AXG","AXH","AXI","AXJ","AXK","AXL","AXM","AXN","AXO","AXP","AXQ","AXR","AXS","AXT","AXU","AXV","AXW","AXX","AXY","AXZ","AYA","AYB","AYC","AYD","AYE","AYF","AYG","AYH","AYI","AYJ","AYK","AYL","AYM","AYN","AYO","AYP","AYQ","AYR","AYS","AYT","AYU","AYV","AYW","AYX","AYY","AYZ","AZA","AZB","AZC","AZD","AZE","AZF","AZG","AZH","AZI","AZJ","AZK","AZL","AZM","AZN","AZO","AZP","AZQ","AZR","AZS","AZT","AZU","AZV","AZW","AZX","AZY","AZZ","BAA","BAB","BAC","BAD","BAE","BAF","BAG","BAH","BAI","BAJ","BAK","BAL","BAM","BAN","BAO","BAP","BAQ","BAR","BAS","BAT","BAU","BAV","BAW","BAX","BAY","BAZ","BBA","BBB","BBC","BBD","BBE","BBF","BBG","BBH","BBI","BBJ","BBK","BBL","BBM","BBN","BBO","BBP","BBQ","BBR","BBS","BBT","BBU","BBV","BBW","BBX","BBY","BBZ","BCA","BCB","BCC","BCD","BCE","BCF","BCG","BCH","BCI","BCJ","BCK","BCL","BCM","BCN","BCO","BCP","BCQ","BCR","BCS","BCT","BCU","BCV","BCW","BCX","BCY","BCZ"];





$sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='".$_POST["periodo"]."' AND p.aprobado=1";
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
    $descuento =$presupuesto["descuento"] * 100;

    

        $conta_cols3 = array_search($cols[$presupuesto["fila"]], $cols2);
        $conta_cols3 =$conta_cols3 +1;
        $conta_cols4 =$conta_cols3 +1;
        $conta_cols4 =$conta_cols3 +1;
        $conta_cols5 =$conta_cols4 +1;
        $conta_cols6 =$conta_cols5 +1;
        $conta_cols7 =$conta_cols6 +1;
        
        
    $objPHPExcel->getActiveSheet()->SetCellValue($cols[$presupuesto["fila"]].$presupuesto["columna"], "$gp[alumnos]");

    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols3].$presupuesto["columna"], "$tasa_c");

    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4].$presupuesto["columna"], "$alumnos_tasa");

    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols5].$presupuesto["columna"], "$descuento");

    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols6].$presupuesto["columna"], "valor cumplimiento");

     $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7].$presupuesto["columna"], "valor descuento ra");


    $sql = "SELECT columna FROM libros WHERE id_grado='51' AND id_materia='".$presupuesto["id_materia"]."'";

    $req = $bdd->prepare($sql);
    $req->execute();
    $colstotal = $req->fetchAll();

     
     //sumatoria por colegios
    foreach ($colstotal as $coltotal) {

      $sql_ac="SELECT SUM(alumnos) as total_poblacion, SUM(floor(alumnos * tasa_compra)) as p_neta, AVG(descuento) as total_descuento FROM grados_paralelos a JOIN presupuestos p ON a.id_colegio=p.id_colegio JOIN libros l ON l.id=p.id_libro AND l.id_grado=a.id_grado WHERE p.id_colegio='".$presupuesto["id_colegio"]."' AND l.id_materia='".$presupuesto["id_materia"]."' AND p.id_periodo='".$_POST["periodo"]."' AND a.id_periodo='".$_POST["periodo"]."' AND p.aprobado='1'";

        $req_ac = $bdd->prepare($sql_ac);
        $req_ac->execute();
        $ac = $req_ac->fetch();

        $total_descuento=$ac["total_descuento"] * 100;
        $total_descuento=number_format($total_descuento,2);

      $objPHPExcel->getActiveSheet()->getStyle($cols[$presupuesto["fila"]].$coltotal["columna"])->applyFromArray($estilo_totales);

      $objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols3].$coltotal["columna"].":".$cols2[$conta_cols7].$coltotal["columna"])->applyFromArray($estilo_totales);

      $objPHPExcel->getActiveSheet()->SetCellValue($cols[$presupuesto["fila"]].$coltotal["columna"], "$ac[total_poblacion]");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols3].$coltotal["columna"], "total % compra");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4].$coltotal["columna"], "$ac[p_neta]");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols5].$coltotal["columna"], "$total_descuento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols6].$coltotal["columna"], "total cumplimiento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7].$coltotal["columna"], "total dto ra");
    }

    

              
                
    
    

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
      

      $sql_tc="SELECT SUM(alumnos) as total_poblacion, AVG(descuento) as prom_descuento, SUM(floor(alumnos * tasa_compra)) as p_neta, p.precio * SUM(floor(alumnos * tasa_compra)) as total_venta, AVG(descuento) as total_descuento FROM grados_paralelos a JOIN presupuestos p ON a.id_colegio=p.id_colegio JOIN libros l ON l.id=p.id_libro AND l.id_grado=a.id_grado WHERE l.id_materia='".$libro["id_materia"]."' AND p.id_periodo='".$_POST["periodo"]."' AND a.id_periodo='".$_POST["periodo"]."' AND p.aprobado='1'";

      $req_tc = $bdd->prepare($sql_tc);
      $req_tc->execute();
      $tc = $req_tc->fetch();

      $total_descuento=$tc["total_descuento"] *100;
      $total_descuento=number_format($total_descuento,2);

      $objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols7+1].$n_col)->applyFromArray($estilo_totales);

      $objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols7+2].$n_col)->applyFromArray($estilo_totales);

      $objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols7+3].$n_col.":".$cols2[$conta_cols7+8].$n_col)->applyFromArray($estilo_totales);

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+1].$n_col, "$tc[total_poblacion]");


      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+2].$n_col, "$tc[p_neta]");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+3].$n_col, "$total_descuento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+4].$n_col, "$tc[total_venta]");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+5].$n_col, "sum total cumplimiento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+6].$n_col, "sum % ra");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+7].$n_col, "sum total venta cumplimiento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+8].$n_col, "sum total efectividad");


    }
    else {

      $objPHPExcel->getActiveSheet()->SetCellValue("A$n_col", "$libro[libro]");
      $objPHPExcel->getActiveSheet()->SetCellValue("B$n_col", "$libro[precio]");
      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+1].$n_col, "$total_poblacion[total_poblacion]");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+2].$n_col, "$poblacion_neta");
      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+3].$n_col, "$prom_descuento");
      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+4].$n_col, "$total_poblacion[total_venta]");
      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+5].$n_col, "total cumplimiento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+6].$n_col, "total descuento ra");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+7].$n_col, "total venta cumplimiento");

      $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+8].$n_col, "total efectividad");


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
    $conta_cols5 = $conta_cols4 +1;
    $conta_cols6 = $conta_cols5 +1;
    $conta_cols7 = $conta_cols6 +1;

    $conta_merge = $conta_cols3 +4;

    $objPHPExcel->getActiveSheet()->mergeCells($cols[$colegio["fila"]]."8".":".$cols2[$conta_merge]."8");
    $objPHPExcel->getActiveSheet()->getStyle($cols[$colegio["fila"]]."8")->applyFromArray($estilo_centrar);
    $objPHPExcel->getActiveSheet()->SetCellValue($cols[$colegio["fila"]]."8", "$colegio[colegio]");

  if ($color % 2 !=0){

    $objPHPExcel->getActiveSheet()->getStyle($cols[$colegio["fila"]]."8")->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '62F261')
            )
        )
    );

    $objPHPExcel->getActiveSheet()->getStyle($cols[$conta_cols2]."9".":".$cols2[$conta_cols7]."9")->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '80F47F')
            )
        )
    );

  }
    $color++;
 

    $objPHPExcel->getActiveSheet()->SetCellValue($cols[$conta_cols2]."9", "Población");
    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols3]."9", "% Compra");
    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols4]."9", "Neto");
    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols5]."9", "Dto");
    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols6]."9", "Cumplimiento");
    $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7]."9", "Dto ra");


  //}
  
}

  $objPHPExcel->getActiveSheet()->getStyle($cols2[$conta_cols7+1]."9".":".$cols2[$conta_cols7+8]."9")->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '01F400')
        )
    )
);

$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+1]."9", "Total población");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+2]."9", "Neto");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+3]."9", "Promedio % descuento");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+4]."9", "Valor");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+5]."9", "Cumplimiento");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+6]."9", "Descuento ra");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+7]."9", "Valor cumplimiento");
$objPHPExcel->getActiveSheet()->SetCellValue($cols2[$conta_cols7+8]."9", "Cumplimiento / Neto");

$col_final=$n_col+13;
$objPHPExcel->getActiveSheet()->SetCellValue("A$col_final", "TOTAL GENERAL");
/*for ($i=2; $i < $conta_cols4+5; $i++) { 

  
  $objPHPExcel->getActiveSheet()->SetCellValue($cols2[$i].$col_final, "=SUM(".$cols2[$i]."11".":".$cols2[$i].$col_final.")");
}*/



foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
$objWriter->setPreCalculateFormulas(true);
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Reporte_presupuesto.xlsx"');
$objWriter->save('php://output');




?>