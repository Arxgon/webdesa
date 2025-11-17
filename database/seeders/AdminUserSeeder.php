<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Pastikan role Super Admin ada
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'Super Admin', 'guard_name' => 'web']
        );

        // 2) Buat / ambil user admin
        $email = config('app.admin_email', 'admin@example.com'); // bisa diatur via config/app.php atau .env (APP_ADMIN_EMAIL)
        $password = config('app.admin_password', 'password');    // jangan lupa ganti di production!

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',   // jika kolom ini ada
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'avatar_url' => null,         // jika kolom ini ada
                'bio' => 'Initial super admin', // jika kolom ini ada
                'remember_token' => Str::random(10),
            ]
        );

        // 3) Assign role Super Admin
        if (!$user->hasRole($superAdminRole->name)) {
            $user->assignRole($superAdminRole);
        }

        // 4) (Opsional) Jika pakai Filament Shield, generate permissions default Resource
        // Kamu bisa jalankan artisan di luar seeder:
        // php artisan shield:generate --all

        $this->command->info('Admin user ready: ' . $email);
        $this->command->warn('Default password: ' . $password . ' (ubah segera di production)');
    }
}
