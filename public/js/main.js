$(window).load(function () {
    $(".imageReveal").imageReveal({
        barWidth: 45,
        touchBarWidth: 40,
        paddingLeft: 0,
        paddingRight: 0,
        showCaption: true,
        startPosition: 0.5,
        captionChange: 0.5,
        width: 250,
        height: 250,
    });

    $(".imageRevealBig").imageReveal({
        barWidth: 45,
        // touchBarWidth: 40,
        // paddingLeft: 0,
        // paddingRight: 0,
        // showCaption: true,
        startPosition: 0.55,
        // captionChange: 0.5,
        width: 400,
        height: 400,
    });

    // $("#example3, #example4").imageReveal({
    //     barWidth: 45,
    //     touchBarWidth: 40,
    //     paddingLeft: 0,
    //     paddingRight: 0,
    //     showCaption: true,
    //     startPosition: 0.5,
    //     captionChange: 0.5,
    //     width: 250,
    //     height: 250,
    // });
});

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function positionAndRotateReviews() {
    const reviews = document.querySelectorAll(".review");
    const rows = Math.ceil(Math.sqrt(reviews.length));
    const cols = rows;
    const cellWidth = window.innerWidth / cols;
    const cellHeight = window.innerHeight / rows;

    let positions = [];
    for (let row = 0; row < rows; row++) {
        for (let col = 0; col < cols; col++) {
            positions.push({x: col * cellWidth, y: row * cellHeight});
        }
    }

    reviews.forEach((review) => {
        if (positions.length > 0) {
            const randomIndex = getRandomInt(0, positions.length - 1);
            const pos = positions.splice(randomIndex, 1)[0];
            const randomRotation = getRandomInt(-15, 15);
            const offsetX = getRandomInt(0, cellWidth - review.offsetWidth);
            const offsetY = getRandomInt(0, cellHeight - review.offsetHeight);
            review.style.transform = `translate(${pos.x + offsetX}px, ${
                pos.y + offsetY
            }px) rotate(${randomRotation}deg)`;
        }
    });
}

window.addEventListener("load", positionAndRotateReviews);
window.addEventListener("resize", positionAndRotateReviews);

function initMap() {
    var lat = parseFloat($('#lat').val());
    var long = parseFloat($('#long').val());
    const mapOptions = {
        center: {lat: lat, lng: long},
        zoom: 14,
        styles: [
            {elementType: "geometry", stylers: [{color: "#212121"}]},
            {elementType: "labels.icon", stylers: [{visibility: "off"}]},
            {elementType: "labels.text.fill", stylers: [{color: "#757575"}]},
            {elementType: "labels.text.stroke", stylers: [{color: "#212121"}]},
            {
                featureType: "administrative",
                elementType: "geometry",
                stylers: [{color: "#757575"}],
            },
            {
                featureType: "administrative.country",
                elementType: "labels.text.fill",
                stylers: [{color: "#9e9e9e"}],
            },
            {
                featureType: "administrative.land_parcel",
                stylers: [{visibility: "off"}],
            },
            {
                featureType: "administrative.locality",
                elementType: "labels.text.fill",
                stylers: [{color: "#bdbdbd"}],
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{color: "#757575"}],
            },
            {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{color: "#181818"}],
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [{color: "#616161"}],
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.stroke",
                stylers: [{color: "#1b1b1b"}],
            },
            {
                featureType: "road",
                elementType: "geometry.fill",
                stylers: [{color: "#2c2c2c"}],
            },
            {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [{color: "#8a8a8a"}],
            },
            {
                featureType: "road.arterial",
                elementType: "geometry",
                stylers: [{color: "#373737"}],
            },
            {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [{color: "#3c3c3c"}],
            },
            {
                featureType: "road.highway.controlled_access",
                elementType: "geometry",
                stylers: [{color: "#4e4e4e"}],
            },
            {
                featureType: "road.local",
                elementType: "labels.text.fill",
                stylers: [{color: "#616161"}],
            },
            {
                featureType: "transit",
                elementType: "labels.text.fill",
                stylers: [{color: "#757575"}],
            },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{color: "#000000"}],
            },
            {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [{color: "#3d3d3d"}],
            },
        ],
    };

    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // Add a marker
    const marker = new google.maps.Marker({
        position: {lat: lat, lng: long},
        map: map,
        title: "Location Marker"
    });
}


