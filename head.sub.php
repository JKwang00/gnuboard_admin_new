<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 테마 head.sub.php 파일
if(!defined('G5_IS_ADMIN') && defined('G5_THEME_PATH') && is_file(G5_THEME_PATH.'/head.sub.php')) {
    require_once(G5_THEME_PATH.'/head.sub.php');
    return;
}

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    $g5_head_title .= " | ".$config['cf_title'];
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<?php if( G5_IS_ADMIN ) { ?>
<!doctype html>
<html lang="ko">
<head>
<!-- 아이스크림 10.0.0 소스추가 / 파비콘표시 -->
<link rel="shortcut icon" href="http://icecreamge10.cafe24.com/favicon.ico" type="image/x-ico"><link rel="apple-touch-icon-precomposed" href="http://icecreamge10.cafe24.com/favicon-152.png"><meta name="msapplication-TileColor" content="#FF6600"><meta name="msapplication-TileImage" content="http://icecreamge10.cafe24.com/favicon-144.png"><!--//-->
<meta charset="utf-8">
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>관리자메인 | 그누보드5</title>
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/adm.cream/css/icecream_admin.css">
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/css/anything.css">
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/js/tingle-master/dist/tingle.min.css">
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/adm.cream/css/input.css">

<!--[if lte IE 8]>
<script src="http://icecreamge10.cafe24.com/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "http://icecreamge10.cafe24.com";
var g5_bbs_url   = "http://icecreamge10.cafe24.com/bbs";
var g5_is_member = "1";
var g5_is_admin  = "";
var g5_is_mobile = "";
var g5_bo_table  = "";
var g5_sca       = "";
var g5_editor    = "";
var g5_cookie_domain = "";
var g5_admin_url = "http://icecreamge10.cafe24.com/adm.cream";
</script>
<!--<script src="http://icecreamge10.cafe24.com/js/jquery-1.8.3.min.js"></script>-->
<script src="<?php echo G5_JS_URL ?>/jquery-1.12.4.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery-migrate-1.4.1.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js?ver=191202"></script>
<script src="<?php echo G5_JS_URL ?>/common.js?ver=191202"></script>
<script src="<?php echo G5_JS_URL ?>/icecream.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.fade-in.js"></script>
<script src="<?php echo G5_JS_URL ?>/tingle-master/dist/tingle.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js?ver=191202"></script>
<script src="<?php echo G5_JS_URL ?>/placeholders.min.js"></script>

<!-- @@@@@ 아이스크림 관리자전용 js/css 삽입 @@@@@ -->
<script type="text/javascript" src="http://icecreamge10.cafe24.com/adm.cream/js/icecream.js"></script>


<!-- 폰트어썸 https://fontawesome.com/icons?d=gallery&m=free -->
<link rel="stylesheet" href="<?php echo G5_JS_URL ?>/font-awesome5/css/all.css">
<!-- 라이너아이콘 https://linearicons.com/free -->
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<!-- 아이스크림S10.0.0 리모달 http://vodkabears.github.io/remodal/ -->
<script src="http://icecreamge10.cafe24.com/js/remodal/remodal.js"></script>
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/js/remodal/remodal-default-theme.css">
<link rel="stylesheet" href="http://icecreamge10.cafe24.com/js/remodal/remodal.css">
<!--//-->

<!-- 대시보드 부트스트랩 dashboard CSS -->
<link href="<?php echo G5_URL ?>/icecream/assets/css/dashboard.css" rel="stylesheet">
<script src="<?php echo G5_URL ?>/icecream/assets/js/core.js"></script>
<!--//-->

<!-- c3.js 챠트 -->
<link href="<?php echo G5_URL ?>/icecream/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
<!--//-->

<!--
회원아이디/회원이름/상품명등 검색시 자동완성을 위한 jquery 파일 가져오기 (아이스크림전용 201-01-11)
----------------------------------------------------------------------------------------------------
(관련파일)
--------------------------------------------------------------
adm/admin.head.sub.php 파일. js실행파일 링크(254~258줄)
adm/ajax/ajax.check_member.php 파일. 자동완성을 위한 체크기능
--------------------------------------------------------------
-->
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<!--중복오류로 관리자메인 탭메뉴등 에러가 발생해서 제외함
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
-->
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- @@@@@ // @@@@@ -->


<!-- 실시간 시계 스크립트 2019-02-18 아이스크림 -->
<script>
//실시간 움직이는 전자시계 방식,서버시간으로 표시 (ex) 12:45:23
//시계 표시할곳에 <div id="realtime"></div>
var now = new Date(1596331378*1000);
Number.prototype.zf = function(){return (this > 9 ? '' : '0') + this;}; 
function startTime() { 
	now.setSeconds(now.getSeconds() + 1);
        var h = now.getHours().zf(), m = now.getMinutes().zf(), s = now.getSeconds().zf();
        document.getElementById('realtime').innerHTML = h + ':' + m + ':' + s;
	setTimeout('startTime()',1000);
}
</script>
<!--//-->

</head>
<body onLoad="startTime()">
<?php } else { ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<?php
if (G5_IS_MOBILE) {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=Edge">'.PHP_EOL;
}

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<title><?php echo $g5_head_title; ?></title>
<?php
if (defined('G5_IS_ADMIN')) {
    if(!defined('_THEME_PREVIEW_'))
        echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_ADMIN_URL.'/css/admin.css?ver='.G5_CSS_VER, G5_URL).'">'.PHP_EOL;
} else {
    echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_CSS_URL.'/'.(G5_IS_MOBILE ?'mobile':'default').'.css?ver='.G5_CSS_VER, G5_URL).'">'.PHP_EOL;
}
?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>
<?php
add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

if(G5_IS_MOBILE) {
    add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}
?>
<?php } ?>