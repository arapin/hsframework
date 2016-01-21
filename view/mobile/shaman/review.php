<?
	$shaman = new Shaman();
	$SHId = Request::get('SHId', Request::REQUEST | Request::XSS_CLEAR);
	$memoIdx = Request::get('memoIdx', Request::POST | Request::XSS_CLEAR);

	if($memoIdx != ""){
		$getBeen = array(":idx" => $memoIdx);
		$memoData = $shaman->getAffterInfo($getBeen);
	}
?>
<script>
	function memoChk(){
		var form = document.memoForm;

		if(form.memo.value == ""){
			alert('내용을 입력하여 주십시요.');
			return false;
		}

		form.submit();
	}
</script>
	<div class="layer_title" style="text-align:left; padding-left:20px;">
        <p>후기 등록하기</p>
        <input type="image" src="/images/mobile/btn_close.gif" alt="" onclick="location.href = '?com=shaman&lnd=shamanHome&SHId=<?=$SHId?>'"/>
    </div>
<form name="memoForm" method="post" action="?com=shaman&pro=shamaninfo">
<?if($memoIdx == ""){?>
<input type="hidden" name="mode" value="afftermemoinsert"/>
<?}else{?>
<input type="hidden" name="mode" value="modifyMemo"/>
<?}?>
<input type="hidden" name="userId" value="<?=$_SESSION["USER_ID"]?>"/>
<input type="hidden" name="code" value="<?=$SHId?>_affter"/>
<input type="hidden" name="SHId" value="<?=$SHId?>"/>
<input type="hidden" name="memoIdx" value="<?=$memoIdx?>"/>

    <fieldset class="login_field login_field_ex">
<?if($memoIdx == ""){?>
        <dl class="review_score">
            <dt>정확성</dt>
            <dd>
                <ul class="l_style_inline">
                    <li>
                        <label>
                            <input type="radio" name="pointerP" value="5" <?if($memoData["pointerP"] == "5"){?>checked<?}?>/><img src="/images/mobile/ic_star5.png" alt="5점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="pointerP" value="4" <?if($memoData["pointerP"] == "4"){?>checked<?}?>/><img src="/images/mobile/ic_star4.png" alt="4점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="pointerP" value="3" <?if($memoData["pointerP"] == "3"){?>checked<?}?>/><img src="/images/mobile/ic_star3.png" alt="3점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="pointerP" value="2" <?if($memoData["pointerP"] == "2"){?>checked<?}?>/><img src="/images/mobile/ic_star2.png" alt="2점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="pointerP" value="1" <?if($memoData["pointerP"] == "1"){?>checked<?}?>/><img src="/images/mobile/ic_star1.png" alt="1점" />
                        </label>
                    </li>
                </ul>
            </dd>

            <dt>친절도</dt>
            <dd>
                <ul class="l_style_inline">
                    <li>
                        <label>
                            <input type="radio" name="serviceP" value="5" <?if($memoData["serviceP"] == "5"){?>checked<?}?>/><img src="/images/mobile/ic_star5.png" alt="5점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="serviceP" value="4" <?if($memoData["serviceP"] == "4"){?>checked<?}?>/><img src="/images/mobile/ic_star4.png" alt="4점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="serviceP" value="3" <?if($memoData["serviceP"] == "3"){?>checked<?}?>/><img src="/images/mobile/ic_star3.png" alt="3점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="serviceP" value="2" <?if($memoData["serviceP"] == "2"){?>checked<?}?>/><img src="/images/mobile/ic_star2.png" alt="2점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="serviceP" value="1" <?if($memoData["serviceP"] == "1"){?>checked<?}?>/><img src="/images/mobile/ic_star1.png" alt="1점" />
                        </label>
                    </li>
                </ul>
            </dd>

            <dt>위치</dt>
            <dd>
                <ul class="l_style_inline">
                    <li>
                        <label>
                            <input type="radio" name="locationP" value="5" <?if($memoData["locationP"] == "5"){?>checked<?}?>/><img src="/images/mobile/ic_star5.png" alt="5점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="locationP" value="4" <?if($memoData["locationP"] == "4"){?>checked<?}?>/><img src="/images/mobile/ic_star4.png" alt="4점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="locationP" value="3" <?if($memoData["locationP"] == "3"){?>checked<?}?>/><img src="/images/mobile/ic_star3.png" alt="3점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="locationP" value="2" <?if($memoData["locationP"] == "2"){?>checked<?}?>/><img src="/images/mobile/ic_star2.png" alt="2점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="locationP" value="1" <?if($memoData["locationP"] == "1"){?>checked<?}?>/><img src="/images/mobile/ic_star1.png" alt="1점" />
                        </label>
                    </li>
                </ul>
            </dd>

            <dt>가격</dt>
            <dd>
                <ul class="l_style_inline">
                    <li>
                        <label>
                            <input type="radio" name="priceP" value="5" <?if($memoData["priceP"] == "5"){?>checked<?}?>/><img src="/images/mobile/ic_star5.png" alt="5점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="priceP" value="4" <?if($memoData["priceP"] == "4"){?>checked<?}?>/><img src="/images/mobile/ic_star4.png" alt="4점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="priceP" value="3" <?if($memoData["priceP"] == "3"){?>checked<?}?>/><img src="/images/mobile/ic_star3.png" alt="3점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="priceP" value="2" <?if($memoData["priceP"] == "2"){?>checked<?}?>/><img src="/images/mobile/ic_star2.png" alt="2점" />
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="priceP" value="1" <?if($memoData["priceP"] == "1"){?>checked<?}?>/><img src="/images/mobile/ic_star1.png" alt="1점" />
                        </label>
                    </li>
                </ul>
            </dd>

        </dl>
<?}?>
        <textarea style="width:100%; height:280px; border:1px solid #c3c3c3; color:#888; box-sizing:border-box; padding:10px; font-size:14px; border-radius:2px;" name="memo"><?=$memoData["memo"]?></textarea>
<?if($memoIdx == ""){?>
        <button type="button" style="margin-top:10px;" class="btn_1" onclick="memoChk();">
            등록하기
        </button>
<?}else{?>
        <button type="button" style="margin-top:10px;" class="btn_1" onclick="memoChk();">
            수정하기
        </button>
<?}?>
    </fieldset>