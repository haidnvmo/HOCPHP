$(document).ready(function(){
   $('#search').click(function(){
       var status = 'search';
       var name = $('#search-name').val();
        $.ajax({
            url:'../../add_edit_delete/search.php',
            type:'GET',
            data:{
                status,
                name,
            },
            async:true,
            success:function(data){
                
            }
        })
   })
})
