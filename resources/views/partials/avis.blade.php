<?php 
$avis = [];
$avis[] = ["Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident optio qui praesentium atque consequuntur molestias aliquam. Aliquam est deleniti molestias aperiam dolorem, obcaecati inventore, officiis quia itaque aut ut, sunt!", "Feten Chaib",''];
$avis[] = ["Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis corrupti, ut, reprehenderit doloremque rerum ad sit, beatae itaque magni ipsum optio. Voluptas, unde, vitae! Totam maiores laudantium, recusandae quas sunt.", "Aroua Hdhili",'active'];
$avis[] = ["Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aspernatur repellat adipisci dolor, quia iste laboriosam, ratione pariatur, architecto cumque vero earum. Quia autem illo reprehenderit quidem necessitatibus quas, enim.", "Riadh Robbana",''];


?>
<div class="avis-section">
	<div class="overlay">
		<div class="container">
			<div class="row ">
				<div class="col-lg-12 col-md-12 ">
					<div id="testimonials" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#testimonials" data-slide-to="0"></li>
							<li data-target="#testimonials" data-slide-to="1"></li>
							<li data-target="#testimonials" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
						@foreach ($avis as $item)
							<div class="item {{ $item[2] }}">
								<div class="container center">
									<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
										<h4><i class="fa fa-quote-left"></i>{{ $item[0] }}<i class="fa fa-quote-right"></i></h4>
										<div class="user-img pull-right">
											<!-- <img src="assets/img/user2.png" alt="" class="img-circle image-responsive"> -->
										</div>
										<h5 class="pull-right"><strong class="c-black">{{ $item[1] }}</strong></h5>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>