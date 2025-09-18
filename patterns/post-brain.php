<?php
/**
 * Title: Post Brain
 * Slug: cwtc3/post-brain
 *
 * @package cwtc3
 * @since 1.0.0
 */

$flds = get_fields();

//
$GLOBALS['cplnx'] = [];

if(is_data_okay('codepen_embeds', $flds)) { $cp = $flds['codepen_embeds'];
	foreach($cp as $cpkey => $cem) :
		$url = str_replace('http://codepen.io/DanCruzat/pen/','',$cem['url']);
		$h = $cem['h'];
		$nami = 'cp-'.($cpkey+1);
		$GLOBALS['cplnx'][$cpkey] = array($url,$h);
		add_shortcode( $nami, function($atts, $content, $shortcode_tag ) {
			$cr = str_replace( 'cp-', '', $shortcode_tag );
			$cr --;

			$u = $GLOBALS['cplnx'][$cr][0];
			$h = $GLOBALS['cplnx'][$cr][1];

			$srr = "<p data-height='".$h."' data-theme-id='17502' data-slug-hash='".$u."' data-default-tab='result' data-user='DanCruzat' class='codepen'><a href='http://codepen.io/DanCruzat/pen/".$u."/'>See the Pen by Dan Cruzat</a> (<a href='http://codepen.io/DanCruzat'>@DanCruzat</a>) on <a href='http://codepen.io'>CodePen</a>.</p>";

			return $srr;
		});
		endforeach;
	print_r('<script async src="//assets.codepen.io/assets/embed/ei.js"></script>');
}

if(is_data_okay('down_ass', $flds)) { $d_ass = $flds['down_ass'];
	add_shortcode( 'assets', function($d_ass) {
		global $post;
		$d_ass = get_field('down_ass');

		$st = '<div class="assets"><h3>DOWNLOADS</h3><ul>'; //<i class="fa fa-folder"></i>
		foreach ($d_ass as $d) :
			$st .= '<li><a href="'.$d['asset']['url'].'">';

			if($d['asset']['mime_type']=='application/zip') {
				$st .= '<i class="fa fa-file-zip-o"></i>';
			}

			$st .= $d['label'].'</a></li>';
			endforeach;
		$st .= '</ul></div>';
		return $st;
	});
}

if(is_data_okay('settice', $flds)) { $settice = $flds['settice'];

	function make_head($st,$tit,$hh) {
		//global $hh;
		if(!$hh) {
			$b1 = '<h3 style="font-family: var(--fontScript)" class="text-[2rem]! mb-[1rem]! text-[var(--burnt-orange)] py-[calc(var(--rails)/2)] px-[var(--rails)]">'.$tit.'</h3>';
		} else {	$b1 = '';	}
		return '<div class="code-bloc">'.$b1.'<textarea class="code" wrap="off">'.shave($st).'</textarea></div>';
	}

	foreach($settice as $coun => $sett) :
		$namo = 'settice-'.($coun+1);
		add_shortcode( $namo, function($atts, $content, $shortcode_tag) {
			$curr = str_replace( 'settice-', '', $shortcode_tag );
			$curr --;
			global $post;
			$settice = get_field('settice',$post->ID);
			$sett = $settice[$curr];

			$sr 		= '<div class="boks clearfix">';
			$tips 		= $sett['types'];
			$hh 		= $sett['hide_header'];
			$r_html = $sett['html'];
			$r_css 	= $sett['css'];
			$r_js 	= $sett['js'];
			$r_jq 	= $sett['jq'];

			if(in_array('php',$tips)) 	{	$sr .= make_head($sett['php'], 'PHP', 	$hh); 	}
			if(in_array('css',$tips)) 	{	$sr .= make_head($r_css, 'CSS', 		$hh); 	}
			if(in_array('html',$tips)) 	{	$sr .= make_head($r_html, 'HTML', 		$hh);	}
			if(in_array('js',$tips)) 	{	$sr .= make_head($r_js, 'Javascript', 	$hh); 	}
			if(in_array('jq',$tips)) 	{	$sr .= make_head($r_jq, 'JQuery', 		$hh); 	}


			if(isset($code)) 	{
				global $sp_com;
			}
			$sr .= '</div>';
			return $sr;
		});
	endforeach;
}


?>


