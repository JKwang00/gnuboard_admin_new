<?php
$sub_menu = '100000';
include_once('./_common.php');

@include_once('./safe_check.php');
if(function_exists('social_log_file_delete')){
    social_log_file_delete(86400);      //소셜로그인 디버그 파일 24시간 지난것은 삭제
}

$g5['title'] = '관리자메인';
include_once ('./admin.head.php');

$new_member_rows = 5;
$new_point_rows = 5;
$new_write_rows = 5;

$sql_common = " from {$g5['member_table']} ";

$sql_search = " where (1) ";

if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$new_member_rows} ";
$result = sql_query($sql);

$colspan = 12;
?>


<div id="table_wrap">

<!-- [관리자메인에서만노출] 관리자서비스이용정보 -->
<!-- // -->

<div id="wrapper">
    <div id="container">
        <div class="left_closed cursor" onclick="$('.leftside').toggle()" title="좌측메뉴닫기">&lt;</div>
		
		
<div class="main_paper1" id="table_wrap">
    <!--@@@@@@ (페이퍼-좌측) @@@@@@-->
    <div class="papers paper_left_width">

        <!-- [불러오기] 관리자 현황판 -->
		

<section><div class="div_icesign_zero">
<!-- ### 가로 전체 시작 ### -->

    <!-- (1단 가로1) 오늘 회원가입/회원탈퇴 -->

    <div class="box box-white li_width12"><!-- 가로1열기 -->
        <div class="alim"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray font-normal">회원탈퇴없음</span></a></div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray">-</span></a>
        </div>
        <div class="tit">
            오늘 회원가입
        </div>
        <!-- [끝] //-->
    </div><!-- 가로1닫기 //-->
    <!--//-->
    
    <!-- (1단 가로2) 오늘 방문자 -->

    <div class="box box-white li_width12"><!-- 가로1열기 -->
        <div class="alim">어제 3</div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php?fr_date=2020-08-02&to_date=2020-08-02"><span class="black">3</span></a>
        </div>
        <div class="tit">
            오늘 방문자
        </div>
        <!-- [끝] //-->
    </div><!-- 가로1닫기 //-->
    <!--//-->
    
    <!-- (1단 가로3) 오늘 새글 -->

    <div class="box box-white li_width12"><!-- 가로3열기 -->
        <div class="alim"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">어제 0</span></a></div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a>
        </div>
        <div class="tit">
            오늘 새글
        </div>
        <!-- [끝] //-->
    </div><!-- 가로3닫기 //-->

    <!--//-->
    
    <!-- (1단 가로4) 오늘 댓글 -->

    <div class="box box-white li_width12"><!-- 가로4열기 -->
        <div class="alim"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">어제 0</span></a></div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a>
        </div>
        <div class="tit">
            오늘 댓글
        </div>
        <!-- [끝] //-->
    </div><!-- 가로4닫기 //-->

    <!--//-->
    
    <!-- (1단 가로5) 오늘 읽은글 -->

    <div class="box box-white li_width12"><!-- 가로5열기 -->
        <div class="alim"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_article.php">어제 3</a></div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_today.php"><span class="gray">-</span></a>
        </div>
        <div class="tit">
            오늘 읽은글
        </div>
        <!-- [끝] //-->
    </div><!-- 가로5닫기 //-->

    <!--//-->
    
    <!-- (1단 가로6) 오늘 포인트 -->

    <div class="box box-white li_width12"><!-- 가로6열기 -->
        <div class="alim"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php">+</a></div>
        <div class="h10"></div>
        <!-- [시작] -->
        <div class="score">
            <a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php"><span class="gray">-</span></a>
        </div>
        <div class="tit">
            오늘 검색어수
        </div>
        <!-- [끝] //-->
    </div><!-- 가로6닫기 //-->

    <!--//-->
    
<!-- ### 가로전체 끝 ### -->
</div>
</section>

