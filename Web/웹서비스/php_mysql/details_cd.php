<?php
        $mysqli = new mysqli('localhost:3306','root','dudgns9101','images') or die($mysqli->connect_error);
        $table = 'chilsung_drink';
        $table2 = 'nutrient_child';
        
        $result = $mysqli->query("SELECT * FROM $table left join $table2 on $table.nutrient_id = $table2.id") or die($mysqli->error);



        // check GET request id param
        if(isset($_GET['name'])){

                $id = mysqli_real_escape_string($mysqli, $_GET['name']);

                //make sql
                //$sql = "SELECT * FROM samyang_ramyeon inner join nutrient_syr on samyang_ramyeon.nutrient_id = nutrient_syr.raw_id inner join raw_syr on nutrient_syr.raw_id = raw_syr.id WHERE nutrient_id = $id";

				$sql = "SELECT * FROM chilsung_drink INNER JOIN nutrient_child ON chilsung_drink.nutrient_id = nutrient_child.raw_id INNER JOIN raw_child on nutrient_child.raw_id = raw_child.id inner join badadd_child on raw_child.badadd_cd_id = badadd_child.id  WHERE nutrient_id = $id";

		
                //get the query result
              
				$result2 = mysqli_query($mysqli, $sql);

                //fetch result in array format
                
				$ramyeon = mysqli_fetch_assoc($result2);

                mysqli_free_result($result2);
                mysqli_close($mysqli);
                //print_r($ramyeon);

        }





?>

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
		<link rel="stylesheet" href="assets/css/detail2.css" />
		<link rel="stylesheet" href="assets/css/style.css">
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

							<!-- Banner -->



                                <section>
									<div class="row gtr-200">
										<div class="col-6 col-12-medium">
											<header class="four">
                                                <h2>나트륨 함량 게이지</h2>
                                            </header>
                                            <div>
                                                <meta charset="UTF-8">
                                                <title>계기판 연습하기</title>
                                                <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
                                                <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
                                                <script type="text/javascript">
                                                    FusionCharts.ready(function() {
                                                        var cSatScoreChart = new FusionCharts({
                                                type: 'angulargauge',
                                                renderAt: 'chart-container',
                                                width: '500',
                                                height: '300',
                                                dataFormat: 'json',
                                                dataSource: {
                                                  "chart": {
                                                    "caption": "WHO 권장 하루 평균 나트륨 섭취량 : 2000mg",


                                                    "lowerLimit": "0",
                                                    "upperLimit": "2000",
                                                    "showValue": "1",
                                                    "valueBelowPivot": "1",
                                                    "majorTMNumber": "9",
                                                    "minorTMNumber": "4",
                                                    "gaugeFillMix": "{dark-40},{light-40},{dark-20}",
                                                    "theme": "fusion"
                                                  },
                                                  "colorRange": {
                                                    "color": [{
                                                        "minValue": "0",
                                                        "maxValue": "700",
                                                        "code": "#6baa01"
                                                      },
                                                      {
                                                        "minValue": "700",
                                                        "maxValue": "1400",
                                                        "code": "#f8bd19"
                                                      },
                                                      {
                                                        "minValue": "1400",
                                                        "maxValue": "2000",
                                                        "code": "#e44a00"
                                                      }
                                                    ]
                                                  },
                                                  "dials": {
                                                    "dial": [{
                                                      "value": "<?php echo $ramyeon['natrium'];?>"
                                                    }]
                                                  }
                                                }
                                              }).render();
                                            });
                                                </script>
                                            </div>
                                            <body>
                                                <div id="chart-container">FusionCharts XT will load here!</div>
                                            </body>

											<header class="five">
                                                <h2>당 함량 게이지</h2>
                                            </header>
											<div>
												<head>
													  <title>My first chart using FroalaCharts</title>
													  


												  <script src=https://unpkg.com/froalacharts@1.0.0/froalacharts.js></script>
												  <script src="https://unpkg.com/froalacharts@1.0.0/themes/froalacharts.theme.froala.js"></script>

                                                  <div class="col-6 col-12-medium">
												  <script type="text/javascript">
												  
													   var data = {  chart: {
													caption: "WHO 권장 가공식품 섭취를 통한 하루 평균 당류 섭취량 : 50g",

													lowerlimit: "0",
													upperlimit: "50",
													showvalue: "1",
													numbersuffix: "g",
													theme: "froala"
												  },
												  colorrange: {
													color: [
													  {
														minvalue: "0",
														maxvalue: "15",
														code: "#6baa01"
													  },
													  {
														minvalue: "15",
														maxvalue: "35",
														code: "#f8bd19"
													  },
													  {
														minvalue: "35",
														maxvalue: "50",
														code: "#e44a00"
													  }
													]
												  },
												  dials: {
													dial: [
													  {
														value: "<?php echo $ramyeon['sugars'];?>",
														tooltext: "9% lesser that target"
													  }
													]
												  },
												  trendpoints: {
													point: [
													  {
														startvalue: "",
														displayvalue: "",
														thickness: "",
														color: "",
														usemarker: "1",
														markerbordercolor: "",
														markertooltext: "1500"
													  }
													]
												  }
												};
															FroalaCharts.ready(function () {
															new FroalaCharts({
																id: "chart_1",
																type: 'angulargauge',
																renderAt: 'ft',
																width: '520',
																height: '300',
																dataSource: data
															}).render();
														});
												  </script>
												  </div>
												</head>
												<body>
													<div id="ft">FroalaCharts will render here</div>
												</body>
											</div>

                                        </div>
										<div class="col-6 col-12-medium">
											<header class="four">
                                                <h2><?php echo $ramyeon['name'];?></h2>
                                            </header>
                                            <div>
                                                <img src="<?php echo $ramyeon['img_dir'];?>" alt="devkuma logo" style="width:350px;height:350px;">
                                            </div>
											<head>
												<meta charset="UTF-8">
												<title>Title</title>
												<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
												<link rel="stylesheet" href="assets/css/style.css">
											</head>
											<body>
												<h2>식품첨가물</h2>
												<p>
												<!--button class="s-all is-active">모두</button--><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
												<button class="s-red">유해</button>
												<!--button class="s-blue">미정</button-->
												<!--button class="s-green">좋음</button-->
												</p>

												<div class="red" id="red"><?php echo $ramyeon['add1'];?></div>
												<div class="red" id="red"><?php echo $ramyeon['add2'];?></div>
												<div class="red" id="red"><?php echo $ramyeon['add3'];?></div>
											
											
                                                <!--
												<div class="red" id="red">변성전분 : 증점제, 안정제, 겔화제, 유화제. 설사, 천식 악화.</div>
												<div class="red" id="red">구아검 : 증점제, 안정제, 유화제. 가스 증가, 설사.</div>
												<div class="blue" id="blue">탄산수소나트륨 : 영양강화제, 팽창제, 산도조절제.</div>
												-->

												<!--<div class="green" id="green">Fourth</div>-->
												
												
												<!--div class="blue" id="blue">DL-사과산 : 팽창제.</div-->
												<!--<div class="blue" id="blue">Seventh</div>-->
												<!--div class="green" id="green">비타민B2 : 영양강화제</div-->


												<!--<div class="green" id="green">Fourth</div>-->
												<!--
												<div class="red" id="red">글리신 : 향미증진제, 영양강화제. 크레아틴뇨증과 백혈구감소증 유발 위험.</div>
												<div class="blue" id="blue">DL-사과산 : 팽창제.</div>
												<!--<div class="blue" id="blue">Seventh</div>>
												<div class="green" id="green">비타민B2 : 영양강화제</div>
													-->


												<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
												<script  src="assets/js/function.js"></script>
											</body>
                                        </div>
									</div>
								</section>

							<!--<h3>유해성분 표시</h3>
                              	<div class="box">
                                <p>면:소맥분(밀:미국산,호주산),변성전분,팜유(말레이시아산),감자전분(외국산:덴마크,프랑스,독일 등),글루텐,정제소금,마늘시즈닝,난각분말,유화유지,면류첨가알칼리제(산도조절제),이스트엑기스,육수추출농축액,녹차풍미유,비타민B2,

