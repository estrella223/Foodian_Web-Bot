

        <!--?php
        // $mysqli = new mysqli('localhost:3306','root','dudgns9101','images') or die($mysqli->connect_error);
        // $table = 'samyang_ramyeon';
        // $table2 = 'nutrient_syr';
        
        // $result = $mysqli->query("SELECT * FROM $table left join $table2 on $table.nutrient_id = $table2.id") or die($mysqli->error);
        
        // while ($data = $result->fetch_assoc())
        //     echo "<h2>{$data['name']}</h2>";
        //     echo "<img src='{$data['img_dir']}' width='40%' height='40%'>";
        //     echo "<h3>용량: {$data['amount']}</h3>";
        //     echo "<h3>칼로리: {$data['calories']}</h3>";
        //     echo "<h3>단백질: {$data['protein']}</h3>";
        //     echo "<h3>지방: {$data['fat']}</h3>";
        //     echo "<h3>탄수화물: {$data['carbohydrate']}</h3>";
        //     echo "<h3>당: {$data['sugars']}</h3>";
        //     echo "<h3>나트륨: {$data['natrium']}</h3>";
        //     echo "<h3>지방산: {$data['fatty_acid']}</h3>";
        //     echo "<h3>트렌스지방산: {$data['trans_fatty_acid']}</h3>";
        // }
        
        ?-->


<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>FOODian</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
	

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>FOODian</strong>&nbsp;&nbsp;&nbsp;식품 안전 지킴이</a>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Content -->

									<header class="major">
										<h2>제품 목록</h2>
									</header>

	

								    <div class="posts">


	<?php
    $mysqli = new mysqli('localhost:3306','root','dudgns9101','images') 
	or die($mysqli->connect_error);
    $table = 'samyang_ramyeon';
    $table2 = 'nutrient_syr';
        
    $result = $mysqli->query("SELECT * FROM $table left join $table2 on $table.nutrient_id = $table2.id") or die($mysqli->error);
        
    while ($data = $result->fetch_assoc()){
		
        echo "<article>
		      
		      <div class='posts'>
			    <img src='{$data['img_dir']}' width='40%' height='40%'>
		         </div>
		         
				 <article>
				 <div class='posts'>
		         <h2><a href='details.php?id={$data['id']}'>'{$data['name']}'</a></h2>
		         </div>
		         </article>
		     </article>";};
	?>


        
										
									


								
									</div>
								

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">메인</a></li>
										<!--<li><a href="generic.html">Generic</a></li>
										<li><a href="elements.html">Elements</a></li>-->
										<li>
											<span class="opener">라면</span>
											<ul>
												<li><a href="display.php">삼양</a></li>
												<li><a href="#">팔도</a></li>
												<li><a href="#">농심</a></li>
												<li><a href="#">오뚜기</a></li>
											</ul>
										</li>
										<!--<li><a href="#">Etiam Dolore</a></li>
										<li><a href="#">Adipiscing</a></li>-->
										<li>
											<span class="opener">음료</span>
											<ul>
												<li><a href="display_cd.php">칠성</a></li>
												<li><a href="#">동원</a></li>
												<li><a href="#">광동</a></li>
												<li><a href="#">동서식품</a></li>
												<li><a href="#">동아오츠카</a></li>
											</ul>
										</li>
										<!--<li><a href="#">Maximus Erat</a></li>
										<li><a href="#">Sapien Mauris</a></li>
										<li><a href="#">Amet Lacinia</a></li>-->
										<li>
											<span class="opener">과자</span>
											<ul>
												<li><a href="#">오리온</a></li>
												<li><a href="#">해태</a></li>
												<li><a href="#">농심</a></li>
												<li><a href="#">롯데</a></li>
												<li><a href="#">동원</a></li>
											</ul>
										</li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>식품의약품안전처</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/식약처 로고.png" alt="" /></a>
											<p>식약처 자료로 만든 웹서비스 입니다.</p>
										</article>
										<!--<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>-->
									</div>
									<ul class="actions">
										<li><a href="https://www.mfds.go.kr/" class="button">식약처 홈페이지 바로가기</a></li>
									</ul>
								</section>

							<!-- Section -->
								<!--section>
									<header class="major">
										<h2>연락처</h2>
									</header>
									<p>저희와 연락하고 싶으세요?</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
										<li class="icon solid fa-phone">(000) 000-0000</li>
										<li class="icon solid fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section-->

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>