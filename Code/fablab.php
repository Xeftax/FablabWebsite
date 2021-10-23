<!DOCTYPE html>
<html lang="fr">    
    <head>
        <meta charset="UTF-8" />

        <link rel="stylesheet" href="main.css" />
        <link rel="stylesheet" href="Header/page_title.css" />
        <link rel="stylesheet" href="Header/state_view.css" />
        <link rel="stylesheet" href="Header/demand_view.css" />
        <link rel="stylesheet" href="Header/line.css" />
        <link rel="stylesheet" href="Header/subtitle.css" />
        <link rel="stylesheet" href="Header/contact.css" />
        <link rel="stylesheet" href="ItemBox/backgroung.css" />
        <link rel="stylesheet" href="ItemBox/picture.css" />
        <link rel="stylesheet" href="ItemBox/state.css" />
        <link rel="stylesheet" href="ItemBox/add.css" />
        <link rel="stylesheet" href="ItemPopup/ItemDescription.css" />

        <script src="scripts/afficher_div.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="scripts/change_img.js"></script>

        <title>Fablab</title>
    </head>
    <body>

        <!-- Page Title -->
        <p class="PageTitle">FABLAB</p>

        <!-- State View -->
        <div class="FablabStateDiv">
            <img src="Header/icon_close.png"
                alt="Fablab state close icon."
                srcset="Header/icon_close.svg">
            <p>Fermé</p>
        </div>

        <!-- Open Demand View -->
        <div class="OpenDemandDiv">
            <img src="Header/icon_demand.png"
                alt="Fablab open demand icon."
                srcset="Header/icon_demand.svg">
            <p>Faire une demande d'ouverture</p>
        </div> 

        <!-- Header subtitle -->
        <p class="HeaderSubtitle">Parc Machines</p>

        <!-- Header Line -->
        <div class="HeaderLine"></div>

        <!-- Contact Button -->
        <div class="ContactDiv">
            <img id="Header/contact_logo" type="button" 
            src="Header/contact_logo.png" 
            srcset="Header/contact_logo.svg"
            onclick="afficher_div('bloc','blocadmin');"/>
        </div>
        <div id="none" style="display:none"></div>
        <div id="bloc" class="ContactBloc" style="display:none">
            <a href="https://www.fablabclunisois.fr/agenda/" target="_blank">
                <div class="ContactBoutonA">
                    <p>Agenda</p>
                </div>
            </a>

            <?php
            if ($connexion){
            echo '<div class="ContactAdd">';
            echo '<img src="Header/add_contact.png" srcset="Header/add_contact.svg"/>';
            echo '</div>';
            }?>

            <div class="ContactAdmin" type="button" onclick="afficher_div('blocadmin','none');afficher_div('none','bloc');">
                <p>Admin</p>
                <div class="ContactAdminImg"></div>
            </div>
        </div>

        <!-- Connexion view -->
        <div id="blocadmin" class="AdminBloc" style="display:none">
            <p>Admin</p>
            <div class="AdminLine"></div>
            <div class="AdminPassword">
                <form action="auth.php" method="post">
                    <label for="pass">Mot de passe</label>
                    <input type="password" name="pass">
                    <button type="submit">
                        <img src="Header/arrow_pass.svg"/>
                    </button>
                </form>
            </div>
        </div>

        <style>
            .grid {
                display: grid;
                position: absolute;
                width: 96vw;
                top: 84px;
                left: 0px;
                padding: 2vw;
                grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
                grid-gap: 2vw;
                /*grid-auto-rows: minmax(auto, auto);*/l
            }
        </style>

        <div  id='item_grid' class="grid">

        <!-- Item Boxes -->
        <?php include 'itembox.php'?>
        <script type="text/javascript" src="scripts/prop_font.js"></script>

        <!-- Add Itembox button -->
        <?php
        if ($connexion){
        echo '<div class="AddItemBackground">';
        echo '<img src="ItemBox/add_logo.png" alt="Fablab machine add icon." srcset="ItemBox/add_logo.svg"/>';
        echo '</div>';
        }?>

        </div>

        <!-- Item Description -->
        <div class="ItemDescription">
            <p class="ItemDescriptionTitle">Titre machine</p>
            <div class="ItemDescriptionLine"></div>
            <p class="ItemDescriptionText">Permet la découpe de formes dans de fines feuilles autocollantes plastifiées.<br/>
            </br>Utilisé pour découper des stickers ou de la matière pour flocker du tissu.</p>
            <a>en savoir +</a>
            <img src="ItemPictures/empty_image.png"/>
        </div>
        
    </body>
</html>