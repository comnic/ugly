<script src="/static/js/content.class.js"></script>
<script src="/static/js/movie_list.js"></script>

<div id="mainTop" class="container">
	<div id="mainTopLeft" class="col-md-2">
    	<div id="mainTopLeftMenu" class="panel panel-default">
    		<div class="panel-body">
	        	<ul>
	            	<li><a href="#">추천동영상</a></li>
	            </ul>
			</div>
        </div>
        <div id="mainTopLeftChannel" class="panel panel-default">
        	<div class="panel-body">
	        	<ul id="channelList">
	            	<li><a href="#"><h5><span class="glyphicon glyphicon-facetime-video"></span> 트루미쇼 <span class="badge">1</span></h5></a></li>
	            	<li><a href="#"><h5><span class="glyphicon glyphicon-facetime-video"></span> 홍스 광뷰티 </h5></a></li>
	            	<li><a href="#"><h5><span class="glyphicon glyphicon-facetime-video"></span> 언니네 핫 초이스 </h5></a></li>
	            </ul>
			</div>
        </div>
    </div>
    <div id="mainTopCenter" class="col-md-7">
    	<div id="mainBanner">
        
            <div id="mainBannerCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#mainBannerCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mainBannerCarousel" data-slide-to="1"></li>
                <li data-target="#mainBannerCarousel" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="/static/images/main_banner_01.jpg" width="100%" alt="메인배너 1">
                </div>
                <div class="item">
                  <img src="/static/images/main_banner_02.jpg" width="100%" alt="메인배너 2">
                </div>
                <div class="item">
                  <img src="/static/images/main_banner_03.jpg" width="100%" alt="메인배너 3">
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#mainBannerCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">&lt;</span>
              </a>
              <a class="right carousel-control" href="#mainBannerCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">&gt;</span>
              </a>
            </div>
        
        
        </div>
    </div>
    <div id="mainTopRight" class="col-md-3 panel panel-default">
    	<div class="panel-body">
        	<img src="../../static/images/title_best.png">
        	<img src="../../static/images/line_best.png">
    		<ul id="ranking">
            	<li><a href="#"><h5><span class="badge">1</span> &nbsp;&nbsp;혼자서도 잘해요!<span class="label label-danger">New</span></h5></a></li>
            	<li><a href="#"><h5><span class="badge">2</span> &nbsp;&nbsp;트루미쇼 제 1화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">3</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">4</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">5</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">6</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">7</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">8</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">9</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
               	<li><a href="#"><h5><span class="badge">10</span> &nbsp;&nbsp;트루미쇼 제 3화</h5></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="mainList" class="container">

	<div id="movieListWrap">
    	<ul id="movieList">

        </ul>
    </div>
    <div id="btnMore" class="col-md-12 text-center">
    	<button id="btnMoreContentList" type="button" class="col-md-12 btn btn-default">More...</button>
	</div>
</div>
<div></div>





<!-- Modal Movie View -->
<div id="modalMovieView" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Movie View</h4>
      	</div>   
      	
		<div id="movieContent" class="modal-body">
			<div class="col-md-9">
				<div id="moviePlayer">

<!-- 16:9 aspect ratio -->
<div id="youtubePlayer" class="embed-responsive embed-responsive-16by9 thumbnail">
  
</div>

<!-- 4:3 aspect ratio -->
<!-- div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wcoXcQDWvLQ?list=PLsqLZbGHLTqNosOF3FDRKVe3RH36W0dtz"></iframe>
</div-->				
				</div>
				<div id="movieInfo">
					<p><h2 id="movieTitle">Title</h2></p>
					<p><h4 id="movieSummary">subTitle</h4></p>
					<p><h6 id="movieDesc">desc</h6></p>
				</div>
			</div>
			<div id="relationList" class="col-md-3 panel panel-default" style="background-color: rgb(241,241,241);">
				<h4 id="relationTitle" class="ml10">BEAUTY STATION</h4>
				
				<ul id="relationContentList">
				</ul>
			
			</div>
		</div>
      	   
    </div>
  </div>
</div>
<!-- Modal Movie View end -->
