                <span class="search_help_txt" id="helpText" onclick="$('#txtKeyword').focus();">이달의 무당</span>
                <input type="text" class="float_left" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" />

                <button class="float_right st_sch_btn"><div>점집 검색</div></button>
                <div class="float_right st_sch_option">인기도순</div>
                <div class="float_right st_sch_option">
                    <select name="depthOneArea" onchange="setDepthTwoAddress();">
						<option value="서울" selected>서울특별시</option>
						<option value="경기">경기도</option>
						<option value="강원">강원도</option>
						<option value="경북">경상북도</option>
						<option value="경남">경상남도</option>
						<option value="충북">충청북도</option>
						<option value="충남">충청남도</option>
						<option value="전북">전라북도</option>
						<option value="전남">전라남도</option>
						<option value="제주">제주도</option>
                    </select>
                </div>