스프류:정제소금,설탕,포도당,복합양념분말,숙성마늘맛분,간장분말,볶음양념분말,육수맛분말,마늘농축조미분,고추맛베이스,로스팅맛분말,쇠고기육수분말,조미육수분말,참맛양념분말,발효복합분,진한감칠맛분,후추분말,칠리맛분말,고춧가루,감칠맛분말,참맛버섯양념분말,버섯야채조미분말,오뚜기참치간장분말,감칠맛베이스,로스팅조미분말,맛베이스,향미증진제,볶음마늘분,육수맛조미분,육수추출농축분말,참맛효모조미분말,숙성양념분말,칠리추출물,구아검,칠리혼합추출물,산도조절제,고추농축소스,조미쇠고기맛후레이크,건당근,건청경채,건파,건표고버섯,건고추입자

밀,대두,계란,쇠고기,돼지고기,닭고기,조개류(굴,홍합 포함) 함유

우유,메밀,토마토,오징어,새우,게,고등어,땅콩 혼입가능</p>-->



							<!-- Section -->
								<section>
									<div class="row gtr-200">
										<div class="col-6 col-12-medium">
											<header class="third">
												<h2>영양성분표</h2>
											</header>
											<section class="performance-facts">
											  <header class="performance-facts__header">
												<h1 class="performance-facts__title">영양 성분</h1>
											  </header>
											  <table class="performance-facts__table">
												<tbody>
												  <tr class="thick-row">
													<td colspan="3" class="small-info">
													  1회 제공량 당 함량
													</td>
												  </tr>
												  <tr>
													<th colspan="2">
													  <b>1회 제공량</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['amount'];?></b>
													</td>
												  </tr>
												  <tr class="thin-end">
													<td colspan="2">
													  <b>에너지(kcal)</b>
													</td>
													<td>
													  <b><?php echo $ramyeon['calories'];?></b>
													</td>
												  </tr>
												  <tr>
													<th colspan="2">
													  <b>단백질(g)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['protein'];?></b>
													</td>
												  </tr>
												  <tr>
													<th colspan="2">
													  <b>지방(g)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['fat'];?></b>
													</td>
												  </tr>
												  <tr>
													<td class="blank-cell" >
													</td>
													<th>
													  <b>탄수화물(g)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['carbohydrate'];?></b>
													</td>
												  </tr>
												  <tr>
													<td class="blank-cell">
													</td>
													<th>
													  당(g)
													</th>
													<td>
													  <b><?php echo $ramyeon['sugars'];?></b>
													</td>
												  </tr>
												  <tr>
													<th colspan="2">
													  <b>나트륨(mg)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['natrium'];?></b>
													</td>
												  </tr>
												  <tr>
													<td class="blank-cell">
													</td>
													<th>
													  콜레스테롤(g)
													</th>
													<td>
													  <b><?php echo $ramyeon['cholesterol'];?></b>
													</td>
												  </tr>
												  <tr>
													<th colspan="2">
													  <b>포화지방(g)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['fatty_acid'];?>g</b>
													</td>
												  </tr>
												  <tr class="thick-end">
													<th colspan="2">
													  <b>트랜스지방(g)</b>
													</th>
													<td>
													  <b><?php echo $ramyeon['trans_fatty_acid'];?></b>
													</td>
												  </tr>
												</tbody>
											  </table>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<header class="third">
												<h2>원재료</h2>
											</header>
											<div class="box"><h2>
											<p><?php echo $ramyeon['section'];?> <?php echo $ramyeon['raw1'];?><?php echo $ramyeon['raw2'];?> <?php echo $ramyeon['raw3'];?> <?php echo $ramyeon['raw4'];?> <?php echo $ramyeon['raw5'];?> <?php echo $ramyeon['raw6'];?> <?php echo $ramyeon['raw7'];?> <?php echo $ramyeon['raw8'];?> <?php echo $ramyeon['raw9'];?> <?php echo $ramyeon['raw10'];?> <?php echo $ramyeon['raw11'];?> <?php echo $ramyeon['raw12'];?> <?php echo $ramyeon['raw13'];?> <?php echo $ramyeon['raw14'];?> <?php echo $ramyeon['raw15'];?> <?php echo $ramyeon['raw16'];?> <?php echo $ramyeon['raw17'];?> <?php echo $ramyeon['raw18'];?> <?php echo $ramyeon['raw19'];?> <?php echo $ramyeon['raw20'];?> <?php echo $ramyeon['raw21'];?> <?php echo $ramyeon['raw22'];?> <?php echo $ramyeon['raw23'];?> <?php echo $ramyeon['raw24'];?> <?php echo $ramyeon['raw25'];?> <?php echo $ramyeon['raw26'];?> <?php echo $ramyeon['raw27'];?> <?php echo $ramyeon['raw28'];?> <?php echo $ramyeon['raw29'];?> <?php echo $ramyeon['raw30'];?> <?php echo $ramyeon['raw31'];?> <?php echo $ramyeon['raw32'];?> <?php echo $ramyeon['raw33'];?> <?php echo $ramyeon['raw34'];?> <?php echo $ramyeon['raw35'];?> <?php echo $ramyeon['raw35'];?> <?php echo $ramyeon['raw37'];?> <?php echo $ramyeon['raw38'];?> <?php echo $ramyeon['raw39'];?> <?php echo $ramyeon['raw40'];?> <?php echo $ramyeon['raw41'];?> <?php echo $ramyeon['raw42'];?> <?php echo $ramyeon['raw43'];?> <?php echo $ramyeon['raw44'];?></p></h2> </script>

											





											</div>
										</div>
									</div>
								</section>
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
											<p>식약처의 자료를 참고한 웹서비스 입니다.</p>
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
									<ul>
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
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    		<script src="assets/js/function.js"></script>

	</body>
