$(document).ready(function(){
  $('#selectAllBoxes').click(function(event){
    if(this.checked) {
      $('.checkboxes').each(function(){
        this.checked = true;
      });
    } else {
      $('.checkboxes').each(function(){
        this.checked = false;
      });
    }
  });
});

function loadUsersOnline() {
    $.get("../admin/functions.php?users_online=result", function(data){
        $(".users-online").text(data);
    });
}
setInterval(function() {
    loadUsersOnline();
}, 500);
