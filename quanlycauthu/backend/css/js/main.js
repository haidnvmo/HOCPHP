$(document).ready(function(){
//    $('#search').click(function(){
        $('#search-name').keyup(function(){
            var status = 'search';
            var name = $('#search-name').val();
            $.ajax({
                    url:'http://localhost/PHP/quanlycauthu/backend/add_edit_delete/search.php',
                    type:'GET',
                    data:{
                        status,
                        name,
                    },
                    async:true,
                    success:function(data){
                    var dataPlayer = JSON.parse(data);             
                        $('#list-players').css('display', 'none');
                        $.each(dataPlayer, function(value) {
                            var players = `<tr>
                            <td>${value['name']}</td>
                            <td>${value['age']}</td>
                            <td>${value['national']}</td>
                            <td>${value['position']}</td>
                            <td>${value['salary']}</td>
                            </tr>`;
                            $('.list-search-players').html(players);
                    });                        
                }
            })
        })    
//    })
})
