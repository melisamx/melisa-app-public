<?php namespace App\Guest\Database\Seeds;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\InstallEvent;

class DatabaseSeeder extends Seeder
{
    use InstallEvent;
    
    public function run()
    {
                
        $this->installEvent('event.guest.user.login', [
            'description'=>'User login success'
        ]);
        
    }
    
}
