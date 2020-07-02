const base_url = $("#base_url").val();
const token = $("#token").val();

$(document).on('click','.addCart',function() {
	let id = $(this).attr('data-id');
	console.log(id);
  $.ajax({
  	type:"post",
  	url: base_url+"/addtocart",
  	data:{'_token':token,id:id},
  	success:function (r) {
  		console.log(r);
  	}
  })

});


$(document).on('click','.addWish',function() {
  let idd = $(this).attr('data-id');
  console.log(idd);
  $.ajax({
    type:"post",
    url: base_url+"/addtowish",
    data:{'_token':token,id:idd},
    success:function (r) {
      console.log(r);
    }
  })

});



$(document).on('change','.countProduct',function() {
let countId = $(this).val();

let id=$(this).attr('data-id');

$.ajax({
  type:'post',
  url:base_url+"/count",
  data:{'_token':token,count:countId,id:id},
  success:(r)=>{
    $(this).val(r.count);
    $(this).parents('tr').find('.product-price-special').html(r.total);
  }
  
});

});

  $(".remove_from_cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this).attr("data-id");
 
        
                $.ajax({
                    url: base_url+"/remove",
                    method: "post",
                    data: {_token: token, id: ele},
                    success:(response)=> {
                        $(this).parents('tr').remove();
                    }
                });
            
        });