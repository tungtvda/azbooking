$contentLoadTriggered = false;
$(".content_ul_li").scroll(
    function()
    {
      if($(".content_ul_li").scrollTop() >= ($(".ul_li").height() - $(".content_ul_li").height()) && $contentLoadTriggered == false)
      {
        $contentLoadTriggered = true;
        $(".ul_li").append('<li><a href="">asdfasdf</a></li>');
        $contentLoadTriggered = false;
        //$.ajax  (
        //    {
        //      type: "POST",
        //      url: "LoadOnScroll.aspx/GetDataFromServer",
        //      data: "{}",
        //      contentType: "application/json; charset=utf-8",
        //      dataType: "json",
        //      async: true,
        //      cache: false,
        //      success:    function (msg)
        //      {
        //        $(".ul_li").append(msg.d);
        //        $contentLoadTriggered = false;
        //      },
        //      error:  function (x, e)
        //      {
        //        alert("The call to the server side failed. " + x.responseText);
        //      }
        //    }
        //);
      }
    }
);