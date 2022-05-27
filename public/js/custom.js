
  // submit logout form

document.getElementById('logout_btn').addEventListener('click',()=>{
       document.getElementById('frm_logout').submit();
})    

$(document).ready(function(){
  $("#btn_add").click(function(){
    $('#addModal').modal('show')
  });
  $("#btn_add_close").click(function(){
    $('#addModal').modal('hide')
  });
  $("#add_close").click(function(){
    $('#addModal').modal('hide')
  });
})


// document.getElementById("#btn_remove").addEventListener('click',(e)=>{
         
//           document.getElementById("#frm_remove").submit();
// })




