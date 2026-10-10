<?php include_once 'inc/head.php'; ?>

<body class="login-page">

    <main class="login-wrapper">

        <section class="login-card">

            <header class="login-header">
                <div class="login-emblem" aria-hidden="true">✦</div>

                <p class="login-eyebrow">The World of Tolkien</p>

                <h1>Welcome <span>Back</span></h1>

                <p class="login-subtitle">
                    Your journey through Middle-earth awaits.
                </p>

                <div class="login-divider">
                    <span>✧</span>
                </div>
            </header>

            <form action="/login" method="POST" class="login-form">

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
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <?php if (isset($errors['password'])): ?>
                        <p class="error">
                            <?= htmlspecialchars((string) $errors['password'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <button type="submit" id="btnSuccess" class="formbtn">
                    <span>Enter the Realm</span>
                    <span class="button-arrow" aria-hidden="true">→</span>
                </button>

                <div class="login-register">
                    <p>New to these lands?</p>
                    <a href="/register" class="register-link">
                        Create an account
                    </a>
                </div>

            </form>

            <footer class="login-footer">
                ✦ &nbsp; One account. A thousand legends. &nbsp; ✦
            </footer>

        </section>

    </main>

    <?php include_once 'inc/footer.php'; ?>
</body>
