<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Priorité</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <?php 
    session_start();
    include 'includes/config_settings.php';
    include 'includes/functions/global_functions.php';
    include 'includes/permissions.php';
    
    // Générer un nom anonyme pour l'utilisateur s'il n'en a pas déjà un
    if (!isset($_SESSION['anonymous_name'])) {
        $randomId = rand(1000, 9999);
        $_SESSION['anonymous_name'] = "Anonyme_$randomId";
    }
    
    // Vérification de l'intégrité des fichiers au chargement de la page
    $integrityResults = verifyAssetsIntegrity();
    displayIntegrityError($integrityResults);
    ?>
    
    <?php include 'includes/header.php'; ?>
    
    <main>
        <h1>Bienvenue sur Family Priorité</h1>
        <p>Ceci est la page d'accueil de notre projet.</p>
        <?php if (isset($_SESSION['admin_id']) && $_SESSION['is_admin']): ?>
            <p><a href="includes/admin/admin_controls.php" style="color: #007bff; text-decoration: none;">Accéder au Panel d'Administration</a></p>
        <?php endif; ?>
        <p>Votre nom anonyme : <strong><?php echo htmlspecialchars($_SESSION['anonymous_name']); ?></strong></p>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    
    <!-- Bouton pour ouvrir le chat -->
    <div class="chat-toggle">Chat</div>
    
    <!-- Conteneur du chat -->
    <div class="chat-container">
        <div class="chat-header">
            <h3>Chat en direct</h3>
            <span class="chat-close">&times;</span>
        </div>
        <div class="chat-tabs">
            <!-- Les onglets seront générés dynamiquement par JS -->
        </div>
        <div class="chat-content">
            <div class="chat-sidebar">
                <!-- La liste des anonymes et assistants sera générée par JS -->
            </div>
            <div class="chat-main">
                <div class="chat-messages">
                    <!-- Les messages seront ajoutés dynamiquement ici -->
                </div>
                <div class="chat-input">
                    <input type="text" placeholder="Tapez votre message...">
                    <button>Envoyer</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Passer le nom anonyme de l'utilisateur au JavaScript
        const currentUserName = "<?php echo htmlspecialchars($_SESSION['anonymous_name']); ?>";
    </script>
    <script src="static/js/script.js"></script>
</body>
</html>