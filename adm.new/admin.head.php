<?php
if (!defined('_GNUBOARD_')) exit;

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

$files = glob(G5_ADMIN_PATH.'/css/admin_extend_*');
if (is_array($files)) {
    foreach ((array) $files as $k=>$css_file) {
        
        $fileinfo = pathinfo($css_file);
        $ext = $fileinfo['extension'];
        
        if( $ext !== 'css' ) continue;
        
        $css_file = str_replace(G5_ADMIN_PATH, G5_ADMIN_URL, $css_file);
        add_stylesheet('<link rel="stylesheet" href="'.$css_file.'">', $k);
    }
}

include_once(G5_PATH.'/head.sub.php');

function print_menu1($key, $no='')
{
    global $menu;

    $str = print_menu2($key, $no);

    return $str;
}

function print_menu2($key, $no='')
{
    global $menu, $auth_menu, $is_admin, $auth, $g5, $sub_menu;

    $str .= "<ul>";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], 'r')))
            continue;

        if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)) $gnb_grp_div = 'gnb_grp_div';
        else $gnb_grp_div = '';

        if ($menu[$key][$i][4] == 1) $gnb_grp_style = 'gnb_grp_style';
        else $gnb_grp_style = '';

        $current_class = '';

        if ($menu[$key][$i][0] == $sub_menu){
            $current_class = ' on';
        }

        $str .= '<li data-menu="'.$menu[$key][$i][0].'"><a href="'.$menu[$key][$i][2].'" class="gnb_2da '.$gnb_grp_style.' '.$gnb_grp_div.$current_class.'">'.$menu[$key][$i][1].'</a></li>';

        $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
    }
    $str .= "</ul>";

    return $str;
}

$adm_menu_cookie = array(
'container' => '',
'gnb'       => '',
'btn_gnb'   => '',
);

if( ! empty($_COOKIE['g5_admin_btn_gnb']) ){
    $adm_menu_cookie['container'] = 'container-small';
    $adm_menu_cookie['gnb'] = 'gnb_small';
    $adm_menu_cookie['btn_gnb'] = 'btn_gnb_open';
}
?>
<!-- dashboard c3.js 챠트 -->
<script src="<?php echo G5_URL ?>/icecream/assets/plugins/charts-c3/js/c3.min.js"></script>
<script src="<?php echo G5_URL ?>/icecream/assets/plugins/charts-c3/js/d3.v3.min.js"></script>
<script src="<?php echo G5_URL ?>/icecream/assets/plugins/charts-c3/plugin.js"></script>
<!--//-->

<div id="hd_login_msg">GE10관리자체험님 로그인 중 <a href="http://icecreamge10.cafe24.com/bbs/logout.php">로그아웃</a></div><!-- 우측 뒤로가기,홈 퀵메뉴 #right_quick -->

<!-- // -->


<!--[if lt IE 9]>
<script type="text/javascript" src="http://icecreamge10.cafe24.com/adm.cream/js/respond.js"></script>
<script type="text/javascript" src="http://icecreamge10.cafe24.com/adm.cream/js/html5shiv.js"></script>
<![endif]-->

<!-- 프로그레스바 -->
<div id="progressbar"><!--가로형 스크롤 프로그레스바 adm.cream/css/icecream_admin.css 파일 #progressbar 정의//--></div>
<script>
$(function(){
$(window).scroll(function(){
var progress = ScrollporgressBar();
$('#progressbar').css("width",progress+'%');
});
function ScrollporgressBar(){
var maxY = document.documentElement.scrollHeight - document.documentElement.clientHeight;
return (window.scrollY / maxY) * 100;
}
})
</script>

<script>
var tempX = 0;
var tempY = 0;

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}
</script>

<!-- 선택출력되는 인크루드파일 설정 -->
<!-- 팝업이동 스크립트 -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script> 
<!--//-->



<!-- 맨위로 가기버튼 추가 -->
<a href="javascript:void(0);" id="Topscroll" title="맨위로" style="display: none;"><span><span class="lnr lnr-arrow-up"></span></span></a>
<!--//-->

<div id="to_content"><a href="#container">본문 바로가기</a></div>

<!-- 맨위로 가기버튼 추가 -->
<a href="javascript:void(0);" id="Topscroll" title="맨위로" style="display: none;"><span><span class="lnr lnr-arrow-up"></span></span></a>
<!--//-->

