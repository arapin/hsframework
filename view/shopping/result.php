<?php
/**********************************************************************************************
*
* 파일명 : AGS_pay_result.php
* 작성일자 : 2012/04/30
*
* 소켓결제결과를 처리합니다.
*
* Copyright AEGIS ENTERPRISE.Co.,Ltd. All rights reserved.
*
**********************************************************************************************/

//공통사용
$AuthTy 		= trim( $_POST["AuthTy"] );				//결제형태
$SubTy 			= trim( $_POST["SubTy"] );				//서브결제형태
$rStoreId 		= trim( $_POST["rStoreId"] );			//업체ID
$rAmt 			= trim( $_POST["rAmt"] );				//거래금액
$rOrdNo 		= trim( $_POST["rOrdNo"] );				//주문번호
$rProdNm 		= trim( $_POST["rProdNm"] );			//상품명
$rOrdNm			= trim( $_POST["rOrdNm"] );				//주문자명

//소켓통신결제(신용카드,핸드폰,일반가상계좌)시 사용
$rSuccYn 		= trim( $_POST["rSuccYn"] );			//성공여부
$rResMsg 		= trim( $_POST["rResMsg"] );			//실패사유
$rApprTm 		= trim( $_POST["rApprTm"] );			//승인시각

//신용카드공통
$rBusiCd 		= trim( $_POST["rBusiCd"] );			//전문코드
$rApprNo 		= trim( $_POST["rApprNo"] );			//승인번호
$rCardCd 		= trim( $_POST["rCardCd"] );			//카드사코드
$rDealNo 		= trim( $_POST["rDealNo"] );			//거래고유번호

//신용카드(안심,일반)
$rCardNm 		= trim( $_POST["rCardNm"] );			//카드사명
$rMembNo 		= trim( $_POST["rMembNo"] );			//가맹점번호
$rAquiCd 		= trim( $_POST["rAquiCd"] );			//매입사코드
$rAquiNm 		= trim( $_POST["rAquiNm"] );			//매입사명


//계좌이체
$ICHE_OUTBANKNAME	= trim( $_POST["ICHE_OUTBANKNAME"] );		//이체계좌은행명
$ICHE_OUTACCTNO 	= trim( $_POST["ICHE_OUTACCTNO"] );			//이체계좌번호
$ICHE_OUTBANKMASTER = trim( $_POST["ICHE_OUTBANKMASTER"] );		//이체계좌소유주
$ICHE_AMOUNT 		= trim( $_POST["ICHE_AMOUNT"] );			//이체금액

//핸드폰
$rHP_TID 		= trim( $_POST["rHP_TID"] );			//핸드폰결제TID
$rHP_DATE 		= trim( $_POST["rHP_DATE"] );			//핸드폰결제날짜
$rHP_HANDPHONE 	= trim( $_POST["rHP_HANDPHONE"] );		//핸드폰결제핸드폰번호
$rHP_COMPANY 	= trim( $_POST["rHP_COMPANY"] );		//핸드폰결제통신사명(SKT,KTF,LGT)

//ARS
$rARS_PHONE = trim( $_POST["rARS_PHONE"] );				//ARS결제전화번호

//가상계좌
$rVirNo 		= trim( $_POST["rVirNo"] );				//가상계좌번호 가상계좌추가
$VIRTUAL_CENTERCD = trim( $_POST["VIRTUAL_CENTERCD"] );	//가상계좌 입금은행코드

//이지스에스크로
$ES_SENDNO	= trim( $_POST["ES_SENDNO"] );				//이지스에스크로(전문번호)

//*******************************************************************************
//* MD5 결제 데이터 정상여부 확인
//* 결제전 AGS_HASHDATA 값과 결제 후 rAGS_HASHDATA의 일치 여부 확인
//* 형태 : 상점아이디(StoreId) + 주문번호(OrdNo) + 결제금액(Amt)
//*******************************************************************************

$AGS_HASHDATA	= trim( $_POST["AGS_HASHDATA"] );				
$rAGS_HASHDATA	= md5($rStoreId . $rOrdNo . (int)$rAmt);				

if($AGS_HASHDATA == $rAGS_HASHDATA){
	$errResMsg   = "";
}else{
	$errResMsg   = "결재금액 변조 발생. 확인 바람";
}

$shopping = new Shopping();

