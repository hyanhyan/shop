
<!-- end header -->
@extends('layout.layout')
@section('title','All products')

@section('body')

<!-- start main content -->
<main class="main-container">
<section class="product_content_area pt-40">
  <!-- start of page content -->

  <div class="lookcare-product-single container">

    <div class="row">

      <div class="main col-xs-12" role="main">


   <section class="related-products">

                  <h2>Product Description</h2>

                  <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                  </p>

                  <h3 class="section-title">Related Products</h3>

                  <div class="related-products-wrapper">

                    <div class="related-products-carousel">

                      <div class="product-control-nav">
                        <a class="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="next"><i class="fa fa-angle-right"></i></a>
                      </div>

                      <div class="products-top"></div>
                      <div class="row product-listing">
                        <div id="product-carousel" class="product-listing">

                          @foreach ($products as $p)

                          <div class="product  item first ">

                            <article>
                                 
                             @foreach ($p->photo as $f)
                              <figure>
                                <a href="#">
                                  <img src="{{asset('images/'.$f->url)}}" class="img-responsive" alt="T_7_front">
                                </a>  
                                
                          <a href="{{url('product/item/' . $p->id)}}" style="text-decoration: none;color:green">Details</a>
                                   

      {{--  <td><a href ="{{ url('/productUpdate', $p->id) }}" style="text-decoration: none;color:green">Edit</a></td> --}}
   
                                <a href="{{url('delete/' . $p->id)}}" style="text-decoration: none;color:red">Delete</a>
                                <a href="{{url('productUpdate/' . $p->id)}}" style="text-decoration: none;color:red">Edit</a>
                                @endforeach

                               
                              </figure>

                         <figcaption><span class="amount">{{$p->price}}</span></figcaption>


                              <h4 class="title"><a href="#">{{$p->name}}</a></h4>


                             
                          </div>
       
                      @endforeach


                      </div>
                    </div>

                  </div>

                </section>

         {{--      <div class="tab-content">
                <div class="panel entry-content">

                  <h2>Product Description</h2>

                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div> --}}

                <div class="panel entry-content">

                  <div id="reviews">
                    <div class="row">
                      <div class="col-md-6">
                        <div id="comments">
                          <h3>3 reviews for Ship Your Idea</h3>

                          <ol class="commentlist">
                            <li class="comment depth-1">

                              <div class="comment_container">

                                <img alt="gravatar" src="{{asset('images/temp-images/com-grav1.jpg')}}" class="avatar photo">
                                <div class="comment-text">




                                  <p class="meta">
                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    <strong>Stuart</strong> – <time datetime="2013-06-07T13:03:29+00:00">June 7, 2013</time>:
                                  </p>

                                  <div class="description">
                                    <p>Another great quality product that anyone who see’s me wearing has asked where to purchase one of their own.</p>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <!-- #comment-## -->
                            <li class="comment  depth-1">

                              <div class="comment_container">

                                <img src="{{asset('images/temp-images/com-grav2.jpg')}}" alt="image" class="avatar photo">
                                <div class="comment-text">




                                  <p class="meta">
                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    <strong>Ryan</strong> – <time datetime="2013-06-07T13:24:52+00:00">June 7, 2013</time>:
                                  </p>


                                  <div class="description">
                                    <p>This hoodie gets me lots of looks while out in public, I got the blue one and it’s awesome. Not sure if people are looking at my hoodie only, or also at my rocking bod.</p>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <!-- #comment-## -->
                            <li class="comment depth-1">

                              <div class="comment_container">

                                <img src="{{asset('images/temp-images/com-grav3.jpg')}}" alt="image" class="avatar photo">
                                <div class="comment-text">

                                  <div class="star-rating" title="Rated 3 out of 5">
                                  </div>

                                  <p class="meta">
                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <strong>Maria</strong> – <time datetime="2013-06-07T15:53:31+00:00">June 7, 2013</time>:
                                  </p>


                                  <div class="description">
                                    <p>Ship it!</p>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <!-- #comment-## -->
                          </ol>


                        </div>

                      </div>
                      <div class="col-md-6">
                        <div id="review_form_wrapper">
                          <div id="review_form">
                            <div id="respond" class="comment-respond">
                              <h3 class="comment-reply-title">Add a review </h3>
                              <form action="#" method="post" id="commentform" class="comment-form">
                                <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text"></p>
                                <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="text"></p>
                                <p class="comment-form-comment"><slabel for="comment">Your Review</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>
                                <p class="form-submit">
                                  <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                </p>
                              </form>
                            </div>
                            <!-- #respond -->
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="clear"></div>
                  </div>
                </div>
              </div>

            </div>

          </div>





        </div>
        <!-- #product-293 -->



      </div>
      <!-- end of main -->

    </div>
    <!-- end of .row -->

  </div>

  <!-- end of page content -->
</section>

<!-- service area -->
  <section class="block gray no-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content-box no-margin go-simple">
            <div class="mini-service-sec">
              <div class="row">
                <div class="col-md-3">
                  <div class="mini-service">
                    <i  class="fa fa-paper-plane"></i>
                    <div class="mini-service-info">
                      <h3>Worldwide Delivery</h3>
                      <p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
                    </div>
                  </div><!-- Mini Service -->
                </div>
                <div class="col-md-3">
                  <div class="mini-service">
                    <i  class="fa  fa-newspaper-o"></i>
                    <div class="mini-service-info">
                      <h3>Worldwide Delivery</h3>
                      <p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
                    </div>
                  </div><!-- Mini Service -->
                </div>
                <div class="col-md-3">
                  <div class="mini-service">
                    <i  class="fa fa-medkit"></i>
                    <div class="mini-service-info">
                      <h3>Friendly Stuff</h3>
                      <p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
                    </div>
                  </div><!-- Mini Service -->
                </div>
                <div class="col-md-3">
                  <div class="mini-service">
                    <i  class="fa  fa-newspaper-o"></i>
                    <div class="mini-service-info">
                      <h3>24/h Support</h3>
                      <p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
                    </div>
                  </div><!-- Mini Service -->
                </div>
              </div>
            </div><!-- Mini Service Sec -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
<!-- end service area -->
</main>
@endsection
<!-- end main content -->

<!-- start footer area -->
