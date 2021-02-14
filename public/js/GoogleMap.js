function initMap() {

    var addresses = addr;
    var latlng = []; //緯度経度の値をセット
    var marker = []; //マーカーの位置情報をセット
    var infoWindow = []; //情報をセット
    var center = {
        lat: 34.6647390624823, // 緯度
        lng: 133.92104979398175 // 経度
    };
    var map = new google.maps.Map(document.getElementById('map'));//地図を作成する

    geo(aftergeo);

    function geo(callback) {
        var cRef = addresses.length;
        for (var i = 0; i < addresses.length; i++) {

            latlng[i] = new google.maps.LatLng({
                lat: addresses[i]['lat'],
                lng: addresses[i]['lng']
            }); // 緯度経度のデータ作成// マーカーを立てる位置をセット

            marker[i] = new google.maps.Marker({
                position: latlng[i], // マーカーを立てる位置を指定
                map: map, // マーカーを立てる地図を指定
            });

            infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                content: "<div class='sample'>" +'<a href=\"../shops/' + addresses[i]['id'] + '\">' + addresses[i]['name'] + '</a><p>' + addresses[i]['about'] +'</p></div>',
                // 吹き出しに表示する内容
            });

            markerEvent(i);

            if (--cRef <= 0) {
                callback();//全て取得できたらaftergeo実行
            }
        }//for文の終了
    }//function geo終了

    function aftergeo() {
        var opt = {
            center: center, // 地図の中心を指定
            zoom: 15 // 地図のズームを指定
        };//地図作成のオプションのうちcenterとzoomは必須
        map.setOptions(opt);//オプションをmapにセット
    }//function aftergeo終了

    function markerEvent(i) {
        marker[i].addListener('click', function () {
            infoWindow[i].open(map, marker[i])
        });
    }
}//function initMap終了

window.onload = function () {
    initMap();
};