$userData = array(":id" => $_SESSION["USER_ID"]);
$rData = $shopping->userModifyInfo($userData);

?>        
		<!-- 본문 시작 -->
        <div class="sub_content" style="margin-left: 0px; width: 1024px;">
            <h3 class="sub_h3">주문완료</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>쇼핑 >&nbsp;</li>
                <li class="text_bold">주문완료</li>
            </ul>

            <div style="padding-top:25px;">
                <p class="shop_title float_left" style="padding-top:12px;">
                    <img src="/images/li1.gif" alt="" />주문번호 : <span style="color:#606060"><?=$rOrdNo?> / </span>주문일 : <span style="color:#606060"><?=$rApprTm?></span>
                </p>
                <!--<div class="float_right">
                    <input type="button" value="현금영수증신청" style="margin-right:3px;" class="shop_btn1" />
                    <input type="button" value="신용카드매출전표" class="shop_btn1" />
                </div>-->

                <table class="shop_table1" style="clear:both;margin-bottom:37px;">
                    <thead>
                        <tr>
                            <th>상품정보</th>
                            <th>수량</th>
                            <th>상품가</th>
                            <th>주문금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="shop_tlink1">
                                <a href="">
                                    <img src="/html/sample/p1.jpg" style="width:60px; height:60px;" alt="크리스탈 두줄합장주" />
                                    크리스탈 두줄합장주
                                </a>
                            </td>
                            <td>1</td>
                            <td>11,760원</td>
                            <td>11,760원</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <span style="color:#333;">총 주문금액 : </span>
                                <span style="color:#f33;">15,760원</span>
                                <span style="font-size:14px;">(주문금액 : 11,760원 + 배송료 : 4,000원)</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <p class="shop_title">
                    <img src="/images/li1.gif" alt="" />배송지정보
                </p>

                <table class="shop_table1 shop_table1_ex" style="clear:both;margin-bottom:37px;">
                    <tbody>
                        <tr>
                            <th scope="row">주문하시는 분</th>
                            <td><?=$rOrdNm?></td>
                        </tr>
                        <tr>
                            <th scope="row">받으시는 분</th>
                            <td><?=$rOrdNm?></td>
                        </tr>
                        <tr>
                            <th scope="row">배송지주소</th>
                            <td><?=$rData["zipcode"]?> <?=$rData["address"]?> <?=$rData["address2"]?></td>
                        </tr>
                        <tr>
                            <th scope="row">휴대폰</th>
                            <td><?=$rData["phone"]?></td>
                        </tr>
                        <tr>
                            <th scope="row">남기실 말씀</th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <p class="shop_title">
                    <img src="/images/li1.gif" alt="" />결제정보
                </p>

                <table class="shop_table1 shop_table1_ex" style="margin-bottom:10px;">
                    <tbody>
                        <tr>
                            <th scope="row">결제수단</th>
                            <td style="background:#ffdddc;">
							<?php

							if($AuthTy == "card")
							{
								if($SubTy == "isp")
								{
									echo "신용카드결제-안전결제(ISP)";
								}	
								else if($SubTy == "visa3d")
								{
									echo "신용카드결제-안심클릭";
								}
								else if($SubTy == "normal")
								{
									echo "신용카드결제-일반결제";
								}
								
							}
							else if($AuthTy == "iche")
							{
								echo "계좌이체";
							}
							else if($AuthTy == "hp")
							{
								echo "핸드폰결제";
							}
							else if($AuthTy == "ars")
							{
								echo "ARS결제";
							}
							else if($AuthTy == "virtual")
							{
								echo "가상계좌결제";
							}
							?>
							</td>
                        </tr>
                        <tr>
                            <th scope="row">결제금액</th>
                            <td>
                                <span style="color:#f33;font-size:16px;">15,760원</span>
                                <span style="font-size:14px;">(상품금액 : 11,760원 + 배송료 : 4,000원)</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!--<div style="text-align:right;">
                    <input type="button" value="현금영수증신청" class="shop_btn1" />
                    <input type="button" value="신용카드매출전표" class="shop_btn1" />
                </div>-->

                <div style="text-align:center; padding:20px 0px;">
                    <!--<input type="button" value="주문내역보기" class="shop_btn2" style="margin-right:3px;" />-->
                    <input type="button" value="메인으로" class="shop_btn3" onclick="location.href='/'"/>
                </div>

            </div>
        </div>
        <!-- 본문 끝 -->