<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html id="page">

<!-- Mirrored from ungdomstorget.ambercms.se/ by HTTrack Website Copier/3.x [XR&CO'2006], Tue, 08 Aug 2006 13:03:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ungdomstorget</title>
        <link rel="stylesheet" type="text/css" href="template/1/style.css" />
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="/template/1/iestyle.css" />
        <![endif]-->

</head>
<body>

        <h1>
                        <img src="template/1/images/title-ungdomstorget.png" alt="Ungdomstorget" />
        </h1>

<div id="wrapper">

        <div id="leftcol">

                <div class="yellow-scheme" id="community">

                        <h2><img src="template/1/images/left-community.png" alt="Community" /></h2>

                        <p>communitygrejs här, och en <a href="#">länk</a></p>

                </div>
                <div id="menu">
                          
                          
		          <div class="menu-item" id="menu-item-ungdomstorget">
                                <h3><a href="page/111.html"><img src="template/1/images/left-menu-ungdomstorget.png" alt="Ungdomstorget" /></a></h3>

                                <p><a href="page/111.html">Vad är Ungdomstorget för något och varför finns det.<br/><br/></a></p>

                                <p><a href="page/111.html"><img src="template/1/images/left-menu-ungdomstorget-line.png" alt="Läs mer" /></a></p>
                          </div>
		          
		          <div class="menu-item" id="menu-item-pagang">
                                <h3><a href="page/157.html"><img src="template/1/images/left-menu-pagang.png" alt="På gång" /></a></h3>

                                <p><a href="page/157.html">Vi är på gång, varje år träffas vi på riktigt och utbyter idéer.</a></p>

                                <p><a href="page/157.html"><img src="template/1/images/left-menu-pagang-line.png" alt="Läs mer" /></a></p>
                          </div>
		          
		          <div class="menu-item" id="menu-item-irl">
                                <h3><a href="page/112.html"><img src="template/1/images/left-menu-irl.png" alt="In real life" /></a></h3>

                                <p><a href="page/112.html">En gång varje år träffas alla ungdomsråd och utbyter erfarenheter</a></p>

                                <p><a href="page/112.html"><img src="template/1/images/left-menu-irl-line.png" alt="Läs mer" /></a></p>
                          </div>
		          
		          <div class="menu-item" id="menu-item-research">
                                <h3><a href="page/113.html"><img src="template/1/images/left-menu-research.png" alt="Research" /></a></h3>

                                <p><a href="page/113.html">Vi researchar många issues varje dag för er skull.</a></p>

                                <p><a href="page/113.html"><img src="template/1/images/left-menu-research-line.png" alt="Läs mer" /></a></p>
                          </div>
		          
		          <div class="menu-item" id="menu-item-utrop">
                                <h3><a href="page/158.html"><img src="template/1/images/left-menu-utrop.png" alt="Utropstecknet" /></a></h3>

                                <p><a href="page/158.html">En superhäftig webbtidning där du kan läsa om alla häftiga saker ungdomsråd gör.</a></p>

                                <p><a href="page/158.html"><img src="template/1/images/left-menu-utrop-line.png" alt="Läs mer" /></a></p>
                          </div>
		          
		          <div class="menu-item" id="menu-item-adress">
                                <h3><a href="page/159.html"><img src="template/1/images/left-menu-adress.png" alt="adressbok" /></a></h3>

                                <p><a href="page/159.html">Varje år träffas vi på riktigt, utbyter erfarenheter och går på grymma föredrag.</a></p>

                                <p><a href="page/159.html"><img src="template/1/images/left-menu-adress-line.png" alt="Läs mer" /></a></p>
                          </div>
		          

 
                        <div id="search">

                                <h2><img src="template/1/images/left-menu-sok.png" alt="Sök" /></h2>

                                <p>Hittar du inte vad du letar efter - här kan du söka på sverigesungdomrad.se och ungdomstorget.se.</p>

                        </div>

                </div>

        </div>

        <div id="midcol">

                <div class="midcol-box red-scheme">

                        <h2 class="displaced-head"><img src="template/1/images/mid-utropstecknet.gif" alt="Utropstecknet - ett onlinemagasin för och av oss ungdomsrådare" /></h2>

                        <div class="midcol-box-contents">
                                <div class="focused-content">

                                        <p><div id="editor_text_304">
<table border=0 cellpadding=3 width=700>

<h2><?php echo $info['namn'] ?></h2>

<?php

foreach($info as $key => $value) {

	if($value && $key != "namn") {

	if($key == "lan") $key = "Län";


	$x = "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
	if($key == "vuxen_namn" || $key == "ungdom_namn" || $key == "adress_namn" || $key == "wiki") {
		echo $x;
	}

	$key = ucwords(str_replace("_", " ", $key));
?>
	<tr>	
		<td align="right">
			<strong><?php echo $key ?>:</strong>
		</td>

		<td>
			<?php echo $value ?>
		</td>
	</tr>


<?php
	}
}
?>





</table>
<br/><br/>
<a href="search.php">Tillbaka till listan</a>
<br/><br/>										</p></div>

                                        <p><!--<a href="#"><img src="template/1/images/link-red-lasmer.png" alt="Läs mer" /></a>--></p>

                                </div>

                        </div>

                </div>

                <!--<div class="midcol-box green-scheme" id="irl-puff">

                        <h2 class="displaced-head"><img src="template/1/images/mid-irl.png" alt="In real life - träffen med stort T - en helg för alla Sveriges ungdomsrådare" /></h2>

                        <div id="irl-puff-contents" class="focused-content midcol-box-contents">

                                <h3>Bilder från woo</h3>

                                <p>Fyllnadstext.</p>
                                <p>Sucrose.</p>

                        </div>

                </div>-->

        </div>

        <!--<div id="rightcol">

                <div class="green-scheme" id="sur">

                        <h2 class="displaced-head"><img src="template/1/images/right-sur.png" alt="Sveriges ungdomsråd" /></h2>

                        <div id="sur-contents">

                                <p>Suscinciduis adit veliquam quat, con henibh eu faci tet alit inciliq uamconse tat. Heniatin ulla adigniamet augiat. Dui bla at lor aliqui ssim quam, consed tat. Ut la cons equatuer sed dolor ipsum nis dolobortie erci blan hendrem quis augiam autatue rcilisi.</p>

                                <p>Urem vel utpat. Is augiam iniam aut adigna faciliquam vulput wismodo loboreet vel do eu feuipit voloreros nulla conullam, conse ex estio commolobore exer si ea facil ero.</p>

                                <p style="margin-top:2em"><a href="http://www.sverigesungdomsrad.se/"><img src="template/1/images/link-vidare-sur.png" alt="Vidare till Sveriges ungdomsråd" /></a></p>

                        </div>

                </div>

                <div class="green-scheme" id="mail">

                        <h2 class="displaced-head"><img src="template/1/images/right-mail.png" alt="Sveriges ungdomsråds nyhetsbrev" /></h2>

                        <div id="mail-contents">

                                <p>Dui bla at lor aliquissim quam, consed tat. Ut la consequatuer sed dolor ipsum nis</p>

                        </div>

                </div>

                <div class="yellow-scheme" id="voices">

                        <h2 class="displaced-head"><img src="template/1/images/right-voices.png" alt="Röster från forumet" /></h2>

                        <div id="voices-contents">

                                <p>Heniatin ulla adigniamet augiat. Dui bla at lor aliquissim quam, consed tat. Ut la consequatuer sed dolor ipsum nis </p>

                                <h3>Re: Apor dansar</h3>

                                <p>Hej <a href="#">länk</a>.</p>

                                <p><a href="#"><img src="template/1/images/link-forumline.png" alt="Läs" /></a></p>

                                <h3>Re: Två</h3>

                                <p>Svej.</p>

                                <p><a href="#"><img src="template/1/images/link-forumline.png" alt="Läs" /></a></p>

                        </div>

                </div>

        </div>-->

</div>
</body>

<!-- Mirrored from ungdomstorget.ambercms.se/ by HTTrack Website Copier/3.x [XR&CO'2006], Tue, 08 Aug 2006 13:04:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>


