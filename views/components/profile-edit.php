<details class="profile-accordion"
            <?= (
                !empty($profileErrors) ||
                !empty($profileSuccess)
            ) ? 'open' : '' ?>
        >

    <summary class="profile-accordion-header">
        <div>
            <p class="profile-eyebrow">Your Account</p>
            <h2>Edit Profile</h2>
            <p>Update your username and email address.</p>
        </div>

        <span class="accordion-icon"></span>
    </summary>

    <div class="profile-accordion-content">

        <?php if (!empty($profileSuccess)): ?>
            <div class="profile-message profile-message-success">
                <?= htmlspecialchars(
                    $profileSuccess,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </div>
        <?php endif; ?>

        <form action="/profile" method="POST" class="profile-edit-form">
            <input type="hidden" name="_method" value="PUT">

            <!-- Username -->
            <div class="profile-form-group">
                <label for="username">Username</label>

                <input type="text" id="username" name="username"
                        value="<?= htmlspecialchars(
                        $profileOld['username'] ?? $user['username'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    minlength="3"
                    autocomplete="username"
                    required>

                <?php if (!empty($profileErrors['username'])): ?>
                    <p class="profile-field-error">
                        <?= htmlspecialchars(
                            $profileErrors['username'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="profile-form-group">
                <label for="email">Email Address</label>

                <input type="email" id="email" name="email"
                    value="<?= htmlspecialchars(
                        $profileOld['email'] ?? $user['email'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    autocomplete="email"
                    required>

                <?php if (!empty($profileErrors['email'])): ?>
                    <p class="profile-field-error">
                        <?= htmlspecialchars(
                            $profileErrors['email'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <button type="submit" class="profile-button">
                Save Changes
            </button>

        </form>

    </div>

</details>