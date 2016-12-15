<?php namespace App\Guest\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

class DatabaseSeeder extends InstallSeeder
{
    
    public function run()
    {
                
        $this->installEvent('event.guest.user.login', [
            'description'=>'User login success'
        ]);
        
    }
    
}
