                <span class="search_help_txt" id="helpText" onclick="$('#txtKeyword').focus();">검색어를 입력하세요</span>
                <input type="text" id="txtKeyword" onfocus="$('#helpText').hide(100);" onblur="if($('#txtKeyword').val() == '') $('#helpText').show(100);" />
                <img src="/images/search_btn.gif" alt="검색" />
