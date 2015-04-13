$(function () {
    $('.h1article').css({color: "#FF0000"});
    $('p.article_infos').css({backgroundColor: "#FFFF00", borderLeft: "15px solid #0000ff"});
    $('p.article_extrait').css({left: 20, position:"relative"});
    
    $('article.article').hover(
              function () {
            $(this).animate({borderWidth: "10px", borderColor: "#ddd"}, 500);
            $(this).css({backgroundColor: "#aaa"});
              },
                function () {
             $(this).animate({borderWidth: "3px", borderColor: "#aaa"}, 500);       
             $(this).css({backgroundColor: "#ddd"});
                }
           );
}); 