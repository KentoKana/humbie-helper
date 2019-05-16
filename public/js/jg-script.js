

$(document).ready(function(){
  function load_questions(id)
  {
    $.ajax({
      url:"../../views/faq/get-questions.php",
      method:"POST",
      data:{id:id},
      success:function(data)
      {
        $('.questions_display').html(data);
        $('.faqs').html(data);
        //console.log(data);
      }
    });
  }
  load_questions(4);
  $('.jg_faq__ul li').click(function(){
    var cat_id = $(this).attr("id");
    load_questions(cat_id);
  })
});
if($("textarea[name='editor1']").length)
{
  CKEDITOR.replace( 'editor1' );
}
