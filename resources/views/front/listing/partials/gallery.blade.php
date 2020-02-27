<div class="tabcontent" id="gallery">
    <div class="row">
        @foreach($listing->galleries as $key => $gallery)
            <div class="column">
                <button style="width:100%; min-height: 200px; background-image: url('{{ $gallery->get_image() }}'); background-size: cover"
                        onclick="openModal();currentSlide({{ $key+1 }})" class="hover-shadow cursor"> </button>
            </div>
        @endforeach
    </div>

    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            @foreach($listing->galleries as $key => $gallery)
                <div class="mySlides">
                    <div class="numbertext">{{ $key+1 }} / {{ count($listing->galleries) }}</div>
                    <img src="{{ $gallery->get_image() }}" style="width:100%">
                </div>
            @endforeach

            <a class="prev" onclick="plusSldides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            @foreach($listing->galleries as $key => $gallery)

                <div class="column">
                    <button class="demo cursor"
                            style="width:100%; min-height: 200px; background-image: url('{{ $gallery->get_image() }}'); background-size: cover" onclick="currentSlide({{ $key+1 }})" ></button>
                </div>

            @endforeach

        </div>
    </div>
</div>