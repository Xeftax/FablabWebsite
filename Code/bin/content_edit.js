var edit = document.getElementById('item_title');

var text

//edit.innerHTML = sessionStorage.getItem('item_title')

edit.addEventListener('blur', function(){
    text = this.innerHTML
});