<div id="to_content"><a href="#container">본문 바로가기</a></div>
<header id="hd">
    <!-- hd_wrap -->
    <div id="hd_wrap">
    
        <!-- nav -->
        <nav id="gnb">
        <h2>메인메뉴</h2>
        <div class="gnb_wrap">
            
            <!-- @@ 우측 전체메뉴 아이콘(반응형) @@ -->
            <div class="pull-right quick_all">
                
                <li class="gnb_wrapli gnb_link">

        <!-- ajax로가져오기 -->
        <script>
	    $(function() {
		    timer = setInterval( function () {
			    //----------------------------------------------------------------------------------
			    /*$.ajax ({
			    	"url" : "http://icecreamge10.cafe24.com/adm.cream/ajax/ajax.alim.memo.php",  // ----- (1)
			    	cache : false,
			    	success : function (data) { // ----- (2)
			    		$("#realalimmemo").html(data); // ----- (3)
			    	}
		    	});*/
		    	//----------------------------------------------------------------------------------
	    	}, 120000); // 2분(120초)에 한번씩 받아온다.(1초 = 1000)
    	});
        </script>

        <span id="realalimmemo">
        
                <!-- 로그인 관리자 표시 : 드롭메뉴 adm.cream/js/bootstrap.min.js -->
                <div class="dropdown">
                  <!-- (1) 클릭 -->
                  
                  <a href="#" class="nav-link leading-none" data-toggle="dropdown">
                  <span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif); margin-top:10px;"></span>                                    </a>
                  
                  <!-- (2) 드롭다운메뉴 -->
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="line-height:150%;">
                    <a href="#" class="dropdown-item"><font class="skyblue">GE10관리자체험</font></a>
                    <a href="http://icecreamge10.cafe24.com/icecream/adm/logout.php" class="dropdown-item">로그아웃</a>
                    <a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?w=u&amp;mb_id=kim" class="dropdown-item">정보변경</a>
                    <a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?w=u&amp;mb_id=kim" class="dropdown-item">프로필이미지변경</a>
                    <a href="http://icecreamge10.cafe24.com/bbs/memo.php" target="_blank" class="win_memo dropdown-item">
                    받은쪽지
                                        </a>
                    <a href="#" class="blue dropdown-item text-center text-muted-dark">
					<span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/data/member/ki/kim.gif); margin-top:10px;width:22px;height:22px;"></span>					kim                    </a>
                  </div>
                </div>
                <!--//-->
        </span>
        <!-- ajax 로 가져오기 끝 -->
                </li>
                
                <li class="gnb_wrapli gnb_link">
                
                <!--<i class="fe fe-home lightblue font-16">fe 아이콘테스트용</i>-->
                
                <!-- 바로가기 : 드롭메뉴 adm.cream/js/bootstrap.min.js -->
                <div class="dropdown">
                  <a href="#" class="nav-link leading-none" data-toggle="dropdown"><i class="fe fe-home lightblue font-18"></i></a>
                  
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="line-height:150%; margin-top:10px;">
                    <!-- 내쇼핑몰 메인 -->
			                            <!-- 커뮤니티 메인-->
                    <a href="http://icecreamge10.cafe24.com/" target="_blank" class="dropdown-item"><i class="dropdown-icon fe fe-message-square font-14"></i>커뮤니티 홈</a>
                    <div class="dropdown-divider"></div>
                    <!-- mysql db 관리 -->
                                        <a href="http://icecreamge10.cafe24.com/adm.cream/php_admin/phpMyAdmin7/" target="_blank" class="dropdown-item" title="DB관리" data-toggle="tooltip"><i class="dropdown-icon fe fe-database font-14 lightblue"></i>MySQL Admin</a>
                                    <!--//-->
                    <div class="dropdown-divider"><!-- 구분선 --></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Site Preview</a>
                    
                  </div>
                </div>
                <!--//-->
                
                <!-- 최적화 : 드롭메뉴 adm.cream/js/bootstrap.min.js -->
                <div class="dropdown">
                  <a href="#" class="nav-link leading-none" data-toggle="dropdown"><i class="fe fe-sunrise lightblue font-22"></i></a>
                  
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="line-height:150%; margin-top:10px;">
                    <!-- 아이스크림DB업데이트 -->
                    <a href="http://icecreamge10.cafe24.com/adm.cream/icecream/icecream_DB_upgrade.php" class="dropdown-item"  data-toggle="tooltip" title="처음설치,패치후 실행"><i class="dropdown-icon fe fe-loader skyblue"></i>아이스크림 DB update</a>
                    <!-- // -->
                    <!-- 영카트DB업데이트 -->
                    <a href="http://icecreamge10.cafe24.com/adm.cream/dbupgrade.php" class="dropdown-item"  data-toggle="tooltip" title="처음설치,패치후 실행"><i class="dropdown-icon fe fe-zap"></i>영카트 DB update</a>
                    <!-- // -->
                    <!-- 브라우저캡업데이트 -->
                    <a href="http://icecreamge10.cafe24.com/adm.cream/browscap.php" class="dropdown-item"  data-toggle="tooltip" title="Browscap update"><i class="dropdown-icon fe fe-wifi"></i>Browscap update</a>
                    <!-- // -->
                    <div class="dropdown-divider"><!-- 구분선 --></div>
                    <!-- 사이트기록삭제(새창) -->
                    <a href="javascript:void(0)" onclick="win_adm_del('icecream_adm_del​​', 'http://icecreamge10.cafe24.com/adm.cream/icecream_del.php');" class="dropdown-item"  data-toggle="tooltip" title="세션,캐시,썸네일 삭제"><i class="dropdown-icon fe fe-trash-2 lightblue"></i>일괄삭제</a>
                    <!-- // -->
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">최적화</a>
                  </div>
                </div>
                <!--//-->
                
                <!-- 접속통계바로가기 -->
                <a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="at-tip" data-original-title="<nobr>접속통계</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
                <i class="fas fa-chart-bar pastel_green font-16" style="padding:0px 2px 0px;"></i>
                </a>
                <!--//-->
                
                <!-- (1) 회원검색 토글열기 -->
                <i class="fas fa-search pastel_green font-16" style="cursor:pointer;padding:0px 6px 0px 2px;" onclick="$('.tg_member_search').toggle()"></i>
                <!--//-->

                </li>
                
                <!-- 전체메뉴열기 -->
                <button type="button" id="btn_hdcate"><span class="lnr lnr-menu"></span><span class="sound_only">모바일메뉴열기</span></button>       
	    	</div>
            <!--@@ // @@-->
            
            <!-- @@ 좌측메뉴 @@ -->
            <ul class="gnb_wrapul">
                
                <li class="gnb_wrapli gnb_logo">
                <!--관리자홈으로 아이콘-->
                <div style=" display:inline-block;height:50px;">
                <a href="http://icecreamge10.cafe24.com/adm.cream" class="at-tip" data-original-title="<nobr>관리자홈으로</nobr>" data-toggle="tooltip" data-placement="right" data-html="true"><img src="http://icecreamge10.cafe24.com/adm.cream/img/ten.png" border="0" style="margin-bottom:14px;"></a>
                </div>
                <!--//-->
                
        <!-- ajax로가져오기 -->
        <script>
	    $(function() {
		    timer = setInterval( function () {
			    //----------------------------------------------------------------------------------
			    /*$.ajax ({
			    	"url" : "http://icecreamge10.cafe24.com/adm.cream/ajax/ajax.alim.php",  // ----- (1)
			    	cache : false,
			    	success : function (data) { // ----- (2)
			    		$("#realalim").html(data); // ----- (3)
			    	}
		    	});*/
		    	//----------------------------------------------------------------------------------
	    	}, 120000); // 2분(120초)에 한번씩 받아온다.(1초 = 1000)
    	});
        </script>

        <span id="realalim">

        <!--쇼핑알림-->
                <span class="memo_alim_none">
            <a onclick="win_adm_del('win_adm_alim​​', 'http://icecreamge10.cafe24.com/adm.cream/alim_today.php');" class="at-tip cursor" data-original-title="<nobr>실시간<br>쇼핑몰관리 알림</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
            <i class="fe fe-calendar"></i>
            </a>
        </span>
                <!--//-->
        
        </span>       
        <!--//-->
        
                </li>
                <!-- @@ // @@ -->
                
                
                                
				<li class="gnb_wrapli_gnbmenubar">
                    <!-- 상단주메뉴 -->
                    <div id="gnbmenubar">
                        <ul id="gnb_1dul">
				        <li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/config_form.php" class="gnb_1da">환경설정</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/admin.manager.php" class="gnb_2da gnb_grp_style gnb_grp_div">관리자설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/admin.manager.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 관리자매니저</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_main.php" class="gnb_2da gnb_grp_style gnb_grp_div">접속환경설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_main.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속화면설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_contact.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 사용자접속제한</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_rewrite.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 짧은주소설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_form.php" class="gnb_2da gnb_grp_style gnb_grp_div">사이트설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_form.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 기본환경설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_company.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회사정보등록</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_board.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판환경설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_seo.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 검색엔진최적화(SEO)</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_login.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 소셜로그인 사용</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_syndi.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 네이버신디케이션</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_mailsend.php" class="gnb_2da gnb_grp_style gnb_grp_div">메일환경설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_mailsend.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메일환경 및 발송설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sendmail_test.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메일테스트</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_sns.php" class="gnb_2da gnb_grp_style gnb_grp_div">외부연동서비스</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_sns.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> API키 등록</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/auth_list.php" class="gnb_2da  ">관리권한설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/service.php" class="gnb_2da gnb_grp_style gnb_grp_div">부가서비스안내</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/service.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 부가서비스</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/config_logo.php" class="gnb_1da">디자인</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/theme.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-magic"></i> 테마/메뉴</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/theme.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 테마관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/menu_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메뉴설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_logo.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-keyboard"></i> 설정디자인</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_logo.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 로고/파비콘</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_script.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 레이아웃추가설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bannerlist.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fab fa-adversal"></i> 배너관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/top.banner_admin/top.banner.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 탑배너관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/newwinlist.php" class="gnb_2da  "><i class="far fa-window-restore"></i> 팝업창관리</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php" class="gnb_1da">회 원</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 전체회원</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/member_listold.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 전체회원(구)</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/member_lev_conf.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원등급설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 포인트관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php#point_merge" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 포인트정리(주의)</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/mail_list.php" class="gnb_2da  ">회원메일발송</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_basic.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원가입설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_basic.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원가입정책설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_privacy.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원가입약관</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_ipin.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 본인확인서비스</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/board_list.php" class="gnb_1da">게시판</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_board.php" class="gnb_2da  ">게시판환경설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/board_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">게시판관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/board_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 목록</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/board_form.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 추가</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/boardgroup_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 그룹관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/contentlist.php" class="gnb_2da gnb_grp_style gnb_grp_div">콘텐츠관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/contentlist.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 내용관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/faqmasterlist.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> FAQ관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/qa_config.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 1:1문의설정</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php" class="gnb_1da">게시글 <span class="round_sm_lightorange font-normal">2</span></a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php" class="gnb_2da gnb_grp_style gnb_grp_div">최근게시물 <span class="round_sm_lightorange font-normal">2</span></a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway.php" class="gnb_2da gnb_grp_style gnb_grp_div">내맘대로 글관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 글 등록일/조회수 변경</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway_subject.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 글 제목 변경</a></li><li class="gnb_2dli"><a href="" class="gnb_2da gnb_grp_style gnb_grp_div">게시판목록 (관리자에서 보기)</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=qa" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 질문답변</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=free" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 자유게시판</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=test" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> test</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=molayo" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> [복사본] test</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=notice" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 공지사항</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=returm" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> [복사본] 자유게시판</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=gallery" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 갤러리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/write_count.php" class="gnb_2da gnb_grp_style gnb_grp_div">글,댓글 현황</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_today.php" class="gnb_1da">데이터룸</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_today.php" class="gnb_2da gnb_grp_style gnb_grp_div">오늘의랭킹</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_member.php" class="gnb_2da gnb_grp_style gnb_grp_div">랭킹</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_member.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 회원포인트랭킹</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_article.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 인기글</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_scrap.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 스크랩</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/view_scrap.php" class="gnb_2da gnb_grp_style gnb_grp_div">스크랩</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/view_scrap.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 스크랩 전체</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php" class="gnb_2da gnb_grp_style gnb_grp_div">인기검색어</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 인기검색어순위</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 인기검색어관리</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/member_EXCEL.php" class="gnb_1da">업로드</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/member_EXCEL.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원엑셀등록</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="gnb_1da">통계</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">접속통계</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자집계</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_search.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자검색</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_delete.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자로그삭제</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php" class="gnb_1da">클린/고객</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/config_contact.php" class="gnb_2da  ">스팸아이피차단</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php" class="gnb_2da gnb_grp_style gnb_grp_div">고객센터</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 1:1상담</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/poll_list.php" class="gnb_1da">프로모션</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/poll_list.php" class="gnb_2da  "><i class="fas fa-pie-chart"></i> 투표관리</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/config.php" class="gnb_1da">SMS</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/config.php" class="gnb_2da  ">SMS 기본설정</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/member_update.php" class="gnb_2da  ">회원정보업데이트</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/sms_write.php" class="gnb_2da  ">문자 보내기</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/history_list.php" class="gnb_2da gnb_grp2_style gnb_grp2_div">전송내역-건별</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/history_num.php" class="gnb_2da gnb_grp2_style gnb_grp2_div">전송내역-번호별</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/form_group.php" class="gnb_2da  ">이모티콘 그룹</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/form_list.php" class="gnb_2da  ">이모티콘 관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_group.php" class="gnb_2da gnb_grp2_style gnb_grp2_div">휴대폰번호 그룹</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_book.php" class="gnb_2da gnb_grp2_style gnb_grp2_div">휴대폰번호 관리</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_book_file.php" class="gnb_2da gnb_grp2_style gnb_grp2_div">휴대폰번호 파일</a></li></ul></li><li class="gnb_1dli">
