function change_img(image) {
    const img=document.getElementById(image).srcset;
    img.replace('.svg','');
    if (img.includes('_active'))
    {
        img.replace('_active','');
        document.getElementById(image).srcset=img+'.svg';
    }
    else
    {
        document.getElementById(image).srcset=img+'_active.svg';
    }
}