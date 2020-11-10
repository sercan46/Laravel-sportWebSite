<div class="breakingnews-wrapper hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
				<div class="breakingnews clearfix fix">
					<div class="bn-title">
						<h6 class="uppercase">Yeni İçerikler</h6>
					</div>
					<div class="news-wrap">
						<ul class="bkn clearfix" id="bkn">


							@foreach($yeniler as $yeni)

							<li><a href="/yazi/{{$yeni->id}}/{{$yeni->slug}}">{{$yeni->baslik}}</a></li>
							@endforeach


						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>