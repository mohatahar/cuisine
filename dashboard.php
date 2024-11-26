<?php 
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupération des informations de l'utilisateur
$username = $_SESSION['username'];

// Déconnexion de l'utilisateur
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion de Stock</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles de base */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .dashboard-container {
            width: 100%;
            max-width: 1000px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .dashboard-header {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .welcome-message {
            font-size: 1.25rem;
            color: #666;
            margin-bottom: 2rem;
        }

        /* Section des cartes d'information */
        .cards {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .card {
            background: #10b981;
            color: white;
            padding: 1.5rem;
            border-radius: 0.75rem;
            flex: 1;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .card i {
            font-size: 2rem;
            margin-bottom: 0.75rem;
        }

        .card .title {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card .value {
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Bouton de déconnexion */
        .logout-btn {
            background-color: #ef4444;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 2rem;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        /* Styles mobiles */
        @media (max-width: 768px) {
            .cards {
                flex-direction: column;
                gap: 1rem;
            }

            .dashboard-container {
                padding: 1rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <i class="fas fa-tachometer-alt"></i> Tableau de bord
        </div>

        <div class="welcome-message">
            Bienvenue, <?php echo htmlspecialchars($username); ?> !<br>
            Vous êtes maintenant connecté à votre espace de gestion de stock.
        </div>

        <!-- Cartes d'information -->
        <div class="cards">
            <div class="card">
                <i class="fas fa-box"></i>
                <div class="title">Produits en stock</div>
                <div class="value">350</div>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <div class="title">Utilisateurs actifs</div>
                <div class="value">42</div>
            </div>
            <div class="card">
                <i class="fas fa-chart-line"></i>
                <div class="title">Ventes du mois</div>
                <div class="value">€5,200</div>
            </div>
        </div>

        <!-- Bouton de déconnexion -->
        <a href="?logout=true">
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </a>
    </div>
</body>
</html>
