ol.proj.proj4.register(proj4);
ol.proj.get("EPSG:32651").setExtent([338017.295778, 1834529.941474, 426393.607501, 1890883.928694]);
var wms_layers = [];

        var lyr_WorldImagery_1 = new ol.layer.Tile({
            'title': 'World Imagery',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
        attributions: ' ',
                url: 'http://server.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
            })
        });
        var lyr_WorldTopo_0 = new ol.layer.Tile({
            'title': 'World Topo',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'http://services.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
            })
        });

        

        var lyr_OpenStreetMapHOT_2 = new ol.layer.Tile({
            'title': 'OpenStreetMap.HOT',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'https://tile.openstreetmap.fr/hot/{z}/{x}/{y}.png'
            })
        });

        var lyr_OpenStreetMap_3 = new ol.layer.Tile({
            'title': 'OpenStreetMap',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png'
            })
        });
var format_Cauayan_City_4 = new ol.format.GeoJSON();
var features_Cauayan_City_4 = format_Cauayan_City_4.readFeatures(json_Cauayan_City_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32651'});
var jsonSource_Cauayan_City_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Cauayan_City_4.addFeatures(features_Cauayan_City_4);
var lyr_Cauayan_City_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_Cauayan_City_4, 
                style: style_Cauayan_City_4,
                popuplayertitle: "Cauayan_City",
                interactive: true,
                title: '<img src="../assets/qml/5yrrh/styles/legend/Cauayan_City_4.png" /> Cauayan_City'
            });
// 100yrrr---------------

var format_CauayanFH100YRRRP_4 = new ol.format.GeoJSON();
var features_CauayanFH100YRRRP_4 = format_CauayanFH100YRRRP_4.readFeatures(json_CauayanFH100YRRRP_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32651'});
var jsonSource_CauayanFH100YRRRP_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_CauayanFH100YRRRP_4.addFeatures(features_CauayanFH100YRRRP_4);
var lyr_CauayanFH100YRRRP_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_CauayanFH100YRRRP_4, 
                style: style_CauayanFH100YRRRP_4,
                popuplayertitle: "Cauayan FH 100YR RRP",
                interactive: true,
    title: 'Cauayan FH 100YR RRP<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_0.png" /> Low Hazard (0.1m-0.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_1.png" /> Medium Hazard (0.5m-1.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_2.png" /> High Hazard (beyond 1.5m)<br />'
        });

        // var group_CauayanFH100YRRRP = new ol.layer.Group({
        //     layers: [lyr_CauayanFH100YRRRP_4,],
        //     title: "Cauayan FH 100YR RRP"});









// 25yrrr---------------
var format_CauayanFH25YRRRP_4 = new ol.format.GeoJSON();
var features_CauayanFH25YRRRP_4 = format_CauayanFH25YRRRP_4.readFeatures(json_CauayanFH25YRRRP_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32651'});
var jsonSource_CauayanFH25YRRRP_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_CauayanFH25YRRRP_4.addFeatures(features_CauayanFH25YRRRP_4);
var lyr_CauayanFH25YRRRP_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_CauayanFH25YRRRP_4, 
                style: style_CauayanFH25YRRRP_4,
                popuplayertitle: "Cauayan FH 25YR RRP",
                interactive: true,
    title: 'Cauayan FH 25YR RRP<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_0.png" /> Low Hazard (0.1m-0.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_1.png" /> Medium Hazard (0.5m-1.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_2.png" /> High Hazard (beyond 1.5m)<br />'
        });
// var group_CauayanFH25YRRRP = new ol.layer.Group({
//             layers: [lyr_CauayanFH25YRRRP_4,],
//             title: "Cauayan FH 25YR RRP"});














