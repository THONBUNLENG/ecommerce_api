<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Route;
$routes = Route::getRoutes();
foreach ($routes->getRoutes() as $route) {
    if (strpos($route->uri(), 'login') !== false || strpos($route->getName(), 'login') !== false) {
        echo "Route: " . $route->getName() . " -> URI: " . $route->uri() . " -> Action: " . $route->getActionName() . "\n";
    }
}
echo "\n";
$user = App\Models\User::where('email', 'adminLooma@gmail.com')->first();
if ($user) {
    echo "User found\n";
    echo "Name: " . $user->name . "\n";
    echo "Role: " . $user->role . "\n";
    echo "2FA: " . ($user->two_factor_secret ? 'enabled' : 'disabled') . "\n";
    $match = Illuminate\Support\Facades\Hash::check('Looma@admin', $user->password);
    echo "Password check: " . ($match ? 'MATCH' : 'DOES NOT MATCH') . "\n";
} else {
    echo "User NOT found\n";
}