</html>


<!-- 
	면:소맥분(밀:미국산,호주산),변성전분,팜유(말레이시아산),감자전분(외국산:덴마크,프랑스,독일 등),글루텐,정제소금,마늘시즈닝,난각분말,유화유지,면류첨가알칼리제(산도조절제),이스트엑기스,육수추출농축액,녹차풍미유,비타민B2,

			스프류:정제소금,설탕,포도당,복합양념분말,숙성마늘맛분,간장분말,볶음양념분말,육수맛분말,마늘농축조미분,고추맛베이스,로스팅맛분말,쇠고기육수분말,조미육수분말,참맛양념분말,발효복합분,진한감칠맛분,후추분말,칠리맛분말,고춧가루,감칠맛분말,참맛버섯양념분말,버섯야채조미분말,오뚜기참치간장분말,감칠맛베이스,로스팅조미분말,맛베이스,향미증진제,볶음마늘분,육수맛조미분,육수추출농축분말,참맛효모조미분말,숙성양념분말,칠리추출물,구아검,칠리혼합추출물,산도조절제,고추농축소스,조미쇠고기맛후레이크,건당근,건청경채,건파,건표고버섯,건고추입자

			밀,대두,계란,쇠고기,돼지고기,닭고기,조개류(굴,홍합 포함) 함유

			우유,메밀,토마토,오징어,새우,게,고등어,땅콩 혼입가능-->