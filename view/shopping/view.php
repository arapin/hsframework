<script>
	function notLogin(){
		alert('로그인을 해주시기 바랍니다.');
		location.href='?com=user&lnd=login';
	}
</script>
		<!-- 본문 시작 -->
        <div class="sub_content" style="margin-left: 0px; width: 1024px;">
            <h3 class="sub_h3">양쵸/향/염주</h3>
            <ul class="l_style_left sub_site_map">
                <li>HOME >&nbsp;</li>
                <li>쇼핑 >&nbsp;</li>
                <li class="text_bold">양쵸/향/염주</li>
            </ul>

            <div style="padding-top:25px;">

                <div style="font-size:11.5pt;background:#e9e9f1;border:1px solid #ccc; padding:20px;display:table;width:100%;box-sizing:border-box; padding-left:30px;">
                    <div style="display:table-cell;">
                        <ul class="shop_cate_lst">
                            <li><a style="color:#f55;" href="">양초/향/염주</a></li>
                            <li><a href="">부적 Item</a></li>
                            <li><a href="">불상/탱화/무신도</a></li>
                            <li><a href="">신당용품</a></li>
                            <li><a href="">무속용품</a></li>
                            <li><a href="">굿용품</a></li>
                            <li><a href="">악기류</a></li>
                            <li><a href="">펜시/악세사리</a></li>
                            <li><a href="">생활용품</a></li>
                            <li><a href="">서적/음반</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div style="display:table;width:100%;margin-top:40px;">
                        <div style="display:table-cell;width:240px;vertical-align:top;">
                            <img src="/html/sample/pd1.jpg" style="width:240px;height:240px;" alt="" />
                            <div style="text-align:center;margin-top:25px;">
                                <a href="" style="color:#666;text-decoration:none;font-size:13px;"><img src="/images/zoom.jpg" alt="" style="vertical-align:middle; margin-right:5px;" />큰이미지보기</a>
                            </div>
                        </div>
                        <div style="display:table-cell;padding-left:40px;vertical-align:top;">
                            <table class="shop_table2">
                                <caption>크리스탈 두줄합장주</caption>

                                <tbody>
                                    <tr>
                                        <th scope="row">상품번호</th>
                                        <td>20120824195544_6229</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">소비자가격</th>
                                        <td>11,760원</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">판매가격</th>
                                        <td style="color:#f33;font-size:17px;">11,760원</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">제조사</th>
                                        <td>불교용품</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">원산지</th>
                                        <td>한국</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">배송정보</th>
                                        <td>주문금액별 배송비 차등 적용</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-bottom:12px;" scope="row">수량</th>
                                        <td style="padding-bottom:12px;">
                                            <input type="text" value="1" style="width:60px; height:29px; border:1px solid #ccc; color:#333; padding-left:5px; box-sizing:border-box; float:left;" />
                                            <div style="float:left;margin-left:1px;">
                                                <div style="line-height:0px;margin-bottom:1px;"><input type="image" src="/images/up_btn.jpg" alt="" /></div>
                                                <div><input type="image" src="/images/down_btn.jpg" alt="" /></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            총 합계금액 : <span style="color:#f33;">11,760원</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div style="margin-top:8px;">
