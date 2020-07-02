 @extends('layout.layout')

@section('title','All products')

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
                               @foreach($cart as $c)
								<tr>
									<td class="product-name-col">
										<figure>
											<a href="#"><img class="img-responsive" src="{{asset('images/'.$c['product']['photo'][0]['url'])}}" alt="White linen sheer dress"></a>
										</figure>
										<h2 class="product-name"><a href="#">{{$c['product']['name']}}</a></h2>

										<ul>
											<li>Color: White</li>
											<li>Size: SM</li>
										</ul>
									</td>
									<td class="product-code">MP125984154</td>
									<td class="product-price-col">
										<span>{{$c['product']['price']}}</span>
									</td>
									<td>
										<div class="custom-quantity-input">
											<input type="text" name="quantity" class="countProduct" data-id="{{$c['id']}}" value="{{$c['count']}}">
										</div>
									</td>
									<td class="product-total-col">
										<span class="product-price-special">{{$c['product']['price'] * $c['count']}}</span>
									</td>
									<td>
										<a href="#" class="remove_from_cart" data-id="{{$c['id']}}"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								@endforeach
								<!-- End tr -->

								
								</tbody>
							</table>
							<!-- End table -->

							<div class="mt-30"></div>

							<div class="row">

								<div class="col-md-8">

									<!-- Begin tab container -->
									<div class="tab-container left clearfix">

										<ul class="nav nav-tabs" role="tablist">

											<li class="active"><a href="#shipping" data-toggle="tab">Shipping &amp; Taxes</a></li>
											<li><a href="#discount" data-toggle="tab">Discount Code</a></li>
											<li><a href="#gift" data-toggle="tab">Gift voucher</a></li>

										</ul>


										<!-- Begin tab content -->
										<div class="tab-content">

											<div class="tab-pane fade in active" id="shipping">

												<form action="#" class="clearfix">

													<p class="ship-desc">Enter your destination to get a shipping estimate</p>

													<div class="ship-row clearfix">

														<span class="ship-label col-3">Country<i>*</i></span>

														<div class="normal-selectbox lower col-3-2x country-select-box">
															<select id="country" name="country" class="selectbox">

																<option value="">Please select</option>

																<option value="Turkey">Australia</option>

																<option value="Germany">Germany</option>

																<option value="Korea">Japan</option>
															</select>
														</div>
													</div>
													<!-- /.ship-row -->

													<div class="ship-row clearfix">

														<span class="ship-label col-3">Region/State<i>*</i></span>

														<div class="normal-selectbox lower col-3-2x region-select-box">
															<select id="region" name="region" class="selectbox">

																<option value="">Please select</option>
																<option value="California">Las Vegas</option>

																<option value="Texas">Texas</option>

																<option value="California">California</option>
															</select>
														</div>
													</div>
													<!-- /.ship-row -->

													<div id="post-code-ship-row" class="ship-row clearfix">

														<span class="ship-label col-3">Post Codes<i>*</i></span>

														<div class="col-3 ship-post">
															<input type="text" class="form-control text-center" value="12315">
														</div>

														<div class="col-3 text-right">
															<a href="#" class="get-quotes btn btn-custom-6 btn-block">Get Quotes</a>
														</div>

													</div>
													<!-- /.ship-row -->
												</form>
											</div>
											<!-- /.tab-pane -->

											<div class="tab-pane fade" id="discount">

												<p class="ship-desc">Enter your discount coupon here:</p>
												<hr>

												<div class="ship-row clearfix">

                                                        <span class="ship-label col-3">Discount Code<i>*</i>
                                                </span>

													<div class="col-3-2x">
														<input type="text" class="form-control" placeholder="coupon here">
													</div>
												</div>
												<!-- /.ship-row -->

												<div class="ship-row clearfix">

                                                        <span class="ship-label col-3">Discount Code 2<i>*</i>
                                                </span>

													<div class="col-3-2x">
														<input type="text" class="form-control" placeholder="coupon here">
													</div>
												</div>
												<!-- /.ship-row -->

												<div class="ship-row"><a href="#" class="btn btn-custom-5">Activate</a></div>
											</div>
											<!-- /.tab-pane -->

											<div class="tab-pane fade" id="gift">

												<p class="ship-desc">Enter your discount coupon here:</p>
												<hr>

												<div class="ship-row clearfix">

													<span class="ship-label col-3">Voucher Code<i>*</i></span>

													<div class="col-3-2x">
														<input type="text" class="form-control" placeholder="coupon here">
													</div>

												</div>
												<!-- /.ship-row -->

												<div class="xs-margin"></div>

												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam omnis commodi praesentium non temporibus error eius molestiae cum.</p>

											</div>
											<!-- /.tab-pane -->
										</div>
										<!-- /.tab-content -->
									</div>
									<!-- /.tab-container -->



									<div class="mt-30"></div>
									<a href="#" class="btn btn-custom-6 btn-lger min-width-lg">Continue Shopping</a>
								</div>

								<div class="mt-30 visible-sm visible-xs clearfix"></div>

								<div class="col-md-4">

									<table class="table total-table">

										{{-- <tbody>
										<tr>
											<td class="total-table-title">Subtotal:</td>
											<td>$434.50</td>
										</tr>
										<tr>
											<td class="total-table-title">Shipping:</td>
											<td>$6.00</td>
										</tr>
										<tr>
											<td class="total-table-title">TAX (0%):</td>
											<td>$0.00</td>
										</tr>
										</tbody> --}}

									{{-- 	<tfoot>
										<tr>
											<td>Total:</td>
											<td>$440.50</td>
										</tr>
										</tfoot> --}}
									</table>
									<!-- End table -->
                                   @if(count($cart) > 0)
									<div class="mt-30"></div>

									<div class="text-right"><a href="{{url('/stripe')}}" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a>
									</div>
									@endif

								</div>
								<!-- /.col-md-4 -->
							</div>
							<!-- /.row -->
						</div>
					</div>
				</div>

			</section>
			<!-- /.ld-cart-section -->

		</div>
		<!-- /.ld-cart -->
	</div>
	<!-- /.ld-subpage-content -->
	<!-- End Cart -->
</section>
<!-- end shopping cart content -->

</main>

<!-- start footer area -->



	
<!-- footer area end -->


@endsection


