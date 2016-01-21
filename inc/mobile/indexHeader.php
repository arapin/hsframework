<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <title>산신각</title>

    <link href="//vjs.zencdn.net/4.9/video-js.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/4.9/video.js"></script>

    <link rel="stylesheet" type="text/css" href="/html/mobile/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/html/mobile/css/main.css" />
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/html/mobile/css/common.js"></script>

    <script>

		function getMainImg(seq){
			var rtnData = "";
			$.ajax({
				url : '?com=main&pro=maininfo',
				data : {'mode':'mainBig', 'seq' : seq},
				type : 'post',
				async:false,
				success : function (data){
					rtnData = data;
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});

			return rtnData;
		}

		function getMainSubImg(seq){
			var rtnData = "";
			$.ajax({
				url : '?com=main&pro=maininfo',
				data : {'mode':'mainMiddle', 'seq' : seq},
				type : 'post',
				async:false,
				success : function (data){
					rtnData = data;
				},
				error : function(){
					alert('통신 에러 입니다.');
				}
			});

			return rtnData;
		}


        var topBgIndex = 1;
        var introIndex = 1;

        $(
            function()
            {
                // 상단 배경 이미지 변경
                setInterval(
                    function ()
                    {
                        topBgIndex++;

                        if (topBgIndex > 5) topBgIndex = 1;
						var imgUrl = getMainImg(topBgIndex);

                        var bgImage = "url(" + imgUrl + ") center no-repeat";
                        
                        $("#intro_overlap").css("background", bgImage);
                        $("#intro_overlap").css("background-size", "cover");

                        $("#intro_overlap").fadeIn(1500, function ()
                        {
                            $("#top_intro").css("background", bgImage);
                            $("#top_intro").css("background-size", "cover");

                            $("#intro_overlap").fadeOut();
                        });
                    }
                , 5000); // 5초마다 변경

                setInterval(
                    function ()
                    {
                        introIndex++;

                        if (introIndex > 4) introIndex = 1;
						var imgUrl = getMainSubImg(introIndex);

                        var bgImage = "url(" + imgUrl + ") no-repeat";

                        $("#sub_overlap").css("background", bgImage);
                        $("#sub_overlap").css("background-size", "cover");

                        $("#sub_overlap").fadeIn(1500, function ()
                        {
                            $("#sub_intro").css("background", bgImage);
                            $("#sub_intro").css("background-size", "cover");

                            $("#sub_overlap").fadeOut();
                        });
                    }
                , 5000); // 5초마다 변경
            }
        )
    </script>
</head>
<body>
    <div id="bodyWrap" style="background:#f0f0f0;">
        <div class="header">
            <input type="image" onclick="showSideMenu()" src="/images/mobile/menu_btn.jpg" width="18" height="17" alt="메뉴" class="header_btn" />
            <a href="/"><img src="/images/mobile/logo.png" style="margin-top:5px;" width="40" height="40" alt="산신각" /></a>
        </div>