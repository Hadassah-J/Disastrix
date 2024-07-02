

<p align="center">

<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Disastrix

Disastrix is a web application that aims to allow for reporting of incidents and deployment of respondents to the destinations of the incidents while allowing public users to view progress of deployment and receive an estimate of the time it will take to arrive at the scene of the incident. It also allows for multiple organizations to log in and dispatch their respondents to incidents

## Setup and installation
### Requirements
Before setting up and installing the project in your local storage, you must have:
- **Composer**- A package that is essential in managing PHP dependencies and libraries. It can be installed through the [Composer website](https://getcomposer.org) or through the command line using the command
  ```
  composer install
  ```

- **PHP**- A programming language that is commonly used in web development. It can be installed in the [PHP website](https://www.php.net).

- **Visual Studio Code** - A code editor that supports multiple programming languages. It can be installed in the [Visual Studio Code website](https://code.visualstudio.com).
- **Apache XAMPP server** - A web server that assists in connection to the database through MariaDB. It can be installed [here](https://www.apachefriends.org).

### Project setup
- Once you have the required software programs, you first clone the project to your desired repository using the command:
```
git clone https://github.com/Gendi-kinji/disastrix.git
```
- You then update the .env file to include your database details.
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
- Afterwards, you run the database migrations to include the database tables that would be needed for the application.
```
php artisan migrate
``` 


- You then run the command to start the Laravel application:
```
php artisan serve
```

## Expected input
- Registering: name,email,password.
- Login: email,password.
- Incident reporting: incident type,location,time,details.
## Expected output
- User-specific dashboards according to roles.
- A map indicating location of incidents and organizations.

## Tree structure

```

|   .editorconfig
|   .env
|   .env.example
|   .gitattributes
|   .gitignore
|   .styleci.yml
|   artisan
|   CHANGELOG.md
|   composer.json
|   composer.lock
|   LICENSE
|   package-lock.json
|   package.json
|   phpunit.xml
|   postcss.config.js
|   
|   tailwind.config.js
|   
|   vite.config.js
|   
|           
|               
+---app
|   +---Actions
|   |   +---Fortify
|   |   |       CreateNewUser.php
|   |   |       PasswordValidationRules.php
|   |   |       ResetUserPassword.php
|   |   |       UpdateUserPassword.php
|   |   |       UpdateUserProfileInformation.php
|   |   |       
|   |   \---Jetstream
|   |           DeleteUser.php
|   |           
|   +---Events
|   |       UserLoggedIn.php
|   |       
|   +---Http
|   |   +---Controllers
|   |   |       AdminController.php
|   |   |       Controller.php
|   |   |       IncidentController.php
|   |   |       LockScreenController.php
|   |   |       OrganizationController.php
|   |   |       ResponderController.php
|   |   |       RoleController.php
|   |   |       
|   |   \---Middleware
|   |           LockMiddleware.php
|   |           UpdateLastSeen.php
|   |           
|   +---Listeners
|   |       LogUserLogin.php
|   |       UpdateUserStatus.php
|   |       
|   +---Mail
|   |       ResetMail.php
|   |       
|   +---Models
|   |       Admin.php
|   |       Deployer.php
|   |       Deployment.php
|   |       Emergency.php
|   |       Head.php
|   |       Incident.php
|   |       Organization.php
|   |       Responder.php
|   |       Role.php
|   |       User.php
|   |       
|   +---Notifications
|   |       DispatchNotification.php
|   |       EmergencyNotification.php
|   |       IncidentNotification.php
|   |       RoleNotification.php
|   |       
|   +---Providers
|   |       AppServiceProvider.php
|   |       EventServiceProvider.php
|   |       FortifyServiceProvider.php
|   |       JetstreamServiceProvider.php
|   |       
|   \---View
|       \---Components
|               AppLayout.php
|               GuestLayout.php
|               
+---bootstrap
|   |   app.php
|   |   providers.php
|   |   
|   \---cache
|           .gitignore
|           packages.php
|           services.php
|           
+---config
|       adminlte.php
|       app.php
|       auth.php
|       cache.php
|       database.php
|       filesystems.php
|       fortify.php
|       jetstream.php
|       logging.php
|       mail.php
|       permission.php
|       queue.php
|       sanctum.php
|       services.php
|       session.php
|       
+---database
|   |   .gitignore
|   |   database.sqlite
|   |   
|   +---factories
|   |       UserFactory.php
|   |       
|   +---migrations
|   |       0001_01_01_000000_create_users_table.php
|   |       0001_01_01_000001_create_cache_table.php
|   |       0001_01_01_000002_create_jobs_table.php
|   |       2024_05_20_180657_add_two_factor_columns_to_users_table.php
|   |       2024_05_20_180749_create_personal_access_tokens_table.php
|   |       2024_06_22_170306_create_permission_tables.php
|   |       2024_06_29_174345_add_last_seen_to_users_table.php
|   |       2024_07_01_175720_create_notifications_table.php
|   |       
|   \---seeders
|           DatabaseSeeder.php
|           RolesandPermissionsSeeder.php
+---resources
|   +---css
|   |       app.css
|   |       
|   +---js
|   |       app.js
|   |       
|   +---markdown
|   |       policy.md
|   |       terms.md
|   |       
|   \---views
|       |   dashboard.blade.php
|       |   lock.blade.php
|       |   navigation-menu.blade.php
|       |   policy.blade.php
|       |   popup.blade.php
|       |   respondent.blade.php
|       |   terms.blade.php
|       |   welcome.blade.php
|       |   
|       +---admin
|       |       admin-register.blade.php
|       |       app.blade.php
|       |       content.blade.php
|       |       footer.blade.php
|       |       header.blade.php
|       |       show-admins.blade.php
|       |       show-users.blade.php
|       |       sidebar.blade.php
|       |       
|       +---api
|       |       api-token-manager.blade.php
|       |       index.blade.php
|       |       
|       +---auth
|       |       confirm-password.blade.php
|       |       forgot-password.blade.php
|       |       login.blade.php
|       |       register.blade.php
|       |       reset-password.blade.php
|       |       two-factor-challenge.blade.php
|       |       verify-email.blade.php
|       |       
|       +---components
|       |       action-message.blade.php
|       |       action-section.blade.php
|       |       application-logo.blade.php
|       |       application-mark.blade.php
|       |       authentication-card-logo.blade.php
|       |       authentication-card.blade.php
|       |       banner.blade.php
|       |       button.blade.php
|       |       checkbox.blade.php
|       |       confirmation-modal.blade.php
|       |       confirms-password.blade.php
|       |       danger-button.blade.php
|       |       dialog-modal.blade.php
|       |       drop-select.blade.php
|       |       dropdown-link.blade.php
|       |       dropdown.blade.php
|       |       form-section.blade.php
|       |       incident-list.blade.php
|       |       input-error.blade.php
|       |       input.blade.php
|       |       label.blade.php
|       |       modal.blade.php
|       |       nav-link.blade.php
|       |       responsive-nav-link.blade.php
|       |       secondary-button.blade.php
|       |       section-border.blade.php
|       |       section-title.blade.php
|       |       switchable-team.blade.php
|       |       validation-errors.blade.php
|       |       welcome.blade.php
|       |       
|       +---deploy
|       |       emergency-progress.blade.php
|       |       emergency-report.blade.php
|       |       view-incident.blade.php
|       |       
|       +---emails
|       |       team-invitation.blade.php
|       |       
|       +---layouts
|       |       app.blade.php
|       |       guest.blade.php
|       |       
|       +---organization
|       |       dispatch-responders.blade.php
|       |       incident-list.blade.php
|       |       incident-view.blade.php
|       |       organization-dashboard.blade.php
|       |       organization-deploy.blade.php
|       |       organization-login.blade.php
|       |       organization-register.blade.php
|       |       organization-view-details.blade.php
|       |       organization-view.blade.php
|       |       responder-view.blade.php
|       |       
|       +---profile
|       |       delete-user-form.blade.php
|       |       logout-other-browser-sessions-form.blade.php
|       |       show.blade.php
|       |       two-factor-authentication-form.blade.php
|       |       update-password-form.blade.php
|       |       update-profile-information-form.blade.php
|       |       
|       +---users
|       |       edit-users.blade.php
|       |       
|       \---vendor
|           \---notifications
|                   email.blade.php
|                   
+---routes
|       api.php
|       console.php
|       web.php
|       
+---storage
|   +---app
|   |   |   .gitignore
|   |   |   
|   |   +---livewire-tmp
|   |   |       RkSpIBFPvAktpL44brcaC8MRSWu0yX-metaNTI2VW5vaGFuYV9CYW5rYWkgKDEpLmpwZWc=-.jpg
|   |   |       
|   |   \---public
|   |       |   .gitignore
|   |       |   
|   |       \---profile-photos
|   |               uxpbgbRkQSsuDxgtGiZfLDQjEtm00DWXYCFnKTHP.jpg
|   |               x4anWW9iGV1WPz0JzD56F8aGrSrf7QdvTeQBh36Q.png
|   |               


```
## Questions
If there are any inquiries, please contact us via:
- GitHub: [@George Fundi](https://github.com/Gendi-kinji) and [@Hadassah Jimgun](https://github.com/Hadassah-J)
  

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