<a href="http://icecreamge10.cafe24.com/adm.cream/pannel.php" class="gnb_1da">최적화</a><ul class="gnb_2dul"><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/pannel.php" class="gnb_2da  "><i class="fas fa-chart-pie"></i> 최적화패널</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/phpinfo.php" class="gnb_2da  "><i class="fas fa-clipboard-list"></i> phpinfo()</a></li><li class="gnb_2dli"><a href="#" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="far fa-trash-alt"></i> 일괄삭제</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/session_file_delete.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 세션파일 일괄삭제</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/cache_file_delete.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 캐시파일 일괄삭제</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/captcha_file_delete.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 캡챠파일 일괄삭제</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/thumbnail_file_delete.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 썸네일파일 일괄삭제</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap_convert.php" class="gnb_2da  ">접속로그 변환</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-broadcast-tower"></i> 업데이트</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> Browscap 업데이트</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/dbupgrade.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 영카트 DB업그레이드</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/icecream/icecream_DB_upgrade.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 아이스크림 DB업데이트</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/ar.hc_sql_dump.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-cloud-download-alt"></i> 백업</a></li><li class="gnb_2dli"><a href="http://icecreamge10.cafe24.com/adm.cream/ar.hc_sql_dump.php" class="gnb_2da gnb_grp2_style gnb_grp2_div"><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> HowCode SQL 덤프</a></li></ul></li>          	            </ul>
                    </div>
                    <!--//-->
				</li>
                
                                <!--<li><button type="button" class="gnb_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>-->
            </ul>
        </div>
        
                <!-- (1) 회원검색토글창 -->
        <div class="tg_member_search" style="display:none;width:100%;padding:10px 0 10px;background:#FFF7D1;border-bottom:solid 1px #ddd;">
        <!----------------------------- 메인 회원검색창 ---------------------------------------->
        <!-- 검색창 -->
        

