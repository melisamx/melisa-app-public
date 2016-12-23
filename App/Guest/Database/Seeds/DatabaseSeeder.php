<?php namespace App\Guest\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DatabaseSeeder extends InstallSeeder
{
    
    public function run()
    {
                
        $this->installEvent('event.guest.user.login', [
            'description'=>'User login success'
        ]);
        
    }
    
}
