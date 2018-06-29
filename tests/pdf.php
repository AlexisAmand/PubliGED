<?php

require_once __DIR__ . '/mpdf/autoload.php';

$html = "<h1>Hello world!</h1>

<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</p>

<img src='../img/homme.png'>

<a href='#'>C'est juste un test de lien</a>

<h2>C'est un tableau</h2>

<table border='1'>
<thead>
<tr>
<td>A</td><td>B</td>
</tr>
</thead>
<tbody>
<tr>
<td>A</td><td>B</td>
</tr>
<tr>
<td>A</td><td>B</td>
</tr>
</tbody>
</table>

<em>Texte en em</em><br />

<strong>Texte en strong</strong><br />

<span style='color:red'>essai de texte en couleur rouge</span>

";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();

?>