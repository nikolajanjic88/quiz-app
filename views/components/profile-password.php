<details class="profile-accordion password-accordion"
            <?= (
                !empty($passwordErrors) ||
                !empty($passwordSuccess)
            ) ? 'open' : '' ?>
        >

    <summary class="profile-accordion-header">
        <div>
            <p class="profile-eyebrow">Account Security</p>
            <h2>Change Password</h2>
            <p>Keep your account secure with a strong password.</p>
        </div>

        <span class="accordion-icon"></span>
    </summary>

    <div class="profile-accordion-content">

        <?php if (!empty($passwordSuccess)): ?>
            <div class="profile-message profile-message-success">
                <?= htmlspecialchars(
                    $passwordSuccess,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </div>
        <?php endif; ?>

        <form
            action="/profile/password"
            method="POST"
            class="profile-edit-form"
        >
            <input
                type="hidden"
                name="_method"
                value="PUT"
            >

            <!-- Current Password -->
            <div class="profile-form-group">
                <label for="current_password">
                    Current Password
                </label>

                <input
                    type="password"
                    id="current_password"
                    name="current_password"
                    autocomplete="current-password"
                    required
                >

                <?php if (!empty($passwordErrors['current_password'])): ?>
                    <p class="profile-field-error">
                        <?= htmlspecialchars(
                            $passwordErrors['current_password'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- New Password -->
            <div class="profile-form-group">
                <label for="new_password">
                    New Password
                </label>

                <input
                    type="password"
                    id="new_password"
                    name="new_password"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >

                <?php if (!empty($passwordErrors['new_password'])): ?>
                    <p class="profile-field-error">
                        <?= htmlspecialchars(
                            $passwordErrors['new_password'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Confirm New Password -->
            <div class="profile-form-group">
                <label for="confirm_password">
                    Confirm New Password
                </label>

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >

                <?php if (!empty($passwordErrors['confirm_password'])): ?>
                    <p class="profile-field-error">
                        <?= htmlspecialchars(
                            $passwordErrors['confirm_password'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="profile-button"
            >
                Update Password
            </button>

        </form>

    </div>

</details>