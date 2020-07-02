 @extends('layout.layout')

@section('title','Wishlist')

@section('body')

<!-- Start Loading -->

<!-- end header -->

<!-- start main content -->
<main class="main-container">
<!-- shopping cart content -->
<section class="shopping-cart-area">
	<!-- Begin cart -->
	<div class="ld-subpage-content">

		<div class="ld-cart">

			<!-- Begin cart section -->
			<section class="ld-cart-section ptb-50">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<!-- Begin table -->
							<table class="table cart-table">
								<thead>
								<tr>
									<th class="table-title">Product Name</th>
									<th class="table-title">Product Code</th>
									<th class="table-title">Unit Price</th>
									<th class="table-title">Quantity</th>
									<th class="table-title">SubTotal</th>
									<th>

										<span class="close-button disabled"></span></th>
								</tr>
								</thead>


								<tbody>
                               @foreach($wish as $w)
								<tr>
									<td class="product-name-col">
										<figure>
											<a href="#"><img class="img-responsive" src="{{asset('images/'.$w['product']['photo'][0]['url'])}}" alt="White linen sheer dress"></a>
										</figure>
										<h2 class="product-name"><a href="#">{{$w['product']['name']}}</a></h2>

										<ul>
											<li>Color: White</li>
											<li>Size: SM</li>
										</ul>
									</td>
									<td class="product-code">MP125984154</td>
									
									
									<td class="product-total-col">
										<span class="product-price-special">{{$w['product']['price']}}</span>
									</td>
									<td>
										<a href="#" class="addCart" data-id="{{$w['product']['id']}}">Add to cart</a>
									</td>
								</tr>
								@endforeach
								<!-- End tr -->

								
								</tbody>
							</table>
							<!-- End table -->

						
</main>

<!-- start footer area -->



	
<!-- footer area end -->


@endsection


