async function changeTitle(){

    let sData = await fetch('api_overwrite_data.php', {
        method : "POST",
        body : new Title(document.getElementById(item_title))
    })

    jData = await sData.json()
    console.log(jData)

    var edit = document.getElementById('item_title')

    edit.innerHTML=jData.title

    edit.addEventListener('blur', function(){
        sessionStorage.setItem('item_title', this.innerHTML);
    });
}

async function getValue(){
    let sData = await fetch('api_get_value.php')
    ajData = await sData.json()
}
getValue()