<?if($_SESSION["USER_ID"] != ""){?>
                                <input type="button" value="바로구매하기" onclick="location.href='?com=shopping&lnd=payment'" class="shop_btn2" style="margin-right:5px;" />
<?}else{?>
                                <input type="button" value="바로구매하기" onclick="notLogin();" class="shop_btn2" style="margin-right:5px;" />
<?}?>
                                <input type="button" value="문의하기" class="shop_btn7" />
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display:table;width:100%;margin-top:40px;" id="detail">
                    <div style="display:table-cell;border:1px solid #f77;border-bottom:none; height:40px;text-align:center;line-height:40px;font-size:15px;width:515px;">
                        <a href="#detail" style="color:#f55;text-decoration:none;">상품상세정보</a>
                    </div>
                    <div style="display:table-cell;width:10px;border-bottom:1px solid #f77; height:40px;"></div>
                    <div style="display:table-cell;background:#eee;border:1px solid #bbb; border-bottom:1px solid #f77; height:40px; text-align:center;line-height:40px;font-size:15px;width:515px;">
                        <a href="#tran" style="color:#666;text-decoration:none;">배송/교환/반품정보</a>
                    </div>
                </div>

                <div style="color:#888;font-size:14px;padding-top:5px;">
                    <p>
                        불교용품,무속용품,크리스탈두줄합장주
                    </p>
                    <img src="/html/sample/pd1.jpg" alt="" />
                </div>

                <div style="display:table;width:100%;margin-top:40px;" id="tran">
                    <div style="display:table-cell;background:#eee;border:1px solid #bbb; border-bottom:1px solid #f77; height:40px; text-align:center;line-height:40px;font-size:15px;width:515px;">
                        <a href="#detail" style="color:#666;text-decoration:none;">상품상세정보</a>
                    </div>
                    <div style="display:table-cell;width:10px;border-bottom:1px solid #f77; height:40px;"></div>
                    <div style="display:table-cell;border:1px solid #f77;border-bottom:none; height:40px;text-align:center;line-height:40px;font-size:15px;width:515px;">
                        <a href="#tran" style="color:#f55;text-decoration:none;">배송/교환/반품정보</a>
                    </div>
                </div>

                <div>
                    <table class="shop_table3" style="margin-bottom:10px;">
                        <tbody>
                            <tr>
                                <th>배송 안내</th>
                                <td>
                                    <ul>
                                        <li>- 무료배송 서비스를 제공해 드리고 있지만 일부 지역/사이즈에 따라 배송비가 발생할 수 있으니 양해바랍니다.</li>
                                        <li>- 결제 완료 후 평균2일이내</li>
                                        <li>- 3일이내 : 95% 배송 가능합니다. (단, 지역별/업체별 상황에 따라 변경될 수 있습니다. (토/일/공휴일 제외)</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>반품/교환 안내</th>
                                <td>
                                    <ul>
                                        <li style="color:#333;">- 상품불량 및 오배송등의 이유로 반품하실 경우, 반품배송비는 무료입니다.</li>
                                        <li style="color:#333;">- 단순변심 및 고객님의 사정으로 반품하실 경우, 반품 배송비는 고객님 부담입니다.</li>
                                        <li style="color:#333;">- 나의 쇼핑정보 내 반품/교환신청 메뉴에서 바로 접수가 가능합니다.</li>
                                        <li>- 반품신청시 업체에서 상품확인 후 환불처리 됩니다. 수거일로부터 영업일 기준 3일 이내에 환불처리됩니다.</li>
                                        <li>&nbsp;&nbsp;&nbsp;(카드사 사정에 따라 카드취소는 시일이 소요될 수 있습니다.)</li>
                                        <li>- 반품 접수 후 영업일 기준 <span  style="color:#333;">2~5일 이내에 직접 방문하여 상품을 수거</span>합니다.</li>
                                    </ul>
                                    <p class="shop_subt">반품/교환 가능시점</p>
                                    <ul>
                                        <li>- 반품 및 교환은 상품 수령 후 30일 이내에 신청하실 수 있습니다.</li>
                                        <li>&nbsp;&nbsp;&nbsp;단, 의류/언더웨어/보석/서적/잡화/컴퓨터/디지털기기는 15일, 핸드폰은 14일 이내에 신청하실 수 있습니다.</li>
                                    </ul>
                                    <p class="shop_subt">반품/교환 불가사유</p>
                                    <ul>
                                        <li style="color:#333;">- 다음의 경우에는 반품/교환이 불가합니다.</li>
                                        <li>&nbsp;&nbsp;&nbsp;반품/교환 가능기간을 초과하였을 경우</li>
                                        <li>&nbsp;&nbsp;&nbsp;상품 및 구성품을 분실하였거나 취급부주의로 인한 파손/고장/오염된 경우</li>
                                        <li>&nbsp;&nbsp;&nbsp;고객님의 요청에 의해 상품사양이 변경(변형)되거나, 주문제작 된 경우 (제작이 시작된 이후부터 취소 및 반품/교환이 불가 합니다.)</li>
                                        <li>&nbsp;&nbsp;&nbsp;상품을 착용하였거나 세탁, 수선한 경우</li>
                                    </ul>
                                    <p class="shop_subt">반품/교환 참고사항</p>
                                    <ul>
                                        <li>- 반품/교환시 고객님 귀책사유로 인해 수거가 지연될 경우에는 반품이 제한될 수 있습니다.</li>
                                        <li>- 모니터 해상도의 차이로 인해 색상이나 이미지가 실제와 다를 수 있으며, 이로 인한 반품 및 교환이 제한될 수 있습니다.</li>
                                        <li>- 일부 상품의 경우, 제조사의 사정(신모델 출시 등) 및 부품 가격변동 등에 의해 가격이 변동 될 수 있으며, 이로 인한 반품 및 가격보상은 불가합니다.</li>
                                        <li>- 명품은 택 제거 후 반품 불가합니다.</li>
                                        <li>- 일부 세트 상품의 부분 반품 및 교환이 불가하오니 양해바랍니다.</li>
                                        <li>- 홀로그램 등을 분리/분실/훼손하여 상품의 가치가 현저히 감소하여 재판매가 불가하였을 경우 반품 및 교환이 제한될 수 있습니다.</li>
                                        <li>- 상품특성상 측정방법에 따라 표기된 사이즈의 오차가 있을 수 있으며, 이로 인한 반품 및 교환은 제한될 수 있습니다.</li>
                                        <li>- 인터넷 판매의 특성상 수선 서비스가 불가합니다.</li>
                                        <li>- 일부상품은 트러블(알러지, 붉은 반점, 가려움, 따가움)발생 시 사진, 소견서, 진료 확인서 중 1가지를 첨부하셔야 반품이 가능합니다. (단, 기타 제반 비용은<br />
                                            &nbsp;&nbsp;&nbsp;고객님의 부담입니다.)</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th style="border:none;">A/S 안내</th>
                                <td style="border:none;">
                                    <ul>
                                        <li>- 상품의 불량에 의한 반품, 교환, A/S, 환불, 품질보증 및 피해보상 등에 관한 사항은 소비자분쟁해결기준(공정거래위원회 고시)에 따라 받으실 수 있습니다.</li>
                                        <li>- 전기용품 및 어린이용품 등은 전기용품안전관리법 및 품질경영및공산품안전관리법에 의거하여 미인증 상품 또는 제품에 기재된 안전인증 정보가 사실과 다를 경우<br />
                                            &nbsp;&nbsp;&nbsp;소비자는 환불 또는 반품의 권리가 있음을 알려드립니다.</li>
                                        <li>&nbsp;&nbsp;&nbsp;상세 안전인증번호는 제품에 부착된 라벨(Tag)을 통해 확인하실 수 있습니다.</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- 본문 끝 -->