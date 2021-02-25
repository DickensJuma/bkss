@extends('layouts.front.design')

@section('content')
<div class='container'>
    <div class="card">
        <div class="card-header">
            <h5>{{ $hotel->name }} <a href=""><i class="far fa-heart"></i></a>
                <a href=""><i class="fas fa-share-alt"></i></a>
            <a href="" class="btn btn-primary btn-md">Reserve</a></h5>
            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="This star rating is provided to Book sasa by the property and is usually determined by an official hotel rating organization or another third party.">
                @for ($star =0 ; $star < $hotel->rating ; $star++)
                &#9734;
                @endfor
            </span>
            <i class="fas fa-thumbs-up text-warning" data-toggle="tooltip" data-placement="left" title="This is a Preferred Partner property. It's committed to giving guests positive experiences with its excellent service and great value. This property might pay Book sasa a little more to be in this Program"></i>
            <i class="fas fa-map-pin" data-toggle="tooltip" data-placement="left" title="After booking, all of the property’s details, including telephone and address, are sent to you as part of your booking confirmation and your account." >{{ $hotel->address2 }}</i>
        </div>
        <div class="card-body">
                <div class="gallery" style="margin-top: 100px;">
                    <div class="container">
                            @foreach ($images as $image)     
                                <div class="gallery-item" style="margin-bottom: 30px;">
                                    <a href="" class="link-gallery" data-toggle="modal" data-target="#modalGallery">
                                        <img src="{{ asset('uploads/property/small/'.$image->path) }}" alt=""></a>
                                </div>
                            @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="modalGalleryLabel">Gallery</h4>
                    </div> <!-- /.modal-header -->
    
                    <div class="modal-body">
                        <div id="carouselGallery" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                            </div> <!-- /.carousel-inner -->
                        </div> <!-- /.carousel -->
                    </div> <!-- /.modal-body -->
    
                    <div class="modal-footer" style="text-align:center;">
                        <ul class="pagination" style="margin: 0;">
                        </ul>
                    </div> <!-- /.modal-footer -->
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
    </div>

<?php echo $hotel_data; ?>
    </div>
    <script>
        $(document).ready(function(){
    $('.link-gallery').click(function(){
		var galleryId = $(this).attr('data-target');
		var currentLinkIndex = $(this).index('a[data-target="'+ galleryId +'"]');

		createGallery(galleryId, currentLinkIndex);
		createPagination(galleryId, currentLinkIndex);

		$(galleryId).on('hidden.bs.modal', function (){
			destroyGallry(galleryId);
			destroyPagination(galleryId);
		});

		$(galleryId +' .carousel').on('slid.bs.carousel', function (){
			var currentSlide = $(galleryId +' .carousel .item.active');
			var currentSlideIndex = currentSlide.index(galleryId +' .carousel .item');

			setTitle(galleryId, currentSlideIndex);
			setPagination(++currentSlideIndex, true);
		})
	});

	function createGallery(galleryId, currentSlideIndex){
		var galleryBox = $(galleryId + ' .carousel-inner');

		$('a[data-target="'+ galleryId +'"]').each(function(){
			var img = $(this).html();
			var galleryItem = $('<div class="item">'+ img +'</div>');

			galleryItem.appendTo(galleryBox);
		});

		galleryBox.children('.item').eq(currentSlideIndex).addClass('active');
		setTitle(galleryId, currentSlideIndex);
	}

	function destroyGallry(galleryId){
		$(galleryId + ' .carousel-inner').html("");
	}

	function createPagination(galleryId, currentSlideIndex){
		var pagination = $(galleryId + ' .pagination');
		var carouselId = $(galleryId).find('.carousel').attr('id');
		var prevLink = $('<li><a href="#'+ carouselId +'" data-slide="prev">«</a></li>');
		var nextLink = $('<li><a href="#'+ carouselId +'" data-slide="next">»</a></li>');

		prevLink.appendTo(pagination);
		nextLink.appendTo(pagination);

		$('a[data-target="'+ galleryId +'"]').each(function(){
			var linkIndex = $(this).index('a[data-target="'+ galleryId +'"]');
			var paginationLink = $('<li><a data-target="#carouselGallery" data-slide-to="'+ linkIndex +'">'+ (linkIndex+1) +'</a></li>');

			paginationLink.insertBefore('.pagination li:last-child');
		});

		setPagination(++currentSlideIndex);
	}

	function setPagination(currentSlideIndex, reset = false){
		if (reset){
			$('.pagination li').removeClass('active');
		}

		$('.pagination li').eq(currentSlideIndex).addClass('active');
	}

	function destroyPagination(galleryId){
		$(galleryId + ' .pagination').html("");
	}

	function setTitle(galleryId, currentSlideIndex){
		var imgAlt = $(galleryId + ' .item').eq(currentSlideIndex).find('img').attr('alt');

		$('.modal-title').text(imgAlt);
	}
});
    </script>

@endsection