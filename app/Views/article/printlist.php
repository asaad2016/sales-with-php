<?php
/*use app\Model\ArticleModel;
$model=new ArticleModel(\app::getinstance()->getdb());
$article=$model->loadarticle();*/

?>
<link rel="stylesheet" type="text/css" href="<?= ROOT?>/public/css/pdf-style.css">
<page backtop="35" backbottom="35" backleft="20" backright="20">
	<page_header style="font-size: 30px;text-align: center">
		برنامج المبيعات
	</page_header>
	<page_footer style="font-size: 30px;text-align: center">
		اسعد نبيه
	</page_footer>
    <table class="main-table" cellpadding="0" cellspacing="0" style="width: 100%;">
    	<thead>
	      <tr class="tr1">
		      
		       <th class="td1">التحكم</th>
		       <th class="td1">الرقم</th>
		       <th class="td1">كود المنتج</th>
		       <th class="td1">اسم المنتج</th>
		       <th class="td1">اسم المورد</th>
		       <th class="td1">الضريبة</th>
		       <th class="td1">الصنف</th>
		       <th class="td1">تاوحدة</th>
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