<!-- [섹션] 오늘의방문자 그래프 { -->
<section><div class="div_alpha_board1"><!-- ### 가로 전체 시작 ### -->

    <!-- [불러오기] 챠트1// -->
    <div class="box li_width1"><!-- 가로1열기 -->
        <h5><a href="javascript:location.reload()" class="at-tip" data-original-title="<nobr>새로고침</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fas fa-redo-alt lightyellowgreen"></i></a>&nbsp;&nbsp;<a href="./visit_list.php">오늘 시간대별 방문자</a>
        <span class="pull-right orangered">오전 00:00 ~ 오후 12:00</span></h5>
        <div class="h10"></div>
        
        <!-- 챠트그리기 -->
        <div id="dayvisit_chart" style="height:220px; width:95%;"></div>
        <script>
        <!-- types : area, area-spline, bar 등등 -->
        var areachart = c3.generate({
          bindto: "#dayvisit_chart",
          data: {
            x: "day",
            columns: [
              ["day", '00(0.0%)','01(33.3%)','02(0.0%)','03(33.3%)','04(0.0%)','05(0.0%)','06(0.0%)','07(33.3%)','08(0.0%)','09(0.0%)','10(0.0%)','11(0.0%)',],
              ['방문자', 0,1,0,1,0,0,0,1,0,0,0,0,],
            ],
            types: {
              방문자: 'area-spline',
            },
			labels: true,
        	/*
        	colors: {
              주문: "#337ab7",
              취소: "#328cc1",
            },
            */
          },
          /*
          bar: {
            width: {
              ratio: 0.2,            
            },
          },
          */
          axis: {
            x: {
              type: "category",
            },
          },
        });
        
        </script>
        <!-- 챠트그리기 닫기 -->
        
    </div><!-- 가로1닫기 //-->
    <!-- [불러오기] 챠트1// -->

</div><!-- ### 가로 전체 끝 ### -->
</section><!--//-->



<!-- [섹션] 오늘 일어난 일 { -->
<section><div class="div_alpha_board1">
<!-- ### 가로 전체 시작 ### -->

    <!-- (가로1) 오늘/어제/한달간 일어난 일 -->
    <div class="box li_width11" style="margin-bottom:0"><!-- 가로1열기 -->

    <div class="tbl_scoreboard3"><!-- [표] 오늘발생한이벤트 { -->
    <table> 
        <thead>
            <tr>
                <th scope="col" colspan="2" style="height:22px; color:#222; background:#fff;"><b>회원/접속</b></th>
                <th scope="col">회원<br>가입</th>
                <th scope="col">회원<br>탈퇴</th>
                <th scope="col">방문<br>통계</th>
                <th scope="col">포인<br>트+</th>
            </tr>
        </thead>
        <tbody>
            <!-- 오늘 { -->
            <tr style="font-weight:bold; height:38px;">
                <th scope="col" style="width:34px;background:#FDED80;text-align:center;padding:0;">오늘</th>
                <th scope="col" style="width:65px;background:#FDED80;color:#222;font-weight:normal;text-align:center;padding:0;">
                                <b>08-02</b>(일)
                </th>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray">-</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php?sst=mb_leave_date&sod=desc&sfl=&stx="><span class="gray">-</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php?fr_date=2020-08-02&to_date=2020-08-02"><span class="darkgreen">3</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php"><span class="darkgreen">200</span></a></td>
            </tr>
            <!-- } 오늘 //-->
            <!-- 어제 { -->
            <tr style="height:38px;">
                <th scope="col" style="width:34px;text-align:center;padding:0;">어제</th>
                <th scope="col" style="width:65px;font-weight:normal;text-align:center;padding:0;">
                08/01                </th>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php?sst=mb_leave_date&sod=desc&sfl=&stx="><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php?fr_date=2020-08-01&to_date=2020-08-01">3</a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php">200</a></td>
            </tr>
            <!-- } 어제 //-->
            <!-- 이달 (1일~말일) { -->
            <tr style="height:38px;">
                <th scope="col" style="width:34px;text-align:center;padding:0;">이달</th>
                <th scope="col" style="width:65px;color:#222;font-weight:normal;text-align:center;padding:0;">
                1일~02일
                </th>
              <td><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php?sst=mb_leave_date&sod=desc&sfl=&stx="><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php?fr_date=2020-08-01&to_date=2020-08-02">6</a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/point_list.php">400</a></td>
            </tr>
            <!-- } 이달(1일~말일) //--> 
        </tbody>
    </table>
    </div><!-- [표] 오늘발생한이벤트 끝// -->

    </div><!-- 가로1닫기 //-->
    <!--//-->
    
    
    <!-- (가로1) 오늘/어제/한달간 일어난 일 -->
    <div class="box li_width11" style="margin-bottom:0"><!-- 가로1열기 -->

    <div class="tbl_scoreboard3"><!-- [표] 오늘발생한이벤트 { -->
    <table> 
        <thead>
            <tr>
                <th scope="col" colspan="2" style="height:22px; color:#222; background:#fff;"><b>활동현황표</b></th>
                <th scope="col">새글<br>등록</th>
                <th scope="col">댓글<br>등록</th>
                <th scope="col">읽은<br>글수</th>
                <th scope="col">검색<br>어수</th>
            </tr>
        </thead>
        <tbody>
            <!-- 오늘 { -->
            <tr style="font-weight:bold; height:38px;">
                <th scope="col" style="width:34px;background:#FDED80;text-align:center;padding:0;">오늘</th>
                <th scope="col" style="width:65px;background:#FDED80;color:#222;font-weight:normal;text-align:center;padding:0;">
                                <b>08-02</b>(일)
                </th>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_today.php"><span class="gray">-</span></a></td>
                <td style="background:#FFF1CC;"><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php"><span class="gray">-</span></a></td>
            </tr>
            <!-- } 오늘 //-->
            <!-- 어제 { -->
            <tr style="height:38px;">
                <th scope="col" style="width:34px;text-align:center;padding:0;">어제</th>
                <th scope="col" style="width:65px;font-weight:normal;text-align:center;padding:0;">
                08/01                </th>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_article.php">3</a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php"><span class="gray">-</span></a></td>
            </tr>
            <!-- } 어제 //-->
            <!-- 이달 (1일~말일) { -->
            <tr style="height:38px;">
                <th scope="col" style="width:34px;text-align:center;padding:0;">이달</th>
                <th scope="col" style="width:65px;color:#222;font-weight:normal;text-align:center;padding:0;">
                1일~02일
                </th>
              <td><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/bbs/icecream.latest.php"><span class="gray">-</span></a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/data_room/rank_article.php">3</a></td>
                <td><a href="http://icecreamge10.cafe24.com/adm.cream/popular_rank.php"><span class="gray">-</span></a></td>
            </tr>
            <!-- } 이달(1일~말일) //--> 
        </tbody>
    </table>
    </div><!-- [표] 오늘발생한이벤트 끝// -->

    </div><!-- 가로1닫기 //-->
    <!--//-->

<!-- ### 가로전체 끝 ### -->
</div>
</section><!-- [섹션] 오늘/어제/한달간 일어난 일 끝 // -->




<!-- [현재시간표시 ] -->
<div id="left_date1" style="width:100%;padding:16px 0px;margin:0px; color:#FFF;text-align:center;background:#74E1E7; ">
        2020    <b class="font-16 white">08월 02일</b>
    일요일 Sun <span class="font-16 darkyellow">10:22</span>
</div>
<!-- // -->        <!-- [불러오기] 관리자 현황판// -->

        <!-- [section] 오늘의랭킹 -->
        
<section><div class="div_board1"><!-- ### 가로 전체 시작 ### -->

    <!--@@@@@@@@@@ (1단 가로1) 오늘 포인트랭킹 @@@@@@@@@@-->
    <div class="box li_width8">
        <h5>실시간 포인트적립 <span class="pull-right"><a href="http://icecreamge10.cafe24.com/adm.cream/rank_today.php"><span class="gray font-11 font-normal">더보기</span></a></span></h5>
        <div class="h15"></div>
        <!-- [최신글]오늘 출력 시작 -->
        <div class="member_rank1">
            <ul>
                                <li>
                    <!-- 순위 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 회원닉네임 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" class="sv_member" title="nominsora 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/img/no_profile.gif);"></span> nominsora</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <!-- // -->
                    <!-- 포인트 -->
					<span class="pull-right">
                    <span class="memberpoint" title="포인트">1,000</span>                    </span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]오늘 출력 끝 //-->
        <!-- 페이징 -->
        <div class="h35"></div>
        <div style="position:absolute; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_point"></div>
        </div>
        <!--//-->
    </div>
    <!--@@@@@@@@@@ // @@@@@@@@@@-->
    

    
    <!--@@@@@@@@@@ (1단 가로2) 오늘의 인기글 @@@@@@@@@@-->
    <div class="box li_width4">
        <h5>실시간 인기 글 <span class="pull-right"><a href="http://icecreamge10.cafe24.com/adm.cream/rank_today.php"><span class="gray font-11 font-normal">더보기</span></a></span></h5>
        <div class="h15"></div>
        <!-- [최신글]인기글 시작 -->
        <div class="rank_latest1">
            <ul>
                                
                                <li class="ranking_paging_hit">
                    <!-- 순서 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 제목 -->
                    <a href="http://icecreamge10.cafe24.com/bbs/board.php?bo_table=free&amp;wr_id=5" target="_blank" title="우리에게일어날기적 (2019-10-28 07:57:28)">
                    <span class="subject">우리에게일어날기적 
                        <span class="cnt">1</span>                        <span class="gray td_hidden_480">(자유게시판)</span>
                    </span>
                    </a>
                    <!-- // -->
                    <!-- 작성일 -->
					<span class="pull-right date">
                    <span class="td_hidden_480"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" class="sv_member" title="최고관리자 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ic/icecream.gif);"></span> 최고관리자</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
					10-28                    </span>
                    <!-- // -->
                </li>
                                <li class="ranking_paging_hit">
                    <!-- 순서 -->
                    <span class="ranking">2</span>
                    <!-- // -->
                    <!-- 제목 -->
                    <a href="http://icecreamge10.cafe24.com/bbs/board.php?bo_table=free&amp;wr_id=12" target="_blank" title="이쁘게 잘 나왔네요 (2020-08-02 19:51:23)">
                    <span class="subject">이쁘게 잘 나왔네요 
                                                <span class="gray td_hidden_480">(자유게시판)</span>
                    </span>
                    </a>
                    <!-- // -->
                    <!-- 작성일 -->
					<span class="pull-right date">
                    <span class="td_hidden_480"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" class="sv_member" title="GE10관리자체험 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif);"></span> GE10관리자체험</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
					<span class="today_date">19:51</span>                    </span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]인기글 끝 //-->
        <!-- 페이징 -->
        <div class="h35"></div>
        <div style="position:absolute; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_hit"></div>
        </div>
        <!--//-->
    </div>
    <!--@@@@@@@@@@ // @@@@@@@@@@-->
    
    
    <!--@@@@@@@@@@ (1단 가로3) 오늘의 인기검색어 @@@@@@@@@@-->
    <div class="box li_width9">
        <h5>실시간 인기검색어 <span class="pull-right"><a href="http://icecreamge10.cafe24.com/adm.cream/rank_today.php"><span class="gray font-11 font-normal">더보기</span></a></span></h5>
        <div class="h15"></div>
        <!-- [최신글]오늘의 인기검색어 랭킹 시작 -->
        <div class="member_rank1">
            <ul>
                <li class="ranking_paging_keywords">
                    <!-- 순위 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 회원닉네임 -->
                    <span class="nickname">무료</span>
                    <!-- // -->
                    <!-- 포인트 -->
                    <span class="pull-right">1</span>
                    <!-- // -->
                </li>
            </ul>
        </div>
        <!-- [최신글]이달 인기검색어순위 랭킹 끝 //-->
        <!-- 페이징 -->
        <div class="h35"></div>
        <div style="position:absolute; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_keywords"></div>
        </div>
        <!--//-->
    </div>
    <!--@@@@@@@@@@ // @@@@@@@@@@-->

