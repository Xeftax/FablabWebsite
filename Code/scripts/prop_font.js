window.addEventListener('resize', function(event) {
    for (id = 0; id<1; id++){
        console.log('div : ', document.getElementById('item_background_'+id).clientHeight,'text : ',document.getElementById('item_title_'+id).style.fontSize)
        document.getElementById('item_title_'+id).style.fontSize = document.getElementById('item_background_'+id).clientHeight * 0.5;
        //console.log(document.getElementById('item_title_'+id).clientHeight)
    }
}, true);