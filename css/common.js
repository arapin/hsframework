
// 퀵메뉴 등록
$(function ()
{
    if ($('.quick_menu').length > 0)
    {
        var top = $('.quick_menu').offset().top;

        $(window).bind("scroll", function ()
        {
            var scrollTop = window.scrollY ? window.scrollY : (document.compatMode == "CSS1Compat" ? document.documentElement.scrollTop : document.body.scrollTop);

            $('.quick_menu').stop();
            $('.quick_menu').animate({ "top": scrollTop + top }, 200);
        });
    }
});

var _oldLayerPop = null;

function showPop(targetID)
{
    var height = document.compatMode == "CSS1Compat" ? document.documentElement.scrollHeight : document.body.scrollHeight;

    $(".pop_layer_wrap").css("height", height);

    if (targetID != null)
{
        if (_oldLayerPop != null) _oldLayerPop.hide();

        _oldLayerPop = $("#" + targetID);
        
        _oldLayerPop.height();
        _oldLayerPop.show();
        
        //_oldLayerPop.css("top", _oldLayerPop.height() / 2 * -1);
        height = _oldLayerPop.height();

        if (height == 0)
        {
            height = $(_oldLayerPop.children()[0]).height();
        }

        _oldLayerPop.css("margin-top", height / 2 * -1 - 20);
    }
    else
    {
        if(document.body.clientHeight < $($(".pop_overlap").next()).height())
        {
            var top = document.compatMode == "CSS1Compat" ? document.documentElement.scrollTop : document.body.scrollTop;

            $($(".pop_overlap").next()).css("position", "absolute");
            $($(".pop_overlap").next()).css("top", top);
            $($(".pop_overlap").next()).css("margin-top", 0);

            document.body.scrollTop = top;
            document.documentElement.scrollTop = top;
        }
        else
        {
            $($(".pop_overlap").next()).css("position", "fixed");
            $($(".pop_overlap").next()).css("top", "50%");
            $($(".pop_overlap").next()).css("margin-top", $($(".pop_overlap").next()).height() / 2 * -1);
        }

        //document.body.scrollTop = 0;
        //document.documentElement.scrollTop = 0;
    }

    $(".pop_layer_wrap").show(100, function () { });
}

function closePop()
{
    $(".pop_layer_wrap").hide(100);

    //$("#txtSubject").val("");
    //$("#txtContent").val("");
}

function scrollTop()
{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}