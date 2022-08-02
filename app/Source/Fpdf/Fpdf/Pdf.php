<?php


namespace App\Source\Fpdf;


function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['V']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

class Pdf extends Fpdf
{
    /*Alteração*/
    var $widths;
    var $aligns;
    var $enablepaginate = true;
    var $id_caixa = 0;
    var $texto_topo = '';

    //variables of html parser
    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;
    function __construct($orientation='P', $unit='mm', $format='A4')
    {
        //Call parent constructor
        parent::__construct($orientation,$unit,$format);
        //Initialization
        $this->B=0;
        $this->I=0;
        $this->U=0;
        $this->HREF='';
        $this->fontlist=array('arial', 'times', 'courier', 'helvetica', 'symbol');
        $this->issetfont=false;
        $this->issetcolor=false;
    }

    function WriteHTML($html)
    {
        //HTML parser
        $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>"); //supprime tous les tags sauf ceux reconnus
        $html=str_replace("\n",' ',$html); //remplace retour à la ligne par un espace
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //éclate la chaîne avec les balises
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,stripslashes(txtentities($e)));
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract attributes
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $attr=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        //Opening tag
        switch($tag){
            case 'STRONG':
                $this->SetStyle('B',true);
                break;
            case 'EM':
                $this->SetStyle('I',true);
                break;
            case 'B':
            case 'I':
            case 'U':
                $this->SetStyle($tag,true);
                break;
            case 'A':
                $this->HREF=$attr['HREF'];
                break;
            case 'IMG':
                if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                    if(!isset($attr['WIDTH']))
                        $attr['WIDTH'] = 0;
                    if(!isset($attr['HEIGHT']))
                        $attr['HEIGHT'] = 0;
                    $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
                }
                break;
            case 'TR':
            case 'BLOCKQUOTE':
            case 'BR':
                $this->Ln(5);
                break;
            case 'P':
                $this->Ln(5);
                break;
            case 'FONT':
                if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                    $coul=hex2dec($attr['COLOR']);
                    $this->SetTextColor($coul['R'],$coul['V'],$coul['B']);
                    $this->issetcolor=true;
                }
                if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                    $this->SetFont(strtolower($attr['FACE']));
                    $this->issetfont=true;
                }
                break;
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='STRONG')
            $tag='B';
        if($tag=='EM')
            $tag='I';
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='FONT'){
            if ($this->issetcolor==true) {
                $this->SetTextColor(0);
            }
            if ($this->issetfont) {
                $this->SetFont('arial');
                $this->issetfont=false;
            }
        }
    }

    function SetStyle($tag, $enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
        {
            if($this->$s>0)
                $style.=$s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
     var $angle=0;
    function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }
    function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }




    function Header()
    {
        if(!empty($this->enableheader)){
            if($this->enableheader == 1){
                $this->Image(dirname(dirname(dirname(dirname(__FILE__)))).'/public/theme/css/assets/images/logo.jpg',10,$this->GetY()-4,20);
                if($this->enablepaginate){
                    $this->AliasNbPages();
                    $this->SetFont('Arial','I',8);
                    $this->Cell(0,-5,$this->PageNo().'/{nb}',0,0,'R');
                }

                $this->SetFont('Arial','B',12);
                $this->Ln(3);
                $this->Cell(0,-10,utf8_decode('POLIDORO BROS'),0,0,'C');
                $this->Ln(1);
                $this->SetFont('Arial','',12);
                if($this->texto_topo){
                    $this->Cell(0,0,utf8_decode($this->texto_topo),0,0,'C');
                }
                $this->Ln(10);
            }
        }
    }

    function Footer()
    {
        if(!empty($this->enablefooter)){
            switch ($this->enablefooter) {
                default:
                    // Position at 1.5 cm from bottom
                    $this->SetY(-24);
                    // Arial italic 8
                    $this->SetFont('Arial','I',6);
                    // Page number
                    $this->Ln(10);
                    $this->Cell(0,-10,utf8_decode('Gerado Por: '.Session::get('nome')),0,0,'C');
                    $this->Ln(3);
                    $this->Cell(0,-10,utf8_decode('Data: '.date('d/m/Y H:i')),0,0,'C');
            }
        }
    }
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
    function SetWidths_dinamico($qtde,$width_fixos=null,$max_width=NULL,$width_fixos2=null)
    {
        $max_width = $this->GetPageWidth()-25;
        $w= array();
        if($width_fixos!=null){
            foreach($width_fixos as $wf){
                $w[]=$wf;
                $max_width =$max_width-$wf;
            }
        }
        if($width_fixos2!=null){
            foreach($width_fixos2 as $wf){
                $max_width =$max_width-$wf;
            }
        }
        $col_width = $max_width/$qtde;
        for($i=1;$i<=$qtde;$i++){
            $w[]= $col_width;
        }
        if($width_fixos2!=null){
            foreach($width_fixos2 as $wf){
                $w[]=$wf;
            }
        }
        //array(93,93)
        //Set the array of column widths
        $this->widths=$w;
    }
    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }
    function hex2dec($couleur = "#000000"){
        $R = substr($couleur, 1, 2);
        $rouge = hexdec($R);
        $V = substr($couleur, 3, 2);
        $vert = hexdec($V);
        $B = substr($couleur, 5, 2);
        $bleu = hexdec($B);
        $tbl_couleur = array();
        $tbl_couleur['R']=$rouge;
        $tbl_couleur['V']=$vert;
        $tbl_couleur['B']=$bleu;
        return $tbl_couleur;
    }

    function Row($data,$color=0,$border = 1)
    {
        //Calculate the height of the row
        $nb=0;
        foreach($data as $i=>$d){
            if(isset($this->widths[$i])){
                $nb=max($nb,$this->NbLines($this->widths[$i],utf8_decode($d)));
            }
        }
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        foreach($data as $i=>$d){
            $texto = $d;
            $negrito = explode('_font_',$d);
            if(isset($this->widths[$i])){
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                if(isset($negrito[1])){
                    $this->SetFont('',$negrito[0]);
                    $texto = $negrito[1];
                }else{
                    $this->SetFont('');
                }
                /*if(isset($color[1])){
                    $coul=$this->hex2dec($color[0]);
                    $this->SetTextColor($coul['R'],$coul['V'],$coul['B']);
                    $this->issetcolor=true;
                    $texto = $color[1];
                }*/
                /*
                    $coul=hex2dec($attr['COLOR']);
                    $this->SetTextColor($coul['R'],$coul['V'],$coul['B']);
                    $this->issetcolor=true;
                }*/
                //Save the current position

                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                if($border>0){
                    $style='FD';
                }else{
                    $style='F';
                }
                if($color>0){
                    $this->setFillColor(230,230,230);
                    $this->Rect($x,$y,$w,$h,$style);
                }else{
                    $this->setFillColor(255,255,255);
                    $this->Rect($x,$y,$w,$h,$style);
                }
                //Print the text
                $this->MultiCell($w,5,utf8_decode($texto),0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function setHeader()
    {

        $this->Image(dirname(dirname(__FILE__)).'/public/img/logo.jpg',10,$this->GetY()-4,12);
        $this->SetFont('Arial','B',12);
        $this->Ln(3);
        $this->Cell(0,-10,utf8_decode('Fundação Lowtons de Educação e Cultura'),0,0,'C');
        $this->Ln(1);
        $this->SetFont('Arial','',12);
        $this->Cell(0,0,utf8_decode(Session::get('nm_escola')),0,0,'C');
        $this->Ln(10);
    }

    // Page footer
    function setFooter()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-24);
        // Arial italic 8
        $this->SetFont('Arial','I',6);
        // Page number
        $this->Ln(10);
        $this->Cell(0,-10,utf8_decode('Gerado Por: '.Session::get('nome')),0,0,'C');
        $this->Ln(3);
        $this->Cell(0,-10,utf8_decode('Data: '.date('d/m/Y H:i')),0,0,'C');
    }
    /*Boleto Código de Barras*/
    function i25($xpos, $ypos, $code, $basewidth=1, $height=14){

        $wide = $basewidth;
        $narrow = $basewidth / 3 ;

        // wide/narrow codes for the digits
        $barChar['0'] = 'nnwwn';
        $barChar['1'] = 'wnnnw';
        $barChar['2'] = 'nwnnw';
        $barChar['3'] = 'wwnnn';
        $barChar['4'] = 'nnwnw';
        $barChar['5'] = 'wnwnn';
        $barChar['6'] = 'nwwnn';
        $barChar['7'] = 'nnnww';
        $barChar['8'] = 'wnnwn';
        $barChar['9'] = 'nwnwn';
        $barChar['A'] = 'nn';
        $barChar['Z'] = 'wn';

        // add leading zero if code-length is odd
        if(strlen($code) % 2 != 0){
            $code = '0' . $code;
        }

        $this->SetFont('Arial','',10);
        //$this->Text($xpos, $ypos + $height + 4, $code);
        $this->SetFillColor(0);

        // add start and stop codes
        $code = 'AA'.strtolower($code).'ZA';

        for($i=0; $i<strlen($code); $i=$i+2){
            // choose next pair of digits
            $charBar = $code[$i];
            $charSpace = $code[$i+1];
            // check whether it is a valid digit
            if(!isset($barChar[$charBar])){
                $this->Error('Invalid character in barcode: '.$charBar);
            }
            if(!isset($barChar[$charSpace])){
                $this->Error('Invalid character in barcode: '.$charSpace);
            }
            // create a wide/narrow-sequence (first digit=bars, second digit=spaces)
            $seq = '';
            for($s=0; $s<strlen($barChar[$charBar]); $s++){
                $seq .= $barChar[$charBar][$s] . $barChar[$charSpace][$s];
            }
            for($bar=0; $bar<strlen($seq); $bar++){
                // set lineWidth depending on value
                if($seq[$bar] == 'n'){
                    $lineWidth = $narrow;
                }else{
                    $lineWidth = $wide;
                }
                // draw every second value, because the second digit of the pair is represented by the spaces
                if($bar % 2 == 0){
                    $this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
                }
                $xpos += $lineWidth;
            }
        }
    }
}
