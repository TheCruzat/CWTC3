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

			return $srr;//'hello : ' . $GLOBALS['cplnx'][$cr][0];
			//return $url . ' : hello';
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

/*
if(is_data_okay('article_images', $flds)) { $a_img = $flds['article_images'];
	foreach($a_img as $coun => $ai) :
		$namo = 'img-'.($coun+1);
		add_shortcode( $namo, function($atts, $content, $shortcode_tag) {
			$curr = str_replace( 'img-', '', $shortcode_tag );
			// $curr --;
			global $post;
			$settice = get_field('article_images',$post->ID);
			if(isset($settice[$curr])) {
				$sett = $settice[$curr];
				if(is_data_okay('image', $sett)) $crc = $sett['image'];
				$srcee = wp_get_attachment_image_src( $crc, 'fullsize' );
				// pr($srcee);
				if(isset($crc)) {
					$capt = get_post($crc);
					$capt = $capt->post_excerpt;
				}
				if(is_data_okay('css', $sett)) $styl = $sett['css'];
				if(is_data_okay('classes', $sett)) $claz = $sett['classes'];
				$sr = '';

				//if($capt) 			{
						$sr .= '<div class="cap-box';
				//}
				if(isset($claz)) 	{	$sr .= ' '.$claz.'"';
					} else {			$sr .= '"';	}
				if(isset($capt)&&isset($styl)) 	{	$sr .= ' style="'.$styl.'">';
					} else {			$sr .= '>';	}
				if(isset($srcee[0])) $sr .= '<img src="' .$srcee[0]. '"';
				if(isset($claz)&&!isset($capt)) {
					//$sr .= ' class="'.$claz.'"';
				}
				if(isset($claz)&&!isset($capt)) {
					$sr .= ' style="'.$styl.'"';
				}
				$sr .= ' />';

				if($capt !== null && $capt !== "") { $sr .= '<span class="block p-[0.5rem] text-center text-[1.25rem]">'.$capt . '</span>'; }
				$sr .= '</div>';

				return $sr;
			}
		});
	endforeach;
} */

if(is_data_okay('settice', $flds)) { $settice = $flds['settice'];

	function make_head($st,$tit,$hh) {
		//global $hh;
		if(!$hh) {
			$b1 = '<h3 style="font-family: var(--fontScript)" class="text-[2rem]! mb-[1rem]! text-[var(--burnt-orange)] py-[calc(var(--rails)/2)] px-[var(--rails)]">'.$tit.'</h3>';
		} else {	$b1 = '';	}
		return '<div class="code-bloc">'.$b1.'<textarea class="code" wrap="off">'.shave($st).'</textarea></div>';//<pre class="lang:'.$lang.'"><code>'.shave($st).'</code></pre>';
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
			// $spawn 		= $sett['spawn'];
			// $spawn_h 	= $sett['spawn_height'];
			// $spawn_t 	= $sett['spawn_trigger'];
			$hh 		= $sett['hide_header'];
			$r_html = $sett['html'];
			$r_css 	= $sett['css'];
			$r_js 	= $sett['js'];
			$r_jq 	= $sett['jq'];

			/*
			$hs 	= explode(',',$sett['code_height']);
			// html css js jq php

			if($spawn) {
				if (strpos($r_html,'<html>') == false && strpos($r_html, '</html>') == false) {
				    //$y = '<html><body>' . $y . '</body></html>';
				 	$op_a = '<html><body>';
				 	$op_b = '<html>';
				 	$he_1 = '<head>';
				 	$he_0 = '</head><body>';
				 	$clos = '</body></html>';

				 	if($r_css) {
				 		$op = '<html><head><style>' . $r_css . '</style></head><body>';
				 	} else {
				 		$op = '<html><body>';
				 	}

				 	$scr = '';
				 	if($r_jq) {
				 		$scr = '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
				 		$scr .= '<script>' . $r_jq . '</script>';
				 	}

				 	$cor = $op . $r_html . $scr . '</body></html>';
				} else {	$cor = $r_html;	}
				$code = 	'<div class="sample-wrap';
				//if($spawn_t) {
					$code .= ' c trig-'.($curr+1);
				//}
				$code .=	'"><iframe height="'.$spawn_h.'" srcdoc="' . shave($cor) . '"></iframe></div>'; // scrolling="no"
			} */

			if(in_array('php',$tips)) 	{	$sr .= make_head($sett['php'], 'PHP', 	$hh); 	}
			if(in_array('css',$tips)) 	{	$sr .= make_head($r_css, 'CSS', 		$hh); 	}
			if(in_array('html',$tips)) 	{	$sr .= make_head($r_html, 'HTML', 		$hh);	}
			if(in_array('js',$tips)) 	{	$sr .= make_head($r_js, 'Javascript', 	$hh); 	}
			if(in_array('jq',$tips)) 	{	$sr .= make_head($r_jq, 'JQuery', 		$hh); 	}


			if(isset($code)) 	{
				global $sp_com;
				//$sr .= $code.'<a class="cta trig-'.($curr+1).'"><span class="lab">'.SPAWN_CALL.'</span><i class="fa fa-times"></i></a>';////
			}
			$sr .= '</div>';
			return $sr;
		});
	endforeach;
}


?>


