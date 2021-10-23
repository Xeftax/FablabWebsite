function afficher_div(id1,id2) {
    if (document.getElementById(id2).style.display == 'block')
  {
       document.getElementById(id1).style.display = 'none';
       document.getElementById(id2).style.display = 'none';
  }
  else
  {
          if (document.getElementById(id1).style.display == 'none')
     {
          document.getElementById(id1).style.display = 'block';
     }
     else
     {
          document.getElementById(id1).style.display = 'none';
     }
     }
}