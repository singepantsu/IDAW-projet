<div class="services-modal modal fade" id="servicesModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- J'ai mit cette section pour rester symetrique-->
                                    <h2 class="text-uppercase">Our restaurant</h2>
                                    <p class="item-intro text-muted">Only Place to eat sainly, <b>the Crousty Poulet</b>.</p>
                                    <div id="map"></div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Map
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoibWVra2liIiwiYSI6ImNremFkbjIyazBnOHAydXMybW53ZXBtc3oifQ.Mfw9W8c4PBEod5AJEKaGzA';
            const map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [3.080602, 50.367874], // starting position [lng, lat]
                zoom: 9 // starting zoom
            });
            //create Marker with clickable features by changing the previous functions of Marker
            class ClickableMarker extends mapboxgl.Marker {
                //new Method
                onClick(handleClick) {
                    this._handleClick = handleClick;
                    return this;
                }
                //replace previous onMapClick
                _onMapClick(e) {
                    const targetElement = e.originalEvent.target;
                    const element = this._element;

                    if (this._handleClick && (targetElement === element || element.contains((targetElement)))) {
                        this._handleClick();
                    }
                }
            };
            //By making it clickable, long and lat changed, I don't know why
            new ClickableMarker({ color: 'blue', rotation: 45 })
                    .setLngLat([3.5906017099360117, 50.37194941576201])
                    .onClick(() => {
                        window.alert("Come to Crousty Poulet!!");
                    })
                    .addTo(map);
        </script>