</div><!-- ### 가로전체 끝 ### -->
</section>
<script>
/* (1) 실시간포인트적립 랭킹 */
$(function(){
    paging_point();
    paging_point_nation();
});
var view_point = 5;
function paging_point_nation()
{
    $('.pagenation_point').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_point').length;
        var $ranking_paging_point = $('.ranking_paging_point');
        var la_page = Idx * view_point;
        var fr_page = Idx * view_point - view_point;
        $ranking_paging_point.slice(0).hide();
        $ranking_paging_point.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_point').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_point()
{
    var count = $('.ranking_paging_point').length;
    var $ranking_paging_point = $('.ranking_paging_point');
    $ranking_paging_point.slice(view_point).hide();
    var paging_point = '';
    if(count>view_point){
        var totalpage = Math.ceil(count/view_point);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_point += '<a href="javascript:;" class="pagenation_point" onclick="call_paging_point('+i+')">'+i+'</a>';
            paging_point += '<a href="javascript:;" class="pagenation_point pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_point').html(paging_point);
    }
    paging_point_nation();
}


/* (2) 인기글 랭킹 */
$(function(){
    paging_hit();
    paging_hit_nation();
});
var view_hit = 5;
function paging_hit_nation()
{
    $('.pagenation_hit').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_hit').length;
        var $ranking_paging_hit = $('.ranking_paging_hit');
        var la_page = Idx * view_hit;
        var fr_page = Idx * view_hit - view_hit;
        $ranking_paging_hit.slice(0).hide();
        $ranking_paging_hit.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_hit').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_hit()
{
    var count = $('.ranking_paging_hit').length;
    var $ranking_paging_hit = $('.ranking_paging_hit');
    $ranking_paging_hit.slice(view_hit).hide();
    var paging_hit = '';
    if(count>view_hit){
        var totalpage = Math.ceil(count/view_hit);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_hit += '<a href="javascript:;" class="pagenation_hit" onclick="call_paging_hit('+i+')">'+i+'</a>';
            paging_hit += '<a href="javascript:;" class="pagenation_hit pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_hit').html(paging_hit);
    }
    paging_hit_nation();
}


/* (3) 인기검색어 랭킹 */
$(function(){
    paging_keywords();
    paging_keywords_nation();
});
var view_keywords = 5;
function paging_keywords_nation()
{
    $('.pagenation_keywords').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_keywords').length;
        var $ranking_paging_keywords = $('.ranking_paging_keywords');
        var la_page = Idx * view_keywords;
        var fr_page = Idx * view_keywords - view_keywords;
        $ranking_paging_keywords.slice(0).hide();
        $ranking_paging_keywords.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_keywords').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_keywords()
{
    var count = $('.ranking_paging_keywords').length;
    var $ranking_paging_keywords = $('.ranking_paging_keywords');
    $ranking_paging_keywords.slice(view_keywords).hide();
    var paging_keywords = '';
    if(count>view_keywords){
        var totalpage = Math.ceil(count/view_keywords);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_keywords += '<a href="javascript:;" class="pagenation_keywords" onclick="call_paging_keywords('+i+')">'+i+'</a>';
            paging_keywords += '<a href="javascript:;" class="pagenation_keywords pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_keywords').html(paging_keywords);
    }
    paging_keywords_nation();
}
</script>        <!-- [section] 오늘의랭킹 // -->

        <!-- <div class="line-lightgray"></div> //-->

        <!-- [section] 클린센터 관련 데이타
                [section] 클린센터 관련 데이타 // -->

        <!-- [section] 회원관련 데이타 -->
        
