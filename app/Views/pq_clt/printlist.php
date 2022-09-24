<?php
/*use app\Model\ArticleModel;
$model=new ArticleModel(\app::getinstance()->getdb());
$article=$model->loadarticle();*/

?>
<link rel="stylesheet" type="text/css" href="<?= ROOT?>/public/css/pdf-style.css">
<page backtop="35" backbottom="35" backleft="20" backright="20">
	<page_header>
		برنامج المبيعات
	</page_header>
	<page_footer>
		اسعد نبيه
	</page_footer>
    <table class="main-table" cellpadding="0" cellspacing="0" style="width: 100%;">
    	<thead>
	      <tr class="tr1">
		      
		       <th class="td1">ID</th>
		       <th class="td1">ref</th>
		       <th class="td1">desig</th>
		       <th class="td1">supplier_name</th>
		       <th class="td1">tax</th>
		       <th class="td1">category name</th>
		       <th class="td1">unit name</th>

	      </tr>
	   </thead>
	   <tbody>
	    <?php

	    foreach ( $article as $art) {
	     echo "<tr class='tr2'>";
	     echo "<td>" . $art->id ."</td>";
	     echo "<td>" . $art->ref ."</td>";
	     echo "<td>" . $art->desig ."</td>";
	     echo "<td>" . $art->supplier_name ."</td>";
	     echo "<td>" . $art->tax ."</td>";
	     echo "<td>" . $art->cat_name ."</td>";
	     echo "<td>" . $art->u_name ."</td>";
	     
	     
	     echo "</tr>";
	   	}
	   	?>
	   	</tbody>
	</table>

</page>