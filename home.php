<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styles pour positionner les boutons en bas de la page */
        .bottom-buttons {
            position: fixed;
            bottom: 20px; /* Distance depuis le bas */
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 20px; /* Espace entre les boutons */
        }

        /* Ajouter un style pour les boutons */
        .bottom-buttons .btn {
            border: 3px solid #007bff; /* Cadre autour des boutons */
            padding: 10px 20px; /* Espacement interne des boutons */
            background-color: #ffffff; /* Fond blanc pour les boutons */
            color: #007bff; /* Couleur du texte */
            font-weight: bold;
            border-radius: 5px; /* Coins arrondis */
            transition: all 0.3s ease; /* Animation au survol */
        }

        /* Effet au survol du bouton */
        .bottom-buttons .btn:hover {
            background-color: #007bff; /* Fond bleu au survol */
            color: #ffffff; /* Texte blanc */
            box-shadow: 0px 4px 6px rgba(0, 123, 255, 0.6); /* Ombre au survol */
        }

        /* Styles pour les cadres */
        .frame {
            border: 2px solid#060000 ; /* Cadre bleu */
            border-radius: 10px; /* Coins arrondis */
            padding: 100px;
            background-color: #f9f9f9; /* Fond léger */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre subtile */
            text-align: center;
            height: 250px; /* Hauteur fixe pour chaque cadre */
        }

        .frame h3 {
            color: #16cdfb; /* Titre du cadre en bleu */
        }

        .frame .btn {
            border: 2px solid  #16cdfb;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #060000;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .frame .btn:hover {
            background-color: #16cdfb;
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 123, 255, 0.6);
        }

        /* Pour l'image dans le contenu principal */
        .main-image {
            width: 100%;
            max-width: 600px;
            display: block;
            margin: 20px auto;
        }
        .photo-container {
            display: flex;
            justify-content: center; /* Centre horizontalement les images */
            gap: 0px; /* Espace entre les images */
        }
        .photo-container img {
            width: 700px; /* Ajustez la taille des images */
            height: auto;
            border: 2px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    include("navbar2.php");
    ?>
        <!--ajout d'une image-->
        <div class="photo-container">
        <img src="data:image/jpeg;base64,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" alt="Photo 1">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWhWI3BqIXgwWBow2GdZ64iUOQeTF-eX4oUQ&s" alt="Photo 2">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwi4dxxN5kGviMxhySqql4KA_8OGvch1EHTw&s" alt="Photo 3">
    </div>

    <div class="bottom-buttons">
      <!-- Trois cadres sur la même ligne -->
      <div class="row">
            <div class="col-md-4">
                <div class="frame">
                    <h3>Admin</h3>
                    <p class="small-text">Espace Admin</p>
                    <button class="btn">Click Here</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="frame">
                    <h3>Encadrant</h3>
                    <p class="small-text">Espace Encadrant</p>
                    <button class="btn">Click Here</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="frame">
                    <h3>Etudiant</h3>
                    <p class="small-text">Espace Etudiant</p>
                    <button class="btn">Click Here</button>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>