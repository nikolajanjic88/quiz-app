<?php include_once 'inc/gamehead.php'; ?>

<body class="profile-body">
<main class="profile-page">
    <div class="profile-container">

        <a href="/menu" class="profile-back">&larr; Back to Menu</a>

        <!-- Profile Header -->
        <header class="profile-header">
            <p class="profile-eyebrow">Middle-earth Archives</p>
            <h1>Player <span>Profile</span></h1>
            <p class="profile-subtitle">
                Your journey through the legends of Middle-earth.
            </p>
        </header>

        <!-- Profile Information -->
        <?php include 'components/profile-information.php'; ?>
        
        <!-- Edit Profile Accordion -->
        <?php include 'components/profile-edit.php'; ?>

    
        <!-- Change Password Accordion -->
        <?php include 'components/profile-password.php'; ?>

        <!-- Statistics -->
        <?php include 'components/profile-statistics.php'; ?>

        <!-- Recent Results -->
        <?php include 'components/profile-results.php'; ?>

        <!-- Footer -->
        <footer class="profile-footer">
            <span>&#10022;</span>
            Every score tells a story.
            <span>&#10022;</span>
        </footer>

    </div>
</main>
</body>
</html>