<section><div class="div_board1">
<!-- ### 가로 전체 시작 ### -->
    
    <!-- (1단 가로1) 오늘 등록된 게시물 -->
    <div class="box boxwidth3"><!-- 가로1열기 -->
        <h5><a href="javascript:location.reload()" class="at-tip" data-original-title="<nobr>새로고침</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fas fa-redo-alt pocariblue"></i></a>&nbsp;<a href="http://icecreamge10.cafe24.com/adm.cream/bbs/index.php" target="_blank">오늘 등록된 게시물</a>
        </h5>
        <div class="h15"></div>
        <!-- [최신글]오늘 등록한 게시물 시작 -->
        <div class="wide_latest1">
            <ul>
                                
                                <li class="ranking_paging_todaybbs">
                    <!-- 순서 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 제목 -->
                    <a href="http://icecreamge10.cafe24.com/bbs/board.php?bo_table=free&amp;wr_id=12" target="_blank" title="이쁘게 잘 나왔네요 (2020-08-02 19:51:23)">
                    <span class="subject">이쁘게 잘 나왔네요 
                                                <span class="gray td_hidden_480">(자유게시판)</span>
                    </span>
                    </a>
                    <!-- // -->
                    <!-- 작성일 -->
					<span class="pull-right date">
                    <span class="td_hidden_480"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" class="sv_member" title="GE10관리자체험 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif);"></span> GE10관리자체험</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
					<span class="today_date">19:51</span>                    </span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]최신글 끝 //-->
        <!-- 페이징 -->
        <div class="h15"></div>
        <div style="position:relative; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_todaybbs"></div>
        </div>
        <!--//-->
    </div><!-- 가로2닫기 //-->
    <!--//-->




    <!--@@@@@@@@@@ (1단 가로2) 오늘등록한 댓글 @@@@@@@@@@-->
    <div class="box boxwidth3">
        <h5><a href="javascript:location.reload()" class="at-tip" data-original-title="<nobr>새로고침</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fas fa-redo-alt pocariblue"></i></a>&nbsp;<a href="http://icecreamge10.cafe24.com/adm.cream/bbs/index.php" target="_blank">오늘 등록된 댓글</a>
        </h5>
        <div class="h15"></div>
        <!-- [최신글]오늘 등록된 댓글 시작 -->
        <div class="wide_latest1">
            <ul>
                                
                                <li class="ranking_paging_todaycomment">
                    <!-- 순서 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 제목 -->
                    <a href="http://icecreamge10.cafe24.com/bbs/board.php?bo_table=free&amp;wr_id=5#c_11" target="_blank" title="[원글] 우리에게일어날기적 (2019-10-28 07:57:28)">
                    <span class="subject"><i class="far fa-comment-dots gray"></i> 기적이!!!</span></a>
                    
                    <!-- // -->
                    <!-- 작성일 -->
					<span class="pull-right date">
                    <span class="td_hidden_480"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" class="sv_member" title="GE10관리자체험 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif);"></span> GE10관리자체험</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="today_date">19:48</span>                    </span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]오늘 댓글 끝 //-->
        <!-- 페이징 -->
        <div class="h15"></div>
        <div style="position:relative; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_todaycomment"></div>
        </div>
        <!--//-->
    </div>
    <!--@@@@@@@@@@ // @@@@@@@@@@-->
    <!--//-->
<!-- ### 가로전체 끝 ### -->
</div>
</section>
<script>
/* (1) 누적 회원 포인트 랭킹 */
$(function(){
    paging_pointall();
    paging_pointall_nation();
});
var view_pointall = 10;
function paging_pointall_nation()
{
    $('.pagenation_pointall').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_pointall').length;
        var $ranking_paging_pointall = $('.ranking_paging_pointall');
        var la_page = Idx * view_pointall;
        var fr_page = Idx * view_pointall - view_pointall;
        $ranking_paging_pointall.slice(0).hide();
        $ranking_paging_pointall.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_pointall').removeClass('active');
        $(this).addClass('active');
    }); 
}

</script>        <!-- [section] 회원관련 데이타 // -->

        <!-- [section] 커뮤니티 최신글 데이타 -->
                <!-- [section] 커뮤니티 최신글 데이타 // -->

    </div>
    <!--@@@@@@ // @@@@@@-->
    
    
    <!--@@@@@@ (페이퍼-우측) @@@@@@-->
    <div class="papers paper_right_width">
    
        <!-- [불러오기] 메인페이지 우측 페이퍼 -->
        
<!-- [현재시간] 표시 -->
<style>
.adm_main_ticker {width:100%; height:auto;}
.adm_main_ticker_div {width:100%;}

