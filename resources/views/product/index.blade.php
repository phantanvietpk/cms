@extends('layouts.frontend')
@section('title',$product->name)
@push('header')
<script>
	var productAttributes = @json($productAttributes);
</script>
@endpush
@push('footer')
	<script type="text/javascript" src="{{ frontend_asset('js/lodash.core.js') }}"></script>
	<script type="text/javascript" src="{{ frontend_asset('js/attributes.js') }}"></script>
@endpush
@section('content')
    <!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>{{ $product->name }}</h1>
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">{{ $product->name }}</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="single-product">
						@include('flash::message')
						<div class="product">

							<div class="col_two_fifth">

								<!-- Product Single - Gallery
								============================================= -->
								<div class="product-image">
									<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
										<div class="flexslider">
											<div class="slider-wrap" data-lightbox="gallery">
                                                @foreach($gallrery as $item)
												<div class="slide" data-thumb="{{ $item }}"><a href="{{ $item }}" title="{{ $product->name }}" data-lightbox="gallery-item"><img src="{{ $item }}" alt="{{ $product->name }}"></a></div>
                                                @endforeach
											</div>
										</div>
									</div>
									<div class="sale-flash">Sale!</div>
								</div><!-- Product Single - Gallery End -->

							</div>

							<div class="col_two_fifth product-desc">

								<!-- Product Single - Price
								============================================= -->
								<div class="product-price"><del>$39.99</del> <ins>$24.99</ins></div><!-- Product Single - Price End -->

								<!-- Product Single - Rating
								============================================= -->
								{{--  <div class="product-rating">
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star-half-full"></i>
									<i class="icon-star-empty"></i>
								</div>  --}}
                                <!-- Product Single - Rating End -->

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Quantity & Cart Button
								============================================= -->
								<form method="POST" action="{{ route('cart.store') }}" class="cart nobottommargin clearfix"   enctype='multipart/form-data'>
                                    {{ csrf_field() }}
									<input type="hidden" id="product_id" name="product_id" value="">
									<div class="bottommargin-sm">
                                        <label for="">Style</label>
                                        <select name="attribute_style" class="attribute_style select-hide form-control bottommargin-sm" required="">
											<option value="">Choose an option</option>
											@foreach($styles as $item )
                                            <option value="{{ $item }}">{{ $item }}</option>
											@endforeach
                                        </select>
                                    </div>
                                    <div class="bottommargin-sm">
                                        <label for="">Color</label>
                                        <select name="attribute_color" class="attribute_color select-hide form-control bottommargin-sm" required="">
											<option value="">Choose an option</option>
                                            @foreach($colors as $item )
                                            <option value="{{ $item }}">{{ $item }}</option>
											@endforeach
                                        </select>
                                    </div>
                                    <div class="bottommargin-sm">
                                        <label for="">Size</label>
                                        <select name="attribute_size" class="attribute_size select-hide form-control bottommargin-sm" required="">
                                            <option value="">Choose an option</option>
                                            @foreach($sizes as $item )
                                            <option value="{{ $item }}">{{ $item }}</option>
											@endforeach
                                        </select>
                                    </div>
									<div class="bottommargin-sm">
										<div class="product-price">
											<ins id="primary-price"></ins>
										</div><!-- Product Single - Price End -->
									</div>
									<div class="line"></div>
									<div class="quantity clearfix">
										<input type="button" value="-" class="minus">
										<input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
										<input type="button" value="+" class="plus">
									</div>
									<button type="submit" class="add-to-cart button nomargin">Add to cart</button>
								</form><!-- Product Single - Quantity & Cart Button End -->

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Short Description
								============================================= -->
								{!! $product->description !!}
                                <!-- Product Single - Short Description End -->

								<!-- Product Single - Meta
								============================================= -->
								<div class="panel panel-default product-meta">
									<div class="panel-body">
										<span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
									</div>
								</div><!-- Product Single - Meta End -->

								<!-- Product Single - Share
								============================================= -->
								<div class="si-share noborder clearfix">
									<span>Share:</span>
									<div>
										<a href="#" class="social-icon si-borderless si-facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-pinterest">
											<i class="icon-pinterest"></i>
											<i class="icon-pinterest"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-gplus">
											<i class="icon-gplus"></i>
											<i class="icon-gplus"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-rss">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-email3">
											<i class="icon-email3"></i>
											<i class="icon-email3"></i>
										</a>
									</div>
								</div><!-- Product Single - Share End -->

							</div>

							<div class="col_one_fifth col_last">


								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-thumbs-up2"></i>
									</div>
									<h3>100% Original</h3>
									<p class="notopmargin">We guarantee you the sale of Original Brands.</p>
								</div>

								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-credit-cards"></i>
									</div>
									<h3>Payment Options</h3>
									<p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
								</div>

								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-truck2"></i>
									</div>
									<h3>Free Shipping</h3>
									<p class="notopmargin">Free Delivery to 100+ Locations on orders above $40.</p>
								</div>

								<div class="feature-box fbox-plain fbox-dark fbox-small">
									<div class="fbox-icon">
										<i class="icon-undo"></i>
									</div>
									<h3>30-Days Returns</h3>
									<p class="notopmargin">Return or exchange items purchased within 30 days.</p>
								</div>

								<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

							</div>

							<div class="col_full nobottommargin">

								<div class="tabs clearfix nobottommargin" id="tab-1">

									<ul class="tab-nav clearfix">
										<li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="hidden-xs"> Description</span></a></li>
										<li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Additional Information</span></a></li>
									</ul>

									<div class="tab-container">

										<div class="tab-content clearfix" id="tabs-1">
											{!! $product->description !!}
										</div>
										<div class="tab-content clearfix" id="tabs-2">

											<table class="table table-striped table-bordered">
												<tbody>
													<tr>
														<td>Size</td>
														<td>Small, Medium &amp; Large</td>
													</tr>
													<tr>
														<td>Color</td>
														<td>Pink &amp; White</td>
													</tr>
													<tr>
														<td>Waist</td>
														<td>26 cm</td>
													</tr>
													<tr>
														<td>Length</td>
														<td>40 cm</td>
													</tr>
													<tr>
														<td>Chest</td>
														<td>33 inches</td>
													</tr>
													<tr>
														<td>Fabric</td>
														<td>Cotton, Silk &amp; Synthetic</td>
													</tr>
													<tr>
														<td>Warranty</td>
														<td>3 Months</td>
													</tr>
												</tbody>
											</table>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="clear"></div><div class="line"></div>

					<div class="col_full nobottommargin">

						<h4>Related Products</h4>

						<div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

							<div class="oc-item">
								<div class="product iproduct clearfix">
									<div class="product-image">
										<a href="#"><img src="{{ frontend_asset('images/shop/dress/1.jpg') }}" alt="Checked Short Dress"></a>
										<a href="#"><img src="{{ frontend_asset('images/shop/dress/1-1.jpg') }}" alt="Checked Short Dress"></a>
										<div class="sale-flash">50% Off*</div>
										<div class="product-overlay">
											<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
											<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
										</div>
									</div>
									<div class="product-desc center">
										<div class="product-title"><h3><a href="#">Checked Short Dress</a></h3></div>
										<div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="oc-item">
								<div class="product iproduct clearfix">
									<div class="product-image">
										<a href="#"><img src="{{ frontend_asset('images/shop/pants/1-1.jpg') }}" alt="Slim Fit Chinos"></a>
										<a href="#"><img src="{{ frontend_asset('images/shop/pants/1.jpg') }}" alt="Slim Fit Chinos"></a>
										<div class="product-overlay">
											<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
											<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
										</div>
									</div>
									<div class="product-desc center">
										<div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
										<div class="product-price">$39.99</div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="oc-item">
								<div class="product iproduct clearfix">
									<div class="product-image">
										<a href="#"><img src="{{ frontend_asset('images/shop/shoes/1-1.jpg') }}" alt="Dark Brown Boots"></a>
										<a href="#"><img src="{{ frontend_asset('images/shop/shoes/1.jpg') }}" alt="Dark Brown Boots"></a>
										<div class="product-overlay">
											<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
											<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
										</div>
									</div>
									<div class="product-desc center">
										<div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
										<div class="product-price">$49</div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="oc-item">
								<div class="product iproduct clearfix">
									<div class="product-image">
										<a href="#"><img src="{{ frontend_asset('images/shop/dress/2.jpg') }}" alt="Light Blue Denim Dress"></a>
										<a href="#"><img src="{{ frontend_asset('images/shop/dress/2-2.jpg') }}" alt="Light Blue Denim Dress"></a>
										<div class="product-overlay">
											<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
											<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
										</div>
									</div>
									<div class="product-desc center">
										<div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
										<div class="product-price">$19.95</div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="oc-item">
								<div class="product iproduct clearfix">
									<div class="product-image">
										<a href="#"><img src="{{ frontend_asset('images/shop/sunglasses/1.jpg') }}" alt="Unisex Sunglasses"></a>
										<a href="#"><img src="{{ frontend_asset('images/shop/sunglasses/1-1.jpg') }}" alt="Unisex Sunglasses"></a>
										<div class="sale-flash">Sale!</div>
										<div class="product-overlay">
											<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
											<a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
										</div>
									</div>
									<div class="product-desc center">
										<div class="product-title"><h3><a href="#">Unisex Sunglasses</a></h3></div>
										<div class="product-price"><del>$19.99</del> <ins>$11.99</ins></div>
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-empty"></i>
											<i class="icon-star-empty"></i>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->
@stop