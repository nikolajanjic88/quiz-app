<?php include_once 'inc/head.php'; ?>

<body class="login-page">

    <main class="login-wrapper">

        <section class="login-card register-card">

            <header class="login-header">
                <div class="login-emblem" aria-hidden="true">✦</div>

                <p class="login-eyebrow">The World of Tolkien</p>

                <h1>Join the <span>Realm</span></h1>

                <p class="login-subtitle">
                    Begin your own journey through Middle-earth.
                </p>

                <div class="login-divider">
                    <span>✧</span>
                </div>
            </header>

            <form action="/register" method="POST" class="login-form">

                <div class="input-box">
                    <label for="username">Username</label>

                    <div class="input-field">
                        <span class="field-icon" aria-hidden="true">♙</span>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Choose a username"
                            value="<?= htmlspecialchars((string) old('username', ''), ENT_QUOTES, 'UTF-8') ?>"
                            autocomplete="username"
                            required
                        >
                    </div>

                    <?php if (isset($errors['username'])): ?>
                        <p class="error">
                            <?= htmlspecialchars((string) $errors['username'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <label for="email">Email Address</label>

                    <div class="input-field">
                        <span class="field-icon" aria-hidden="true">✉</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            value="<?= htmlspecialchars((string) old('email', ''), ENT_QUOTES, 'UTF-8') ?>"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <?php if (isset($errors['email'])): ?>
                        <p class="error">
                            <?= htmlspecialchars((string) $errors['email'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <label for="password">Password</label>

                    <div class="input-field">
                        <span class="field-icon" aria-hidden="true">⚿</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    <?php if (isset($errors['password'])): ?>
                        <p class="error">
                            <?= htmlspecialchars((string) $errors['password'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <label for="rpassword">Confirm Password</label>

                    <div class="input-field">
                        <span class="field-icon" aria-hidden="true">⚿</span>

                        <input
                            type="password"
                            id="rpassword"
                            name="rpassword"
                            placeholder="Repeat your password"
                            autocomplete="new-password"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="formbtn">
                    <span>Create Your Account</span>
                    <span class="button-arrow" aria-hidden="true">→</span>
                </button>

                <div class="login-register">
                    <p>Already a member?</p>

                    <a href="/login" class="register-link">
                        Return to Login
                    </a>
                </div>

            </form>

            <footer class="login-footer">
                ✦ &nbsp; Your legend begins here. &nbsp; ✦
            </footer>

        </section>

    </main>

    <?php include_once 'inc/footer.php'; ?>
</body>