<!----------------------------- 메인 회원검색창 ---------------------------------------->
<!-- 검색창 -->
<div class="main-schbox1" style="text-align:center;"><!-- 검색창 -->
    <div class="row"><!-- row 시작 { -->
    <form id="fsearch" name="fsearch" class="main_big_sch" method="get" action="http://icecreamge10.cafe24.com/adm.cream/member_list.php?&sfl=mb_info&stx=">
    <input type="hidden" name="sfl" value="mb_info" id="sfl">

    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="" id="stx" required class="required frm_input_big" placeholder="고객상담을 위한 검색(회원아이디,이름,닉네임,휴대폰,전화,이메일로 검색가능)">
    <input type="submit" class="btn_submit_big" value="검색">

</form>
    </div><!-- } row 끝 -->
</div><!-- 검색창 -->
<!-- 검색창 끝 -->
<!------------------------------------ // ----------------------------------------------->
        <!-- // -->
        <!-- 검색창 끝 -->
        <!------------------------------------ // ----------------------------------------------->      
        </div>
        <!--//-->
                
        </nav><!-- nav -->
    </div><!-- hd_wrap -->  
</header>
<!-- 모바일 사이드 관리자메뉴바 :: 스크롤시 하단에 붙어서 표시됨 -->

<div id="menusero" class="menu">
    <!-- 닫기 -->
    <button type="button" class="menu_close">×<span class="sound_only">카테고리닫기</span></button>
    <!--//-->
    <div class="cate_bg"></div>
    
    <div class="menu_wr">
    
    <!-- @@@@@ 관리자메뉴기본표시 @@@@@ -->
    <div id="gnbindex">
        <!-- (1) 버전표시 -->

        <!-- (2) 관리자정보표시 -->
        <div class="user">
                <!-- 로그인 관리자 표시 : 드롭메뉴 adm.cream/js/bootstrap.min.js -->
                <div class="dropdown">
                  <!-- (1) 클릭 -->
                  <a href="#" class="nav-link leading-none" data-toggle="dropdown">
                  <span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif); width:50px;height:50px;margin-top:10px;"></span>                                    </a>
                  
                  <!-- (2) 드롭다운메뉴 -->
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="z-index:999999;">
                    <a href="#" class="dropdown-item"><font class="skyblue">GE10관리자체험</font></a>
                    <a href="http://icecreamge10.cafe24.com/icecream/adm/logout.php" class="dropdown-item">로그아웃</a>
                    <a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?w=u&amp;mb_id=kim" class="dropdown-item">정보변경</a>
                    <a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?w=u&amp;mb_id=kim" class="dropdown-item">프로필이미지변경</a>
                    <a href="http://icecreamge10.cafe24.com/bbs/memo.php" target="_blank" class="win_memo dropdown-item">
                    받은쪽지
                                        </a>
                    
                    <a href="#" class="blue dropdown-item text-center text-muted-dark">
					<span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/data/member/ki/kim.gif); margin-top:10px;width:22px;height:22px;"></span>					kim                    </a>
                  </div>
                </div>
                <!--//-->
                
                <!-- 쇼핑알림 -->
                                <span class="memo_alim_none" style="margin:0;padding:0;">
                    <a onclick="win_adm_del('win_adm_alim​​', 'http://icecreamge10.cafe24.com/adm.cream/alim_today.php');" class="at-tip cursor" data-original-title="<nobr>실시간<br>알림</nobr>" data-toggle="tooltip" data-placement="top" data-html="true">
                    <i class="fe fe-calendar"></i>  
                    </a>
                </span>
                                <!--//-->
                
        </div>
        
    </div>
    <!-- @@@@@ // @@@@@ -->

    <!-- @@@@@@ 좌측메뉴@@@@@ -->
	<nav id="gnbsero" class="gnb_large ">
        <!--<h2>관리자 주메뉴</h2>-->
        <ul class="gnb_ul">
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-100 menu-order-1" title="환경설정"></button><span class="gnb_tit">환경설정</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>환경설정</h3>
                        <ul><li data-menu="100900"><a href="http://icecreamge10.cafe24.com/adm.cream/admin.manager.php" class="gnb_2da gnb_grp_style gnb_grp_div">관리자설정</a></li><li data-menu="100901"><a href="http://icecreamge10.cafe24.com/adm.cream/admin.manager.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 관리자매니저</a></li><li data-menu="100600"><a href="http://icecreamge10.cafe24.com/adm.cream/config_main.php" class="gnb_2da gnb_grp_style gnb_grp_div">접속환경설정</a></li><li data-menu="100601"><a href="http://icecreamge10.cafe24.com/adm.cream/config_main.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속화면설정</a></li><li data-menu="100602"><a href="http://icecreamge10.cafe24.com/adm.cream/config_contact.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 사용자접속제한</a></li><li data-menu="100603"><a href="http://icecreamge10.cafe24.com/adm.cream/config_rewrite.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 짧은주소설정</a></li><li data-menu="100100a"><a href="http://icecreamge10.cafe24.com/adm.cream/config_form.php" class="gnb_2da gnb_grp_style gnb_grp_div">사이트설정</a></li><li data-menu="100100"><a href="http://icecreamge10.cafe24.com/adm.cream/config_form.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 기본환경설정</a></li><li data-menu="100105"><a href="http://icecreamge10.cafe24.com/adm.cream/config_company.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회사정보등록</a></li><li data-menu="100101"><a href="http://icecreamge10.cafe24.com/adm.cream/config_board.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판환경설정</a></li><li data-menu="100103"><a href="http://icecreamge10.cafe24.com/adm.cream/config_seo.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 검색엔진최적화(SEO)</a></li><li data-menu="100102"><a href="http://icecreamge10.cafe24.com/adm.cream/config_login.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 소셜로그인 사용</a></li><li data-menu="100104"><a href="http://icecreamge10.cafe24.com/adm.cream/config_syndi.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 네이버신디케이션</a></li><li data-menu="100300a"><a href="http://icecreamge10.cafe24.com/adm.cream/config_mailsend.php" class="gnb_2da gnb_grp_style gnb_grp_div">메일환경설정</a></li><li data-menu="100301"><a href="http://icecreamge10.cafe24.com/adm.cream/config_mailsend.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메일환경 및 발송설정</a></li><li data-menu="100300"><a href="http://icecreamge10.cafe24.com/adm.cream/sendmail_test.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메일테스트</a></li><li data-menu="100500a"><a href="http://icecreamge10.cafe24.com/adm.cream/config_sns.php" class="gnb_2da gnb_grp_style gnb_grp_div">외부연동서비스</a></li><li data-menu="100503"><a href="http://icecreamge10.cafe24.com/adm.cream/config_sns.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> API키 등록</a></li><li data-menu="100200"><a href="http://icecreamge10.cafe24.com/adm.cream/auth_list.php" class="gnb_2da  ">관리권한설정</a></li><li data-menu="100210a"><a href="http://icecreamge10.cafe24.com/adm.cream/service.php" class="gnb_2da gnb_grp_style gnb_grp_div">부가서비스안내</a></li><li data-menu="100400"><a href="http://icecreamge10.cafe24.com/adm.cream/service.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 부가서비스</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-155 menu-order-2" title="디자인"></button><span class="gnb_tit">디자인</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>디자인</h3>
                        <ul><li data-menu="155100"><a href="http://icecreamge10.cafe24.com/adm.cream/theme.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-magic"></i> 테마/메뉴</a></li><li data-menu="155101"><a href="http://icecreamge10.cafe24.com/adm.cream/theme.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 테마관리</a></li><li data-menu="155102"><a href="http://icecreamge10.cafe24.com/adm.cream/menu_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 메뉴설정</a></li><li data-menu="155200"><a href="http://icecreamge10.cafe24.com/adm.cream/config_logo.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-keyboard"></i> 설정디자인</a></li><li data-menu="155201"><a href="http://icecreamge10.cafe24.com/adm.cream/config_logo.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 로고/파비콘</a></li><li data-menu="155202"><a href="http://icecreamge10.cafe24.com/adm.cream/config_script.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 레이아웃추가설정</a></li><li data-menu="155300"><a href="http://icecreamge10.cafe24.com/adm.cream/bannerlist.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fab fa-adversal"></i> 배너관리</a></li><li data-menu="155351"><a href="http://icecreamge10.cafe24.com/adm.cream/top.banner_admin/top.banner.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 탑배너관리</a></li><li data-menu="155401"><a href="http://icecreamge10.cafe24.com/adm.cream/newwinlist.php" class="gnb_2da  "><i class="far fa-window-restore"></i> 팝업창관리</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-200 menu-order-3" title="회 원"></button><span class="gnb_tit">회 원</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>회 원</h3>
                        <ul><li data-menu="200100a"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원관리</a></li><li data-menu="200100"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 전체회원</a></li><li data-menu="200110"><a href="http://icecreamge10.cafe24.com/adm.cream/member_listold.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 전체회원(구)</a></li><li data-menu="200150"><a href="http://icecreamge10.cafe24.com/adm.cream/member_lev_conf.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원등급설정</a></li><li data-menu="200160"><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 포인트관리</a></li><li data-menu="200170"><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php#point_merge" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 포인트정리(주의)</a></li><li data-menu="200300"><a href="http://icecreamge10.cafe24.com/adm.cream/mail_list.php" class="gnb_2da  ">회원메일발송</a></li><li data-menu="200200"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_basic.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원가입설정</a></li><li data-menu="200201"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_basic.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원가입정책설정</a></li><li data-menu="200202"><a href="http://icecreamge10.cafe24.com/adm.cream/config_reg_privacy.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 회원가입약관</a></li><li data-menu="200203"><a href="http://icecreamge10.cafe24.com/adm.cream/config_ipin.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 본인확인서비스</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-300 menu-order-4" title="게시판"></button><span class="gnb_tit">게시판</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>게시판</h3>
                        <ul><li data-menu="100101"><a href="http://icecreamge10.cafe24.com/adm.cream/config_board.php" class="gnb_2da  ">게시판환경설정</a></li><li data-menu="300100a"><a href="http://icecreamge10.cafe24.com/adm.cream/board_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">게시판관리</a></li><li data-menu="300100"><a href="http://icecreamge10.cafe24.com/adm.cream/board_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 목록</a></li><li data-menu="300110"><a href="http://icecreamge10.cafe24.com/adm.cream/board_form.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 추가</a></li><li data-menu="300200"><a href="http://icecreamge10.cafe24.com/adm.cream/boardgroup_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 게시판 그룹관리</a></li><li data-menu="300500a"><a href="http://icecreamge10.cafe24.com/adm.cream/contentlist.php" class="gnb_2da gnb_grp_style gnb_grp_div">콘텐츠관리</a></li><li data-menu="300600"><a href="http://icecreamge10.cafe24.com/adm.cream/contentlist.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 내용관리</a></li><li data-menu="300700"><a href="http://icecreamge10.cafe24.com/adm.cream/faqmasterlist.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> FAQ관리</a></li><li data-menu="300500"><a href="http://icecreamge10.cafe24.com/adm.cream/qa_config.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 1:1문의설정</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-333 menu-order-5" title="게시글 "></button><span class="gnb_tit">게시글 </span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>게시글 </h3>
                        <ul><li data-menu="333100"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php" class="gnb_2da gnb_grp_style gnb_grp_div">최근게시물 </a></li><li data-menu="333200"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway.php" class="gnb_2da gnb_grp_style ">내맘대로 글관리</a></li><li data-menu="333201"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 글 등록일/조회수 변경</a></li><li data-menu="333202"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.myway_subject.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 글 제목 변경</a></li><li data-menu="333300"><a href="" class="gnb_2da gnb_grp_style gnb_grp_div">게시판목록 (관리자에서 보기)</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=qa" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 질문답변</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=free" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 자유게시판</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=test" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> test</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=molayo" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> [복사본] test</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=notice" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 공지사항</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=returm" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> [복사본] 자유게시판</a></li><li data-menu="333301"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/board.php?bo_table=gallery" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 갤러리</a></li><li data-menu="333820"><a href="http://icecreamge10.cafe24.com/adm.cream/write_count.php" class="gnb_2da gnb_grp_style gnb_grp_div">글,댓글 현황</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-355 menu-order-6" title="데이터룸"></button><span class="gnb_tit">데이터룸</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>데이터룸</h3>
                        <ul><li data-menu="355100"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_today.php" class="gnb_2da gnb_grp_style gnb_grp_div">오늘의랭킹</a></li><li data-menu="355300"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_member.php" class="gnb_2da gnb_grp_style ">랭킹</a></li><li data-menu="355301"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_member.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 회원포인트랭킹</a></li><li data-menu="355302"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_article.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 인기글</a></li><li data-menu="355303"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_scrap.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> BEST 스크랩</a></li><li data-menu="355400"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/view_scrap.php" class="gnb_2da gnb_grp_style gnb_grp_div">스크랩</a></li><li data-menu="355401"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/view_scrap.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 스크랩 전체</a></li><li data-menu="355200"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php" class="gnb_2da gnb_grp_style gnb_grp_div">인기검색어</a></li><li data-menu="355201"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 인기검색어순위</a></li><li data-menu="355202"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 인기검색어관리</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-390 menu-order-7" title="업로드"></button><span class="gnb_tit">업로드</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>업로드</h3>
                        <ul><li data-menu="390100"><a href="http://icecreamge10.cafe24.com/adm.cream/member_EXCEL.php" class="gnb_2da gnb_grp_style gnb_grp_div">회원엑셀등록</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-500 menu-order-8" title="통계"></button><span class="gnb_tit">통계</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>통계</h3>
                        <ul><li data-menu="500100"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="gnb_2da gnb_grp_style gnb_grp_div">접속통계</a></li><li data-menu="500101"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자집계</a></li><li data-menu="500102"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_search.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자검색</a></li><li data-menu="500103"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_delete.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 접속자로그삭제</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-600 menu-order-9" title="클린/고객"></button><span class="gnb_tit">클린/고객</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>클린/고객</h3>
                        <ul><li data-menu="600001"><a href="http://icecreamge10.cafe24.com/adm.cream/config_contact.php" class="gnb_2da  ">스팸아이피차단</a></li><li data-menu="600100"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php" class="gnb_2da gnb_grp_style gnb_grp_div">고객센터</a></li><li data-menu="600101"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 1:1상담</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-633 menu-order-10" title="프로모션"></button><span class="gnb_tit">프로모션</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>프로모션</h3>
                        <ul><li data-menu="633100"><a href="http://icecreamge10.cafe24.com/adm.cream/poll_list.php" class="gnb_2da  "><i class="fas fa-pie-chart"></i> 투표관리</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-900 menu-order-11" title="SMS"></button><span class="gnb_tit">SMS</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>SMS</h3>
                        <ul><li data-menu="900100"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/config.php" class="gnb_2da  ">SMS 기본설정</a></li><li data-menu="900200"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/member_update.php" class="gnb_2da  ">회원정보업데이트</a></li><li data-menu="900300"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/sms_write.php" class="gnb_2da  ">문자 보내기</a></li><li data-menu="900400"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/history_list.php" class="gnb_2da  ">전송내역-건별</a></li><li data-menu="900410"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/history_num.php" class="gnb_2da  ">전송내역-번호별</a></li><li data-menu="900500"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/form_group.php" class="gnb_2da  ">이모티콘 그룹</a></li><li data-menu="900600"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/form_list.php" class="gnb_2da  ">이모티콘 관리</a></li><li data-menu="900700"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_group.php" class="gnb_2da  ">휴대폰번호 그룹</a></li><li data-menu="900800"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_book.php" class="gnb_2da  ">휴대폰번호 관리</a></li><li data-menu="900900"><a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/num_book_file.php" class="gnb_2da  ">휴대폰번호 파일</a></li></ul>                    </div>
                </div>
            </li>
                        <li class="gnb_li">
                <button type="button" class="btn_op menu-999 menu-order-12" title="최적화"></button><span class="gnb_tit">최적화</span>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>최적화</h3>
                        <ul><li data-menu="999110"><a href="http://icecreamge10.cafe24.com/adm.cream/pannel.php" class="gnb_2da  "><i class="fas fa-chart-pie"></i> 최적화패널</a></li><li data-menu="999500"><a href="http://icecreamge10.cafe24.com/adm.cream/phpinfo.php" class="gnb_2da  "><i class="fas fa-clipboard-list"></i> phpinfo()</a></li><li data-menu="999700"><a href="#" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="far fa-trash-alt"></i> 일괄삭제</a></li><li data-menu="999800"><a href="http://icecreamge10.cafe24.com/adm.cream/session_file_delete.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 세션파일 일괄삭제</a></li><li data-menu="999900"><a href="http://icecreamge10.cafe24.com/adm.cream/cache_file_delete.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 캐시파일 일괄삭제</a></li><li data-menu="999910"><a href="http://icecreamge10.cafe24.com/adm.cream/captcha_file_delete.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 캡챠파일 일괄삭제</a></li><li data-menu="999920"><a href="http://icecreamge10.cafe24.com/adm.cream/thumbnail_file_delete.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 썸네일파일 일괄삭제</a></li><li data-menu="999520"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap_convert.php" class="gnb_2da  ">접속로그 변환</a></li><li data-menu="999400"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-broadcast-tower"></i> 업데이트</a></li><li data-menu="999510"><a href="http://icecreamge10.cafe24.com/adm.cream/browscap.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> Browscap 업데이트</a></li><li data-menu="999410"><a href="http://icecreamge10.cafe24.com/adm.cream/dbupgrade.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 영카트 DB업그레이드</a></li><li data-menu="999710"><a href="http://icecreamge10.cafe24.com/adm.cream/icecream/icecream_DB_upgrade.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> 아이스크림 DB업데이트</a></li><li data-menu="999600"><a href="http://icecreamge10.cafe24.com/adm.cream/ar.hc_sql_dump.php" class="gnb_2da gnb_grp_style gnb_grp_div"><i class="fas fa-cloud-download-alt"></i> 백업</a></li><li data-menu="999610"><a href="http://icecreamge10.cafe24.com/adm.cream/ar.hc_sql_dump.php" class="gnb_2da  "><img src="http://icecreamge10.cafe24.com/adm.cream/img/left-plus.gif"> HowCode SQL 덤프</a></li></ul>                    </div>
                </div>
            </li>
                    </ul>
    </nav>
    <!-- @@@@@ // @@@@@-->
    
    </div>
