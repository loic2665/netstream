<?php
require("../mpdf60/mpdf.php");
//$style_data = file_get_contents("./style/bootstrap.css");
//$frontmatter_data = file_get_contents("profil.php");
//$html_data = file_get_contents("profil.php");
// Create new PDF with font subsetting, 210mm wide, 297mm high
$mpdf = new mPDF('s', array(210,297));
// Make it DOUBLE SIDED document with 4mm bleed
$mpdf->mirrorMargins = 1;
$mpdf->bleedMargin = 4;
// Set left to right text
$mpdf->SetDirectionality('ltr');
// Write the stylesheet
//$mpdf->WriteHTML($style_data, 1);        // The parameter 1 tells mPDF that this is CSS and not HTML
// Write front matter from another data source 
//$mpdf->WriteHTML($frontmatter_data, 2);
$mpdf->WriteHTML("<h1 style='text-align: center;'>COMMANDE</h1>", 2);
$mpdf->WriteHTML("<h4 style='text-align: center;'>Top des bières</h4>", 2);
$mpdf->WriteHTML("<br />", 2);
$mpdf->WriteHTML("<p>Merci pour votre commande chez 'la boutique de lolo' voici votre récapitulatif.</p>", 2);
$mpdf->WriteHTML("<hr />", 2);

$panier = array("103254","Ours en peluche",4,"103569","Panier en plastique",5,"103458","Carton en bois",2,"103482","Dalle de fer en maille",1,"103555","Surcouche de michel",13,"103569","Hello de bonjour",12,"103859","Haha de mdr",40,"103252","Michel de aurevoir",999);

/*$i = 0;
while ($i <= count($panier)) {
    $mpdf->WriteHTML("".$panier[$i]."&nbsp;&nbsp;&nbsp;&nbsp;".$panier[$i+1]."&nbsp;&nbsp;<span style='float: right;'>".$panier[$i+2]."</span><br />", 2);
    $i = $i + 3;
}*/
$mpdf->WriteHTML("table, tr, td { border: 1px solid;  } table { width: 100%; }", 1);
$mpdf->WriteHTML("<table>", 2);
$mpdf->WriteHTML("<tr>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("ID Produit", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Nom produit", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Quantité", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Prix unitaire", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Total", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("</tr>", 2);

$i = 0;
while ($i < count($panier)) {
    //$mpdf->WriteHTML("".$panier[$i]."&nbsp;&nbsp;&nbsp;&nbsp;".."&nbsp;&nbsp;<span style='float: right;'>".$panier[$i+2]."</span><br />", 2);
    


$mpdf->WriteHTML("<tr>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("".$panier[$i]."", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("".$panier[$i+1]."", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("".$panier[$i+2]."", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Pas encore mis", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("<td>", 2);
$mpdf->WriteHTML("Non plus...", 2);
$mpdf->WriteHTML("</td>", 2);

$mpdf->WriteHTML("</tr>", 2);
$i = $i + 3;
}

$mpdf->WriteHTML("</table>", 2);

// Write the main text 
// Set the metadata
$mpdf->SetTitle("Votre commande");
$mpdf->SetAuthor("COLLETTE Loïc");
$mpdf->SetCreator("COLLETTE Loïc");
// Generate the PDF file
$mpdf->Output();
?>