.adm_main_ticker_div .tick {width:100%;}
.adm_main_ticker_div .tick .tick_subject {margin-right:10px; margin-top:0; color:#555;}
.adm_main_ticker_div .tick .tick_content {margin-top:5px;margin-bottom:5px}
.adm_main_ticker_div .tick .tick_txt {width:100%;float:left; height:auto; padding:0;}

.adm_main_ticker a {color:#000;}

#ticker{}
.none{display:none}
.navi{ position:absolute; margin-top:8px;}
.block {height:30px; overflow:hidden; width:100%; padding:0px 10px 0px 5px;}
.block ul { border:0; margin:0;list-style:none;}
.block li {display:block;width:100%;color:#999;vertical-align:middle; background:none; border:0; padding:0;line-height:30px;}

</style>

<div class="ice_graph_head01 boxwidth1">

<!-- 한줄 롤링티커 시작 -->
<div class="adm_main_ticker">
	<div class="adm_main_ticker_div">

		<div class="tick">
			<div class="tick_txt">
				<div class="block">
					<ul id="ticker">
                    
                    <!-- (1) 현재시간 표시 -->
                    <li>

<!-- [현재시간] 표시 -->

	    <span class='red'>일</span>요일 <span class='red'>Sun</span>    <span class="font-16 orangered"><div id="realtime" style="display:inline-block;"><!-- adm/adm.head.sub.php에 실행스크립트 있음 //--></div></span>&nbsp;
    <span class="font-12">2020년</span>
    <b class="font-12 darkgray">08월 02일</b>
    <b class="font-12 darkgray"></b>

<!-- // -->

                    </li>
                    <!-- // -->
                    
                    <!-- (2) 현재접속자 표시 -->
                    <li>

<!-- [현재접속지] 표시 -->

	<span class="darkgray" style="display:inline-block;"><a href="http://icecreamge10.cafe24.com/bbs/current_connect.php" target="_blank">현재접속자</a></span>
    <span class="pull-right" style="display:inline-block">
        <a href="http://icecreamge10.cafe24.com/bbs/current_connect.php" target="_blank" class="at-tip" data-original-title="<nobr>현재접속자</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><font style="font-size:11px;"><img src="http://icecreamge10.cafe24.com/adm.cream/img/menu-2-1.png"><span class="gray font-11">1</span>&nbsp;<img src="http://icecreamge10.cafe24.com/adm.cream/img/menu-2.png"><span class="purple font-11">1</span></font></a>
    </span>

<!-- // -->
  
                    </li>
                    <!-- // -->
                    
                    <!-- (3) 오늘방문자 표시 -->
                    <li>

<!-- [오늘방문자] 표시 -->

	<span class="tick_subject" style="display:inline-block;">오늘</span>
    <span class="none" style="display:inline-block;">
        <a href="http://icecreamge10.cafe24.com/adm.cream/visit_list.php" class="at-tip" data-original-title="<nobr>오늘방문자수</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><font style="font-size:11px;"><span class="gray">방문자</span> 3</font></a>&nbsp;&nbsp;
        <a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><span class="gray">회원가입 0</span></a>&nbsp;&nbsp;
        <a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php?sst=mb_leave_date&sod=desc&sfl=&stx="><span class="gray">탈퇴 0</span></a>
    </span>

<!-- // -->
  
                    </li>
                    <!-- // -->

					</ul>
				</div>
			</div>
			<div class="navi">
				<span class="btn btn-white btn-xs prev"><i class="fe fe-chevron-up"></i></span>
                <span class="btn btn-white btn-xs next"><i class="fe fe-chevron-down"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- 한줄 롤링티커 끝 -->

</div>

<script>
jQuery(function($)
{
    var ticker = function()
    {
        timer = setTimeout(function(){
            $('#ticker li:first').animate( {marginTop: '-30px'}, 400, function()
            {
                $(this).detach().appendTo('ul#ticker').removeAttr('style');
            });
            ticker();
        }, 5000);// 1초 1000 (5000 = 5초)
      };

      $(document).on('click','.prev',function(){
        $('#ticker li:last').hide().prependTo($('#ticker')).slideDown();
        clearTimeout(timer);
        ticker();
        if($('.pause').text() == 'Unpause'){
          tickerUnpause();
        };
      });


      $(document).on('click','.next',function(){
            $('#ticker li:first').animate( {marginTop: '-30px'}, 400, function()
                    {
                        $(this).detach().appendTo('ul#ticker').removeAttr('style');
                    });
            clearTimeout(timer);
            ticker();
            
            if($('.pause').text() == 'Unpause'){
              tickerUnpause();
            };
          });


	var tickerUnpause = function()
	{
		$('.pause').text('Pause');
	};


    var tickerpause = function()
  {
    $('.pause').click(function(){
      $this = $(this);
      if($this.text() == 'Pause'){
        $this.text('Unpause');
        clearTimeout(timer);
      }
      else {
        tickerUnpause();
      }
    });
  };
  tickerpause();
	var tickerover = function(event)
	{
		$('#ticker').mouseover(function(){
			clearTimeout(timer);
		});
		$('#ticker').mouseout(function(){
			ticker();
		});
	};
	tickerover();
	ticker();
});
</script>

<!--//--><!-- // -->

<!-- 좌측 관리자메뉴 -->

<div id="paper_wrap"><!-- 좌측 관리자설정메뉴 -->

    <!-- (1단) 1:1상담문의 -->
    <div id="left_service">
        <h5><a href="javascript:location.reload()" class="at-tip" data-original-title="<nobr>새로고침</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fas fa-redo-alt pocariblue"></i></a>&nbsp;<a href="http://icecreamge10.cafe24.com/bbs/qalist.php" target="_blank">1:1상담</a>
        <span class="pull-right"><a href="http://icecreamge10.cafe24.com/bbs/qalist.php" target="_blank"><span class="orangered font-12 font-normal">대기중인 질문 : <b>1</b> 개</span></a></span></h5>
        <div class="h15"></div>
        <!------------ 그래프바 시작 ------------>
        <a href="http://icecreamge10.cafe24.com/adm.cream/bbs/qalist.php">
        <div class="ice_graph_head01 boxwidth1">
            <div class="ice_graph_width_bar"><div data-width="67" class="bar-min bluebar">답변완료<span>답변율 67%</span></div></div>
        </div>
        </a>
        <!------------ // ------------>
        <div class="h15"></div>
        
        <div class="latest2">
            <ul>
                                <li class="ranking_paging_1to1qa">
                    <span class=answer>답변완료</span>                    <span class="subject"><a href="http://icecreamge10.cafe24.com/bbs/qaview.php?qa_id=2" target="_blank" title="오늘은 어디로 갈까요~">오늘은 어디로 갈까요~</a></span>
                    <br>
                                            <span class="cate"> 회원</span>
                                        <span class="writename"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" class="sv_member" title="최고관리자 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ic/icecream.gif);"></span> 최고관리자</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2020-05-29 09:17</span>
                                <li class="ranking_paging_1to1qa">
                    <span class=noanswer>답변대기</span>                    <span class="subject"><a href="http://icecreamge10.cafe24.com/bbs/qaview.php?qa_id=1" target="_blank" title="어느날 예상한대로 되기 시작합니다">어느날 예상한대로 되기 시작합니다</a></span>
                    <br>
                                            <span class="cate"> 회원</span>
                                        <span class="writename"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" class="sv_member" title="최고관리자 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ic/icecream.gif);"></span> 최고관리자</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2019-10-23 12:35</span>
                            </ul>
        </div>
        <!-- 페이징 -->
        <div class="h15"></div>
        <div style="position:relative; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_1to1qa"></div>
        </div>
        <!--//-->
    </div>
    <!--//-->


    <!-- (1단) 누적회원포인트랭킹 -->
    <div id="left_service">
                <h5><i class="fas fa-smile fa-lg"></i> 누적 회원 포인트 랭킹 <span class="pull-right"><span class="orangered font-12 font-normal">1~50위</span></span></h5>
        <div class="h15"></div>
        <!-- [최신글]전체 포인트순위 랭킹 시작 -->
        <div class="member_rank1">
            <ul>
                                <li class="ranking_paging_pointall">
                    <!-- 순위 -->
                    <span class="ranking">1</span>
                    <!-- // -->
                    <!-- 회원닉네임 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" class="sv_member" title="nominsora 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/img/no_profile.gif);"></span> nominsora</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <!-- // -->
                    <!-- 포인트 -->
					<span class="pull-right">
                    <span class="memberpoint" title="포인트">1,000</span>                    </span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]전체 포인트순위 랭킹 끝 //-->
        <!-- 페이징 -->
        <div class="h35"></div>
        <div style="position:absolute; display:block; width:100%; text-align:center; bottom:10px;">
            <div class="paging_pointall"></div>
        </div>
        <!--//-->
    </div>
    <!--//-->
    
    
    
    <!-- (1단) 가입회원 목록 -->
    <div id="left_service">
        <h5><i class="fa fa-user fa-lg"></i> 회원가입 <span class="pull-right"><a href="http://icecreamge10.cafe24.com/adm.cream/member_list.php"><button>전체보기</button></a></span></h5>
        <div class="h15"></div>
        <!-- [최신글]회원가입 시작 -->
        <div class="member_latest1">
            <ul>
                                <li>  
                    <!-- 회원아이디정보 -->
                    <span class="memberid"><a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?sst=&sod=&sfl=&stx=&page=&w=u&mb_id=nominsora" target="_blank" title="회원정보 바로가기">nominsora</a></span>
                    <span class="lightgray">|</span>&nbsp;<span class="membername" title="이름"><span class="gray font-11">이름</span> nominsora</span>
                    <span class="lightgray">|</span>&nbsp;<span class="memberlevel"><span class="gray font-11 font-normal">등급</span> 2</span>
                    
                    <span class="lightgray">|</span>&nbsp;<span class="gray font-11 font-normal">휴대폰없음</span>                    <br>
                    <!-- // -->
                    <!-- 가입승인/포인트정보 -->
					<span class=memberok>승인완료</span>                    <span class="lightgray">|</span>&nbsp;<span class="gray font-11 font-normal">포인트</span> <span class="memberpoint" title="포인트">1,000</span>                    <span class="lightgray">|</span>&nbsp;<span class=membermail font-10>nominsoraa@naver.com</span>                    <!-- // -->
                    <!-- 주소정보 -->
					                    <br>
                    <!-- // -->
                    <!-- 가입일 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" class="sv_member" title="nominsora 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image: url(http://icecreamge10.cafe24.com/img/no_profile.gif);"></span> nominsora</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=nominsora" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=nominsora&amp;name=nominsora&amp;email=n6XOnqCno6OVkneklKnIp5CZ0aI-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=nominsora" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=nominsora" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2020-05-06 13:55</span>
                    <!-- // -->
                </li>
                                <li>  
                    <!-- 회원아이디정보 -->
                    <span class="memberid"><a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?sst=&sod=&sfl=&stx=&page=&w=u&mb_id=milk" target="_blank" title="회원정보 바로가기">milk</a></span>
                    <span class="lightgray">|</span>&nbsp;<span class="membername" title="이름"><span class="gray font-11">이름</span> 밀크티</span>
                    <span class="lightgray">|</span>&nbsp;<span class="memberlevel"><span class="gray font-11 font-normal">등급</span> 10</span>
                    
                    <span class="lightgray">|</span>&nbsp;<span class=membertel>010-0000-0000</span>                    <br>
                    <!-- // -->
                    <!-- 가입승인/포인트정보 -->
					<span class=memberok>승인완료</span>                    <span class="lightgray">|</span>&nbsp;<span class="gray font-11 font-normal">포인트</span> <span class="memberpoint" title="포인트">800</span>                    <span class="lightgray">|</span>&nbsp;<span class=membermail font-10>admin@domain.net</span>                    <!-- // -->
                    <!-- 주소정보 -->
					                        <br>
                        <span class="memberaddr">
						    [ 01849 ] 서울 노원구 공릉동 661-13 , 33                         </span>
                                        <br>
                    <!-- // -->
                    <!-- 가입일 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=milk" class="sv_member" title="가짜우유 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/mi/milk.gif);"></span> 가짜우유</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=milk" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=milk&amp;name=%EA%B0%80%EC%A7%9C%EC%9A%B0%EC%9C%A0&amp;email=kprOnqB0mKChkqCkYaHIqQ--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=milk" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=milk" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=milk" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=milk&amp;name=%EA%B0%80%EC%A7%9C%EC%9A%B0%EC%9C%A0&amp;email=kprOnqB0mKChkqCkYaHIqQ--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=milk" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=milk" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2020-02-25 09:28</span>
                    <!-- // -->
                </li>
                                <li>  
                    <!-- 회원아이디정보 -->
                    <span class="memberid"><a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?sst=&sod=&sfl=&stx=&page=&w=u&mb_id=kim" target="_blank" title="회원정보 바로가기">kim</a></span>
                    <span class="lightgray">|</span>&nbsp;<span class="membername" title="이름"><span class="gray font-11">이름</span> 체험아이디</span>
                    <span class="lightgray">|</span>&nbsp;<span class="memberlevel"><span class="gray font-11 font-normal">등급</span> 10</span>
                    
                    <span class="lightgray">|</span>&nbsp;<span class=membertel>019-0123-0123</span>                    <br>
                    <!-- // -->
                    <!-- 가입승인/포인트정보 -->
					<span class=memberok>승인완료</span>                    <span class="lightgray">|</span>&nbsp;<span class="gray font-11 font-normal">포인트</span> <span class="memberpoint" title="포인트">16,500</span>                    <span class="lightgray">|</span>&nbsp;<span class=membermail font-10>kim@domain.co.gas</span>                    <!-- // -->
                    <!-- 주소정보 -->
					                        <br>
                        <span class="memberaddr">
						    [ 06120 ] 서울 강남구 논현동 199-4 , BD 102                         </span>
                                        <br>
                    <!-- // -->
                    <!-- 가입일 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" class="sv_member" title="GE10관리자체험 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ki/kim.gif);"></span> GE10관리자체험</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=kim" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=kim&amp;name=GE10%EA%B4%80%EB%A6%AC%EC%9E%90%EC%B2%B4%ED%97%98&amp;email=nJ_OdZajoZKdn2WZomHKltU-" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=kim" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=kim" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2019-10-15 21:07</span>
                    <!-- // -->
                </li>
                                <li>  
                    <!-- 회원아이디정보 -->
                    <span class="memberid"><a href="http://icecreamge10.cafe24.com/adm.cream/member_form.php?sst=&sod=&sfl=&stx=&page=&w=u&mb_id=icecream" target="_blank" title="회원정보 바로가기">icecream</a></span>
                    <span class="lightgray">|</span>&nbsp;<span class="membername" title="이름"><span class="gray font-11">이름</span> 최고관리자</span>
                    <span class="lightgray">|</span>&nbsp;<span class="memberlevel"><span class="gray font-11 font-normal">등급</span> 10</span>
                    
                    <span class="lightgray">|</span>&nbsp;<span class=membertel>013-2585-1478</span>                    <br>
                    <!-- // -->
                    <!-- 가입승인/포인트정보 -->
					<span class=memberok>승인완료</span>                    <span class="lightgray">|</span>&nbsp;<span class="gray font-11 font-normal">포인트</span> <span class="memberpoint" title="포인트">8,605</span>                    <span class="lightgray">|</span>&nbsp;<span class=membermail font-10>admin@domain.com</span>                    <!-- // -->
                    <!-- 주소정보 -->
					                    <br>
                    <!-- // -->
                    <!-- 가입일 -->
                    <span class="nickname"><span class="sv_wrap">
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" class="sv_member" title="최고관리자 자기소개" target="_blank" rel="nofollow" onclick="return false;"><span class="avatar" style="background-image:url(http://icecreamge10.cafe24.com/data/member_image/ic/icecream.gif);"></span> 최고관리자</a>
<span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>

<noscript class="sv_nojs"><span class="sv">
<a href="http://icecreamge10.cafe24.com/bbs/memo_form.php?me_recv_mb_id=icecream" onclick="win_memo(this.href); return false;">쪽지보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/formmail.php?mb_id=icecream&amp;name=%EC%B5%9C%EA%B3%A0%EA%B4%80%EB%A6%AC%EC%9E%90&amp;email=kprOnqB0mKChkqCkYZbSog--" onclick="win_email(this.href); return false;">메일보내기</a>
<a href="http://icecreamge10.cafe24.com/bbs/profile.php?mb_id=icecream" onclick="win_profile(this.href); return false;">자기소개</a>
<a href="http://icecreamge10.cafe24.com/bbs/new.php?mb_id=icecream" class="link_new_page" onclick="check_goto_new(this.href, event);">전체게시물</a>
</span>
</noscript></span></span>
                    <span class="date">2019-10-15 20:54</span>
                    <!-- // -->
                </li>
                            </ul>
        </div>
        <!-- [최신글]회원가입 끝 //-->
    </div>
    <!--//-->
    
    
    
    <!-- (서비스1단) SSL보안서버인증 -->
        <div id="left_service2" style="background:#bbb; padding:1px 10px; cursor:pointer;" onclick="$('.togglebox').toggle()">
        <h5 style="color:#fff;">
            <i class="fas fa-lock-open fa-lg white"></i>
			<span class="pull-right">
                SSL 보안서버인증 사용안함
            </span>
        </h5>
    </div>
    <!--토글설명-->
    <div class="togglebox" style="display:none; padding:8px 10px; line-height:16px;">
        <span class="orangered">호스팅업체에 신청하시거나 직접 설치하셔야 합니다</span><br>
        설치후 <b>config.php</b> 파일을 반드시 수정해주셔야 합니다<br>
        <span class="blue">
        define('G5_DOMAIN', '');<br>
        define('G5_HTTPS_DOMAIN', '');<br>
        </span>

        위 두 상수에 아래와 같은 설정을 하면 됩니다.<br>

        (1) 보안서버 주소를 사용후 일반 주소로 돌아오는 경우<br>
            <span class="blue">
            define('G5_DOMAIN', 'http://domain.co.kr');<br>
            define('G5_HTTPS_DOMAIN', 'https://domain.co.kr');<br>
            </span>

        (2) 보안서버 주소를 지속적으로 사용하는 경우<br>
            <span class="blue">
            define('G5_DOMAIN', '');<br>
            define('G5_HTTPS_DOMAIN', 'https://domain.co.kr');
            </span>
    </div> 
        <!--//-->
    
    <!-- (서비스1단) 짧은주소 -->
        <div id="left_service2" style="background:#32aaf7; padding:1px 10px;">
        <h5 style="color:#fff;">
            <a href="http://icecreamge10.cafe24.com/adm.cream/config_rewrite.php"><i class="fas fa-mask fa-lg white"></i></a>
			<span class="pull-right">
                <a href="http://icecreamge10.cafe24.com/adm.cream/config_rewrite.php"><span class="white">짧은주소사용중</span></a>
            </span>
        </h5>
    </div> 
        <!--//-->

        
    <!-- (1단) 영카트테마이용정보 -->
        <div id="left_service" style="background:#f7f7f7;">
            <ul class="serv">
				                <li><span class="skyblue">영카트테마를 사용중입니다</span></li>
                	
                <li>
					                        <i class="fa fa-life-ring"></i> 테마
						<span class="pull-right font-bold blue">basic</span>
                    		
				</li>
                                <li>
                    &nbsp;┗
                    <span class="pull-right font-11">
                    <a href="http://icecreamge10.cafe24.com/adm.cream/theme.php" class="at-tip font-11 gray" data-original-title="<nobr>테마보관함</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fa fa-refresh"></i> 테마변경</a>&nbsp;
                    <a href="http://icecreamge10.cafe24.com/theme/basic/theme_adm/" target="_blank" class="at-tip" data-original-title="<nobr>basic 관리자모드</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><i class="fa fa-cog"></i> 관리자</a>
                    </span>
                </li>
                	
			</ul>
        </div>
    <!-- // -->
    
    
        <!-- 현재접속자 -->
                <div id="left_service">
            <ul class="serv">
            <li>
            현재접속자
            <span class="pull-right">
            <a href="http://icecreamge10.cafe24.com/bbs/current_connect.php" target="_blank" class="at-tip" data-original-title="<nobr>현재접속자</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true"><font style="font-size:11px;"><img src="http://icecreamge10.cafe24.com/adm.cream/img/menu-2-1.png"><span class="gray font-11">1</span>&nbsp;<img src="http://icecreamge10.cafe24.com/adm.cream/img/menu-2.png"><span class="purple font-11">1</span></font></a>
            </span>
            </li>
            </ul>
        </div>
            <!-- // -->


</div><!-- 좌측 관리자설정메뉴 끝 -->


<script>
/* (1) 1:1문의 페이징 */
$(function(){
    paging_1to1qa();
    paging_1to1qa_nation();
});
var view_1to1qa = 3;
function paging_1to1qa_nation()
{
    $('.pagenation_1to1qa').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_1to1qa').length;
        var $ranking_paging_1to1qa = $('.ranking_paging_1to1qa');
        var la_page = Idx * view_1to1qa;
        var fr_page = Idx * view_1to1qa - view_1to1qa;
        $ranking_paging_1to1qa.slice(0).hide();
        $ranking_paging_1to1qa.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_1to1qa').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_1to1qa()
{
    var count = $('.ranking_paging_1to1qa').length;
    var $ranking_paging_1to1qa = $('.ranking_paging_1to1qa');
    $ranking_paging_1to1qa.slice(view_1to1qa).hide();
    var paging_1to1qa = '';
    if(count>view_1to1qa){
        var totalpage = Math.ceil(count/view_1to1qa);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_1to1qa += '<a href="javascript:;" class="pagenation_1to1qa" onclick="call_paging_1to1qa('+i+')">'+i+'</a>';
            paging_1to1qa += '<a href="javascript:;" class="pagenation_1to1qa pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_1to1qa').html(paging_1to1qa);
    }
    paging_1to1qa_nation();
}

/* (2) 상품문의 페이징 */
$(function(){
    paging_itemqa();
    paging_itemqa_nation();
});
var view_itemqa = 2;
function paging_itemqa_nation()
{
    $('.pagenation_itemqa').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_itemqa').length;
        var $ranking_paging_itemqa = $('.ranking_paging_itemqa');
        var la_page = Idx * view_itemqa;
        var fr_page = Idx * view_itemqa - view_itemqa;
        $ranking_paging_itemqa.slice(0).hide();
        $ranking_paging_itemqa.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_itemqa').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_itemqa()
{
    var count = $('.ranking_paging_itemqa').length;
    var $ranking_paging_itemqa = $('.ranking_paging_itemqa');
    $ranking_paging_itemqa.slice(view_itemqa).hide();
    var paging_itemqa = '';
    if(count>view_itemqa){
        var totalpage = Math.ceil(count/view_itemqa);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_itemqa += '<a href="javascript:;" class="pagenation_itemqa" onclick="call_paging_itemqa('+i+')">'+i+'</a>';
            paging_itemqa += '<a href="javascript:;" class="pagenation_itemqa pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_itemqa').html(paging_itemqa);
    }
    paging_itemqa_nation();
}

/* (1) 누적 회원 포인트 랭킹 */
$(function(){
    paging_pointall();
    paging_pointall_nation();
});
var view_pointall = 10;
function paging_pointall_nation()
{
    $('.pagenation_pointall').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_pointall').length;
        var $ranking_paging_pointall = $('.ranking_paging_pointall');
        var la_page = Idx * view_pointall;
        var fr_page = Idx * view_pointall - view_pointall;
        $ranking_paging_pointall.slice(0).hide();
        $ranking_paging_pointall.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_pointall').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_pointall()
{
    var count = $('.ranking_paging_pointall').length;
    var $ranking_paging_pointall = $('.ranking_paging_pointall');
    $ranking_paging_pointall.slice(view_pointall).hide();
    var paging_pointall = '';
    if(count>view_pointall){
        var totalpage = Math.ceil(count/view_pointall);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_pointall += '<a href="javascript:;" class="pagenation_pointall" onclick="call_paging_pointall('+i+')">'+i+'</a>';
            paging_pointall += '<a href="javascript:;" class="pagenation_pointall pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_pointall').html(paging_pointall);
    }
    paging_pointall_nation();
}

/* (0) 오늘 새글 */
$(function(){
    paging_todaybbs();
    paging_todaybbs_nation();
});
var view_todaybbs = 7;
function paging_todaybbs_nation()
{
    $('.pagenation_todaybbs').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_todaybbs').length;
        var $ranking_paging_todaybbs = $('.ranking_paging_todaybbs');
        var la_page = Idx * view_todaybbs;
        var fr_page = Idx * view_todaybbs - view_todaybbs;
        $ranking_paging_todaybbs.slice(0).hide();
        $ranking_paging_todaybbs.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_todaybbs').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_todaybbs()
{
    var count = $('.ranking_paging_todaybbs').length;
    var $ranking_paging_todaybbs = $('.ranking_paging_todaybbs');
    $ranking_paging_todaybbs.slice(view_todaybbs).hide();
    var paging_todaybbs = '';
    if(count>view_todaybbs){
        var totalpage = Math.ceil(count/view_todaybbs);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_todaybbs += '<a href="javascript:;" class="pagenation_todaybbs" onclick="call_paging_todaybbs('+i+')">'+i+'</a>';
            paging_todaybbs += '<a href="javascript:;" class="pagenation_todaybbs pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_todaybbs').html(paging_todaybbs);
    }
    paging_todaybbs_nation();
}

/* (0) 오늘 새댓글 */
$(function(){
    paging_todaycomment();
    paging_todaycomment_nation();
});
var view_todaycomment = 7;
function paging_todaycomment_nation()
{
    $('.pagenation_todaycomment').on('click', function(e){
        var Idx = $(this).index()+1;
        var count = $('.ranking_paging_todaycomment').length;
        var $ranking_paging_todaycomment = $('.ranking_paging_todaycomment');
        var la_page = Idx * view_todaycomment;
        var fr_page = Idx * view_todaycomment - view_todaycomment;
        $ranking_paging_todaycomment.slice(0).hide();
        $ranking_paging_todaycomment.slice(fr_page, la_page).show();
        console.log(fr_page, la_page);
        $('.pagenation_todaycomment').removeClass('active');
        $(this).addClass('active');
    }); 
}
function paging_todaycomment()
{
    var count = $('.ranking_paging_todaycomment').length;
    var $ranking_paging_todaycomment = $('.ranking_paging_todaycomment');
    $ranking_paging_todaycomment.slice(view_todaycomment).hide();
    var paging_todaycomment = '';
    if(count>view_todaycomment){
        var totalpage = Math.ceil(count/view_todaycomment);
        for(var i=1;i<=totalpage;i++){
            if(i==1)var active = "active";else var active='';
            //paging_todaycomment += '<a href="javascript:;" class="pagenation_todaycomment" onclick="call_paging_todaycomment('+i+')">'+i+'</a>';
            paging_todaycomment += '<a href="javascript:;" class="pagenation_todaycomment pg_page '+active+'">'+i+'</a>';
        }
        $('.paging_todaycomment').html(paging_todaycomment);
    }
    paging_todaycomment_nation();
}

</script>        <!-- [불러오기] 메인페이지 우측 페이퍼// -->
        
    </div>
    <!--@@@@@@ // @@@@@@-->


</div>

        <noscript>
            <p>
                귀하께서 사용하시는 브라우저는 현재 <strong>자바스크립트를 사용하지 않음</strong>으로 설정되어 있습니다.<br>
                <strong>자바스크립트를 사용하지 않음</strong>으로 설정하신 경우는 수정이나 삭제시 별도의 경고창이 나오지 않으므로 이점 주의하시기 바랍니다.
            </p>
        </noscript>

    </div>
</div>

</div>
</div>

<!-- [불러오기] 서비스이용 현황판 -->

<div class="div_board1" style="margin:0;">
<!-- ### 가로 전체 시작 ### -->
    
    <!-- (1단 가로1) 오늘 -->
    <div class="box li_width7"><!-- 가로1열기 -->
        
        <!-- PG사 이용정보/상점관리자바로가기 -->
        <div id="content_service" style="border:0;">
            <ul class="serv">
                <li><b class="lightblue">PG서비스가 필요한 경우 기능을 구현하세요!</b></li>
                <!-- // -->
                
                <!-- 카카오페이 -->
                <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">카카오페이</span>					    <span class="pull-right">
						                            <a href="http://with.kakao.com/kakaopay/index" target="_blank"><button>신청하기</button></a>
                                                </span>
				</li>
                <!-- 네이버페이 -->
                <li>
                     <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">네이버페이</span>					    <span class="pull-right">
						                            <a href="https://admin.pay.naver.com/about" target="_blank"><button>신청하기</button></a>
                                                </span>
				</li>
                <!--//-->
			</ul>
        </div>
        <!-- // -->

    </div><!-- 가로1닫기 //-->
    <!--//-->
    
    
    <!-- (1단 가로2) 어제 -->
    <div class="box li_width7"><!-- 가로2열기 -->

        <!-- 유료서비스이용정보 -->
        <div id="content_service" style="border:0;">
            <h5>보안/서버</h5>
            <ul class="serv">
                <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">SSL보안서버</span>					<span class="pull-right">
				    <span class="gray">호스팅에문의</span>                    </span>
				</li>
                <li>
                    <span class="use_on">on</span> 짧은주소					<span class="pull-right">
				        <a href="http://icecreamge10.cafe24.com/adm.cream/config_rewrite.php">
						사용중                        </a>
                    </span>
				</li>
			</ul>
            
            
            <h5 style="border-top:solid 1px #e1e1e1; margin-top:8px;">외부 서비스</h5>
            <ul class="serv">
                            <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">SMS잔액</span>                    <a href="http://icecreamge10.cafe24.com/adm.cream/sms_admin/config.php">
					    <span class="pull-right">
						잔액없음                        </span>
                    </a>
				</li>
                <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">본인확인서비스</span>					    <span class="pull-right">
						<a href="http://icecreamge10.cafe24.com/adm.cream/service.php"><button>신청하기</button></a>
                                                </span>
                    </a>
				</li>
			</ul>
        </div>
        <!--//-->
        
    </div><!-- 가로2닫기 //-->
    <!--//-->
    
    
    <!-- (1단 가로3) 이달 -->
    <div class="box li_width7"><!-- 가로3열기 -->
        
        <!-- 서비스이용정보 -->
        <div id="content_service" style="border:0;">
            <h5>네트워크 서비스</h5>
            <ul class="serv">
                
                <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">네이버신디케이션</span>					<span class="pull-right">
				        <a href="http://icecreamge10.cafe24.com/adm.cream/config_syndi.php">
                        <button>사용하기</button>                        </a>
                    </span>
				</li>
                
                <li>
                    <span class="lightgray"><i class="fas fa-ban"></i></span> <span class="gray">소셜로그인</span>					<span class="pull-right">
				        <a href="http://icecreamge10.cafe24.com/adm.cream/config_login.php">
                        <button>사용하기</button>                        </a>
                    </span>
				</li>
                
                <li>
                    <span class="use_on">on</span> SNS퍼가기
					<span class="pull-right">
				        <a href="http://icecreamge10.cafe24.com/adm.cream/config_sns.php">
                        sns등록
                        </a>
                    </span>
				</li>

			</ul>
        </div>
        
    </div><!-- 가로3닫기 //-->
    <!--//-->
    
</div>

<!-- [불러오기] 서비스이용 현황판// -->

<?php
include_once ('./admin.tail.php');
?>