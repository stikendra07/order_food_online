$(() => {
  $(".hidden").hide();
  $(".para1").show();
  $(".panel-line").click(function () {
    $(".hidden").hide();
    //all p hide and buton with show
    $(".para" + $(this).attr("data-target")).show();
  });
});