// 5yrr----
var format_CauayanFH5YRRRP_5 = new ol.format.GeoJSON();
var features_CauayanFH5YRRRP_5 = format_CauayanFH5YRRRP_5.readFeatures(json_CauayanFH5YRRRP_5, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32651'});
var jsonSource_CauayanFH5YRRRP_5 = new ol.source.Vector({
    attributions: ' ',
});


jsonSource_CauayanFH5YRRRP_5.addFeatures(features_CauayanFH5YRRRP_5);

var lyr_CauayanFH5YRRRP_5 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_CauayanFH5YRRRP_5, 
                style: style_CauayanFH5YRRRP_5,
                popuplayertitle: "Cauayan FH 5YR RRP",
                interactive: true,
    title: 'Cauayan FH 5YR RRP<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_0.png" /> Low Hazard (0.1m-0.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_1.png" /> Medium Hazard (0.5m-1.5m)<br />\
    <img src="../assets/qml/5yrrh/styles/legend/CauayanFH5YRRRP_5_2.png" /> High Hazard (beyond 1.5m)<br />'
        });
var group_OtherLayers = new ol.layer.Group({
                                layers: [lyr_Cauayan_City_4,],
                                title: "Other Layers"});
var group_Worldx1f5fa = new ol.layer.Group({
                                layers: [lyr_WorldTopo_0,lyr_WorldImagery_1,lyr_OpenStreetMapHOT_2,lyr_OpenStreetMap_3,],
                                title: "World &#x1f5fa"});

lyr_Cauayan_City_4.setVisible(true);
lyr_WorldTopo_0.setVisible(false);
lyr_WorldImagery_1.setVisible(true);
lyr_OpenStreetMapHOT_2.setVisible(false);
lyr_OpenStreetMap_3.setVisible(false);
var id = $('#hiddenId').val();
// alert(id);
// 5yr/-------------------------------
if(id == '5yr'){
    lyr_CauayanFH5YRRRP_5.setVisible(true);
    var layersList = [
        group_Worldx1f5fa,
        lyr_CauayanFH5YRRRP_5,
        group_OtherLayers
    
    ];
//     lyr_Cauayan_City_4.set('fieldAliases', {'Name': 'Name', 'description': 'description', 'timestamp': 'timestamp', 'begin': 'begin', 'end': 'end', 'altitudeMode': 'altitudeMode', 'tessellate': 'tessellate', 'extrude': 'extrude', 'visibility': 'visibility', 'drawOrder': 'drawOrder', 'icon': 'icon', 'Brgy_Name': 'Brgy_Name', 'Area': 'Area', });
//     lyr_CauayanFH5YRRRP_5.set('fieldAliases', {'Var': 'Var', 'Muncode': 'Muncode', });
//     lyr_Cauayan_City_4.set('fieldImages', {'Name': 'TextEdit', 'description': 'TextEdit', 'timestamp': 'DateTime', 'begin': 'DateTime', 'end': 'DateTime', 'altitudeMode': 'TextEdit', 'tessellate': 'Range', 'extrude': 'Range', 'visibility': 'Range', 'drawOrder': 'Range', 'icon': 'TextEdit', 'Brgy_Name': 'TextEdit', 'Area': 'TextEdit', });
//     lyr_CauayanFH5YRRRP_5.set('fieldImages', {'Var': 'Range', 'Muncode': 'TextEdit', });
//     lyr_Cauayan_City_4.set('fieldLabels', {});
//     lyr_CauayanFH5YRRRP_5.set('fieldLabels', {'Var': 'no label', 'Muncode': 'no label', });
//     lyr_CauayanFH5YRRRP_5.on('precompose', function(evt) {
//         evt.context.globalCompositeOperation = 'normal';
// });

}
else if(id == '25yr'){
    lyr_CauayanFH25YRRRP_4.setVisible(true);
    var layersList = [
        group_Worldx1f5fa,
        lyr_CauayanFH25YRRRP_4,
        group_OtherLayers
    ];

}
else if (id == '100yr') {
    lyr_CauayanFH100YRRRP_4.setVisible(true);
    var layersList = [
        group_Worldx1f5fa,
        lyr_CauayanFH100YRRRP_4,
        group_OtherLayers
    ];

    
}
else{
    var layersList = [
        group_Worldx1f5fa,
        group_OtherLayers
    
    ];

}



