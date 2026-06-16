<?php

return [
    'two_factor_auth' => [
        'heading' => 'Two Factor Authentication',
        'subheading' => 'Add additional security to your account using two factor authentication.',
        'description' => 'Two factor authentication adds an extra layer of security to your account. In addition to your password, you will need to enter a security code from your phone when you log in.',
        'fields' => [
            'code' => 'Code',
            'recovery_codes' => 'Recovery Codes',
            'confirm_password' => 'Confirm Password',
        ],
        'actions' => [
            'enable' => 'Enable',
            'regenerate_recovery_codes' => 'Regenerate Recovery Codes',
            'confirm' => 'Confirm',
            'cancel' => 'Cancel',
        ],
        'messages' => [
            'enabled' => 'Two factor authentication enabled!',
            'not_enabled' => 'Two factor authentication is not enabled.',
            'must_be_enabled' => 'You must enable two factor authentication before using the API.',
        ],
        'recovery_codes_generated' => 'Your new recovery codes have been generated.',
    ],
    'profile_information' => [
        'heading' => 'Profile Information',
        'subheading' => "Update your account's profile information and email address.",
        'fields' => [
            'photo' => 'Photo',
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
        ],
        'actions' => [
            'save' => 'Save',
        ],
        'messages' => [
            'saved' => 'Saved!',
        ],
    ],
    'password' => [
        'heading' => 'Update Password',
        'subheading' => 'Ensure your account is using a long, random password to stay secure.',
        'fields' => [
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'confirm_password' => 'Confirm Password',
        ],
        'actions' => [
            'update' => 'Update',
        ],
        'messages' => [
            'updated' => 'Password updated!',
        ],
    ],
    'browser_sessions' => [
        'heading' => 'Browser Sessions',
        'subheading' => 'Manage and log out your active sessions on other browsers and devices.',
        'label' => 'Browser Sessions',
        'description' => 'If necessary, you may log out of all of your other browser sessions across all of your devices. If you feel your account has been compromised, you should also update your password.',
        'actions' => [
            'log_out' => 'Log Out Other Browser Sessions',
        ],
        'messages' => [
            'logged_out' => 'All other browser sessions have been logged out.',
        ],
    ],
    'teams' => [
        'heading' => 'Teams',
        'subheading' => 'Create and manage teams to collaborate on projects.',
        'fields' => [
            'name' => 'Team Name',
            'owner' => 'Team Owner',
            'personal_team' => 'Personal Team',
        ],
        'actions' => [
            'create' => 'Create Team',
            'update' => 'Update Team',
            'delete' => 'Delete Team',
            'leave' => 'Leave Team',
            'switch' => 'Switch Team',
        ],
        'messages' => [
            'created' => 'Team created.',
            'updated' => 'Team updated.',
            'deleted' => 'Team deleted.',
            'left' => 'Team left.',
            'switched' => 'Team switched.',
        ],
        'create_team_form' => [
            'heading' => 'Create Team',
            'subheading' => 'Create a new team to collaborate with others on projects.',
            'name' => 'Team Name',
            'actions' => [
                'create' => 'Create',
            ],
        ],
        'team_settings' => [
            'heading' => 'Team Settings',
            'subheading' => 'Manage team settings and permissions.',
            'name' => 'Team Name',
            'actions' => [
                'save' => 'Save',
            ],
            'messages' => [
                'saved' => 'Team settings saved.',
            ],
        ],
        'invitations' => [
            'heading' => 'Invitations',
            'actions' => [
                'send' => 'Send Invitation',
            ],
        ],
    ],
    'roles' => [
        'administrator' => 'Administrator',
        'editor' => 'Editor',
        'viewer' => 'Viewer',
    ],
    'manage_team' => 'Manage Team',
    'manage_account' => 'Manage Account',
    'team_settings' => 'Team Settings',
    'create_new_team' => 'Create New Team',
    'switch_teams' => 'Switch Teams',
    'Dashboard' => 'Dashboard',
    'Log Out' => 'Log Out',
    'Switch Teams' => 'Switch Teams',
];
