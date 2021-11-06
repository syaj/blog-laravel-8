<?php

namespace App\Console\Commands;

use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nblog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecuta instalador inicial del blog';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->verificaUser()){
            $rol = $this->crearRol();
            $usuario = $this->crearSuperAdmin();
            $usuario->roles()->attach($rol);

            $this->info('Se completo correctamente!');
            //$this->info($usuario.'-'.$rol);
        }else{
            $this->error('No se puedo ejecutar el instalador!');
        }

    }

    private function verificaUser()
    {
        return Roles::find(1);
    }

    private function crearRol()
    {
        $rol = "Super Admin";
        return Roles::create([
            'nombre' => $rol,
            'slug' => Str::slug($rol, '_')
        ]);

    }

    private function crearSuperAdmin()
    {
        return Usuarios::create([
            'nombre' => 'admin',
            'email' => 'aaa@bbb.com',
            'password' => Hash::make('1234'),
            'estado' => true,
        ]);

    }


}