</div>
<!-- 관리자메뉴 스크립트 -->
<script>
jQuery(function($){

    var menu_cookie_key = 'g5_admin_btn_gnb';

    $(".tnb_mb_btn").click(function(){
        $(".tnb_mb_area").toggle();
    });

    $("#btn_gnb").click(function(){
        
        var $this = $(this);

        try {
            if( ! $this.hasClass("btn_gnb_open") ){
                set_cookie(menu_cookie_key, 1, 60*60*24*365);
            } else {
                delete_cookie(menu_cookie_key);
            }
        }
        catch(err) {
        }

        $("#container").toggleClass("container-small");
        $("#gnb").toggleClass("gnb_small");
        $this.toggleClass("btn_gnb_open");

    });

    $(".gnb_ul li .btn_op" ).click(function() {
        $(this).parent().addClass("on").siblings().removeClass("on");
    });

});
</script>
<!--//-->
<script>
$(function (){

    $("button.sub_ct_toggle").on("click", function() {
        var $this = $(this);
        $sub_ul = $(this).closest("li").children("ul.sub_cate");

        if($sub_ul.size() > 0) {
            var txt = $this.text();

            if($sub_ul.is(":visible")) {
                txt = txt.replace(/닫기$/, "열기");
                $this
                    .removeClass("ct_cl")
                    .text(txt);
            } else {
                txt = txt.replace(/열기$/, "닫기");
                $this
                    .addClass("ct_cl")
                    .text(txt);
            }

            $sub_ul.toggle();
        }
    });


    $(".content li.con").hide();
    $(".content li.con:first").show();   
    $(".cate_tab li a").click(function(){
        $(".cate_tab li a").removeClass("selected");
        $(this).addClass("selected");
        $(".content li.con").hide();
        //$($(this).attr("href")).show();
        $($(this).attr("href")).fadeIn();
    });
     
});
</script>
<script>
	
	$("#btn_hdcate").on("click", function() {
        $("#menusero").show();
    });

    $(".menu_close").on("click", function() {
        $(".menu").hide();
    });
     $(".cate_bg").on("click", function() {
        $(".menu").hide();
    });
</script>
<!--//-->