# 14-07-2023 Avance Semanal
### Crear Proyecto Laravel V9
```
composer create-project laravel/laravel:^9.0 laravelv9x

cd laravelv9x
```

### Instalar Auth

--------------------------------------------------------------------------------------------------------------------
AUTENTICACION LARAVEL/UI
--------------------------------------------------------------------------------------------------------------------
```
composer require laravel/ui

php artisan ui bootstrap

npm install && npm run dev

php artisan ui bootstrap --auth

npm install && npm run dev

php artisan serve
```

--------------------------------------------------------------------------------------------------------------------
AUTENTICACION BLEZZER laravel 10
--------------------------------------------------------------------------------------------------------------------
```
composer require laravel/breeze --dev

php artisan breeze:install --dark

php artisan migrate

npm install

npm run dev
```

-------------------------------------------------------------------------------------------------------------------
INSTALAR LARAVEL - LIVEWIRE
-------------------------------------------------------------------------------------------------------------------

`composer require livewire/livewire`

--------------------------------------------------------------------------------------------------------------------
INSTALAR VITE .-
--------------------------------------------------------------------------------------------------------------------
```
npm install --save-dev vite laravel-vite-plugin

npm run dev
```

-------------------------------------------------------------------------------------------------------------------
# configurar el packjson.json
-------------------------------------------------------------------------------------------------------------------

```
{
    "private": true,
    "scripts": {
        **"dev": "vite", "build": "vite build",**
        "development": "mix",
        "watch": "mix watch",
        "watch-poll": "mix watch -- --watch-options-poll=1000",
        "hot": "mix watch --hot",
        "prod": "npm run production",
        "production": "mix --production"
    },
    "devDependencies": {
        "@popperjs/core": "^2.11.6",
        "axios": "^0.25",
        "bootstrap": "^5.2.3",
        "laravel-mix": "^6.0.6",
        "laravel-vite-plugin": "^0.7.8",
        "lodash": "^4.17.19",
        "postcss": "^8.1.14",
        "sass": "^1.56.1",
        "vite": "^4.4.3"
    }
}
```
o Tambien 👍 

```
{
    "private": true,
    "scripts": {
        "dev": "vite",
        "build": "vite build"
    },
    "devDependencies": {
        "@fortawesome/fontawesome-free": "^6.2.1",
        "@popperjs/core": "^2.11.6",
        "axios": "^1.1.2",
        "bootstrap": "^5.2.3",
        "bootstrap-icons": "^1.10.3",
        "laravel-vite-plugin": "^0.7.2",
        "lodash": "^4.17.19",
        "postcss": "^8.1.14",
        "sass": "^1.56.1",
        "vite": "^4.0.0"
    }
}
```


![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/eb024c0c-c146-469f-8847-51b95b5a85c1)





---------------------------------------------------------------------------------------------------
CREAR MIGRACION DE EMPLEADOS
-----------------------------------------------------------------------


**<nombre de la tabla>**



```Public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->timestamps();
        });
    }
```

**actualizamos los datos de la tabla empleados**



![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/92812e4a-b013-4dba-a3a2-4c1c7a6ea5f2)



`php artisan migrate`
  
  CREAR MIGRACION DE CARGOS
control + bloq mayus +p

>artisan make:migration


no vamos a migrations.-

    {
         Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
    }
actualizamos los datos de la tabla cargos

php artisan migrate




![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/a5656c6b-39f3-439a-b0e5-1ba09f4e27ed)
-
  
  
CREAR MIGRACION DE PAISES
-------------------------------------------------------------------------------------------------  


```
{
     Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->timestamps();
        });
}
```
actualizamos los datos de la tabla paises



![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/f82501f1-828b-4686-9f9c-6015c8c870fa)



`php artisan migrate`

--------------------------------------------------------------------------------------------------  
CREAR MIGRACION DE REGIONES
--------------------------------------------------------------------------------------------------  
```
{
     Schema::create('regiones', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->timestamps();
        });
}
```
actualizamos los datos de la tabla regiones



![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/791f69ab-67bd-4abd-b5e2-ae9ffd80e725)



php artisan migrate
  
---------------------------------------------------------------------------------------------------
 CREAR MIGRACION DE COMUNAS
--------------------------------------------------------------------------------------------------  
control + bloq mayus +p

artisan make:migration

no vamos a migrations.-

```
{
     Schema::create('comunas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
}
```
actualizamos los datos de la tabla comunas



![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/6554409a-af7d-411a-8601-de71845f738f)



`php artisan migrate `
  
---------------------------------------------------------------------------------------------------
CREAR SEEDER DE EMPLEADOS.-
---------------------------------------------------------------------------------------------------  

`php artisan make:seeder EmpleadoSeeder`

se crea el seeder y agregamos el siguiente codigo 💯 

```
<?php

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use Faker\Factory as Faker;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1500; $i++) {
            Empleado::create([
                'nombre' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'telefono' => $faker->phoneNumber,
                'direccion' => $faker->address,
                'cargo' => $faker->jobTitle,
                'correo' => $faker->unique()->safeEmail,
            ]);
        }
    }
}

```

subimos el seeder a nuestra base de datos:

`php artisan db:seed --class=EmpleadoSeeder`

---------------------------------------------------------------------------------------------------
CREAR SEEDER DE CARGOS.-
---------------------------------------------------------------------------------------------------

```
<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1500; $i++) {
            Cargo::create([
                'nombre' => $faker->jobTitle,
            ]);
        }
    }
}
```
---------------------------------------------------------------------------------------------------
CREAR SEEDER DE PAISES
---------------------------------------------------------------------------------------------------

`php artisan make:seeder PaisSeeder`


```
<?php

use Illuminate\Database\Seeder;
use App\Models\Pais;
use PragmaRX\Countries\Package\Countries;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = new Countries();
        $allCountries = $countries->all();

        foreach ($allCountries as $country) {
            Pais::create([
                'nombre' => $country->name->common,
                'codigo' => $country->cca2,
            ]);
        }
    }
}

```

subimos el seeder a nuestra base de datos:

`php artisan db:seed --class=PaisSeeder`

---------------------------------------------------------------------------------------------------
CREAR SEEDER DE REGIONES
---------------------------------------------------------------------------------------------------
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regiones = [
            'Región de Arica y Parinacota',
            'Región de Tarapacá',
            'Región de Antofagasta',
            'Región de Atacama',
            'Región de Coquimbo',
            'Región de Valparaíso',
            'Región Metropolitana de Santiago',
            'Región del Libertador General Bernardo O\'Higgins',
            'Región del Maule',
            'Región de Ñuble',
            'Región del Biobío',
            'Región de La Araucanía',
            'Región de Los Ríos',
            'Región de Los Lagos',
            'Región de Aysén del General Carlos Ibáñez del Campo',
            'Región de Magallanes y de la Antártica Chilena'
        ];

        foreach ($regiones as $region) {
            DB::table('regiones')->insert([
                'region' => $region,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
```
---------------------------------------------------------------------------------------------------
CREAR SEEDER COMUNAS
---------------------------------------------------------------------------------------------------
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Comuna;

class ComunaSeeder extends Seeder
{
    public function run()
    {
        $comunas = [
            // Región de Arica y Parinacota
            'Arica',
            'Camarones',
            'Putre',
            'General Lagos',
            
            // Región de Tarapacá
            'Iquique',
            'Alto Hospicio',
            'Pozo Almonte',
            'Camiña',
            'Colchane',
            'Huara',
            'Pica',
            
            // Región de Antofagasta
            'Antofagasta',
            'Mejillones',
            'Sierra Gorda',
            'Taltal',
            'Calama',
            'Ollagüe',
            'San Pedro de Atacama',
            'Tocopilla',
            'María Elena',
            
            // Región de Atacama
            'Copiapó',
            'Caldera',
            'Tierra Amarilla',
            'Chañaral',
            'Diego de Almagro',
            'Vallenar',
            'Alto del Carmen',
            'Freirina',
            'Huasco',
            
            // Región de Coquimbo
            'La Serena',
            'Coquimbo',
            'Andacollo',
            'La Higuera',
            'Paiguano',
            'Vicuña',
            'Illapel',
            'Canela',
            'Los Vilos',
            'Salamanca',
            'Ovalle',
            'Combarbalá',
            'Monte Patria',
            'Punitaqui',
            'Río Hurtado',
            
            // Región de Valparaíso
            'Valparaíso',
            'Casablanca',
            'Concón',
            'Juan Fernández',
            'Puchuncaví',
            'Quintero',
            'Viña del Mar',
            'Isla de Pascua',
            'Los Andes',
            'Calle Larga',
            'Rinconada',
            'San Esteban',
            'La Ligua',
            'Cabildo',
            'Papudo',
            'Petorca',
            'Zapallar',
            'Quillota',
            'Calera',
            'Hijuelas',
            'La Cruz',
            'Nogales',
            'San Antonio',
            'Algarrobo',
            'Cartagena',
            'El Quisco',
            'El Tabo',
            'Santo Domingo',
            'San Felipe',
            'Catemu',
            'Llaillay',
            'Panquehue',
            'Putaendo',
            'Santa María',
            'Quilpué',
            'Limache',
            'Olmué',
            'Villa Alemana',
            
            // Región Metropolitana de Santiago
            'Santiago',
            'Cerrillos',
            'Cerro Navia',
            'Conchalí',
            'El Bosque',
            'Estación Central',
            'Huechuraba',
            'Independencia',
            'La Cisterna',
            'La Florida',
            'La Granja',
            'La Pintana',
            'La Reina',
            'Las Condes',
            'Lo Barnechea',
            'Lo Espejo',
            'Lo Prado',
            'Macul',
            'Maipú',
            'Ñuñoa',
            'Pedro Aguirre Cerda',
            'Peñalolén',
            'Providencia',
            'Pudahuel',
            'Quilicura',
            'Quinta Normal',
            'Recoleta',
            'Renca',
            'San Joaquín',
            'San Miguel',
            'San Ramón',
            'Vitacura',
            'Puente Alto',
            'Pirque',
            'San José de Maipo',
            'Colina',
            'Lampa',
            'Tiltil',
            'San Bernardo',
            'Buin',
            'Calera de Tango',
            'Paine',
            'Melipilla',
            'Alhué',
            'Curacaví',
            'María Pinto',
            'San Pedro',
            'Talagante',
            'El Monte',
            'Isla de Maipo',
            'Padre Hurtado',
            'Peñaflor',
            
            // Región del Libertador General Bernardo O'Higgins
            'Rancagua',
            'Codegua',
            'Coinco',
            'Coltauco',
            'Doñihue',
            'Graneros',
            'Las Cabras',
            'Machalí',
            'Malloa',
            'Mostazal',
            'Olivar',
            'Peumo',
            'Pichidegua',
            'Quinta de Tilcoco',
            'Rengo',
            'Requínoa',
            'San Vicente',
            'Pichilemu',
            'La Estrella',
            'Litueche',
            'Marchihue',
            'Navidad',
            'Paredones',
            'San Fernando',
            'Chépica',
            'Chimbarongo',
            'Lolol',
            'Nancagua',
            'Palmilla',
            'Peralillo',
            'Placilla',
            'Pumanque',
            'Santa Cruz',
            
            // Región del Maule
            'Talca',
            'ConsVitacuratitución',
            'Curepto',
            'Empedrado',
            'Maule',
            'Pelarco',
            'Pencahue',
            'Río Claro',
            'San Clemente',
            'San Rafael',
            'Cauquenes',
            'Chanco',
            'Pelluhue',
            'Curicó',
            'Hualañé',
            'Licantén',
            'Molina',
            'Rauco',
            'Romeral',
            'Sagrada Familia',
            'Teno',
            'Vichuquén',
            'Linares',
            'Colbún',
            'Longaví',
            'Parral',
            'Retiro',
            'San Javier',
            'Villa Alegre',
            'Yerbas Buenas',
            
            // Región de Ñuble
            'Chillán',
            'Bulnes',
            'Cobquecura',
            'Coelemu',
            'Coihueco',
            'Chillán Viejo',
            'El Carmen',
            'Ninhue',
            'Ñiquén',
            'Pemuco',
            'Pinto',
            'Portezuelo',
            'Quillón',
            'Quirihue',
            'Ránquil',
            'San Carlos',
            'San Fabián',
            'San Ignacio',
            'San Nicolás',
            'Treguaco',
            'Yungay',
            
            // Región del Biobío
            'Concepción',
            'Coronel',
            'Chiguayante',
            'Florida',
            'Hualqui',
            'Lota',
            'Penco',
            'San Pedro de La Paz',
            'Santa Juana',
            'Talcahuano',
            'Tomé',
            'Hualpén',
            'Lebu',
            'Arauco',
            'Cañete',
            'Contulmo',
            'Curanilahue',
            'Los Álamos',
            'Tirúa',
            'Los Ángeles',
            'Antuco',
            'Cabrero',
            'Laja',
            'Mulchén',
            'Nacimiento',
            'Negrete',
            'Quilaco',
            'Quilleco',
            'San Rosendo',
            'Santa Bárbara',
            'Tucapel',
            'Yumbel',
            'Alto Biobío',
            
            // Región de La Araucanía
            'Temuco',
            'Carahue',
            'Cunco',
            'Curarrehue',
            'Freire',
            'Galvarino',
            'Gorbea',
            'Lautaro',
            'Loncoche',
            'Melipeuco',
            'Nueva Imperial',
            'Padre Las Casas',
            'Pitrufquén',
            'Pucón',
            'Saavedra',
            'Teodoro Schmidt',
            'Toltén',
            'Vilcún',
            'Villarrica',
            'Cholchol',
            'Angol',
            'Collipulli',
            'Curacautín',
            'Ercilla',
            'Lonquimay',
            'Los Sauces',
            'Lumaco',
            'Purén',
            'Renaico',
            'Traiguén',
            'Victoria',
            
            // Región de Los Ríos
            'Valdivia',
            'Corral',
            'Lanco',
            'Los Lagos',
            'Máfil',
            'Mariquina',
            'Paillaco',
            'Panguipulli',
            'La Unión',
            'Futrono',
            'Lago Ranco',
            'Río Bueno',
            
            // Región de Los Lagos
            'Puerto Montt',
            'Calbuco',
            'Cochamó',
            'Fresia',
            'Frutillar',
            'Los Muermos',
            'Llanquihue',
            'Maullín',
            'Puerto Varas',
            'Castro',
            'Ancud',
            'Chonchi',
            'Curaco de Vélez',
            'Dalcahue',
            'Puqueldón',
            'Queilén',
            'Quellón',
            'Quemchi',
            'Quinchao',
            'Osorno',
            'Puerto Octay',
            'Purranque',
            'Puyehue',
            'Río Negro',
            'San Juan de la Costa',
            'San Pablo',
            'Chaitén',
            'Futaleufú',
            'Hualaihué',
            'Palena',
            
            // Región de Aysén del General Carlos Ibáñez del Campo
            'Coyhaique',
            'Lago Verde',
            'Aysén',
            'Cisnes',
            'Guaitecas',
            'Cochrane',
            'O\'Higgins',
            'Tortel',
            'Chile Chico',
            'Río Ibáñez',
            
            // Región de Magallanes y de la Antártica Chilena
            'Punta Arenas',
            'Laguna Blanca',
            'Río Verde',
            'San Gregorio',
            'Cabo de Hornos (Ex Navarino)',
            'Antártica',
            'Porvenir',
            'Primavera',
            'Timaukel',
            'Natales',
            'Torres del Paine',
        ];

        foreach ($comunas as $comuna) {
            DB::table('comunas')->insert([
                'nombre' => $comuna,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
```

---------------------------------------------------------------------------------------------------
Crear MVC CARGO
---------------------------------------------------------------------------------------------------

- [x] Modelo
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'cargos';

    protected $fillable = ['nombre'];

}
```

- [x] Vista 

1.    index.blade.php  
2.    modals.blade.php
3.    view.blade.php

- [x] Controlador

```
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cargo;

class Cargos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cargos.view', [
            'cargos' => Cargo::latest()
						->orWhere('nombre', 'LIKE', $keyWord)

						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nombre = null;

    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Cargo::create([
			'nombre' => $this->nombre

        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Cargo Creado Correctamente.');
    }

    public function edit($id)
    {
        $record = Cargo::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cargo::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre

            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cargo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Cargo::where('id', $id)->delete();
        }
    }
}
```

--------------------------------------------------------------------------------------------------
 Crear MVC PAIS
-------------------------------------------------------------------------------------------------

- [x] Modelo

```
<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paise extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paises';

    protected $fillable = ['nombre','codigo'];
	
}

```

- [x] Vista 

1.    index.blade.php  
2.    modals.blade.php
3.    view.blade.php

- [x] Controlador

```
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paise;

class Paises extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $codigo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paises.view', [
            'paises' => Paise::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('codigo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->codigo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
        ]);

        Paise::create([ 
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Paise Successfully created.');
    }

    public function edit($id)
    {
        $record = Paise::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->codigo = $record-> codigo;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paise::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Paise Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Paise::where('id', $id)->delete();
        }
    }
}
```
--------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------    Crear MVC REGIONES
--------------------------------------------------------------------------------------------------

- [x] Modelo

```
<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'regiones';

    protected $fillable = ['region'];
	
}
```

- [x] Vista 

1.    index.blade.php  
2.    modals.blade.php
3.    view.blade.php

- [x] Controlador

```
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Regione;

class Regiones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $region;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.regiones.view', [
            'regiones' => Regione::latest()
						->orWhere('region', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->region = null;
    }

    public function store()
    {
        $this->validate([
		'region' => 'required',
        ]);

        Regione::create([ 
			'region' => $this-> region
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Regione Successfully created.');
    }

    public function edit($id)
    {
        $record = Regione::findOrFail($id);
        $this->selected_id = $id; 
		$this->region = $record-> region;
    }

    public function update()
    {
        $this->validate([
		'region' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Regione::find($this->selected_id);
            $record->update([ 
			'region' => $this-> region
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Regione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Regione::where('id', $id)->delete();
        }
    }
}
```
--------------------------------------------------------------------------------------------------
Crear MVC COMUNAS
--------------------------------------------------------------------------------------------------

- [x] Modelo
```
<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'comunas';

    protected $fillable = ['nombre'];
	
}
```
- [x] Vista 

1.    index.blade.php  
2.    modals.blade.php
3.    view.blade.php

- [x] Controlador

```
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comuna;

class Comunas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.comunas.view', [
            'comunas' => Comuna::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Comuna::create([ 
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Comuna Successfully created.');
    }

    public function edit($id)
    {
        $record = Comuna::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Comuna::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Comuna Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Comuna::where('id', $id)->delete();
        }
    }
}
```
-------------------------------------------------------------------------------------------------------------------
CREAR CONTADORES DE CADA TABLA.-
-------------------------------------------------------------------------------------------------------------------


`php artisan make:livewire NombreContador`


Abre el archivo` app/Http/Livewire/NombreContador.php` y modifícalo de la siguiente manera:


```
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado; // Asegúrate de importar el modelo que necesitas

class EmployeeCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Empleado::count();
    }

    public function render()
    {
        return view('livewire.employee-counter');
    }
}
```

- [x] EMPLEADOS
- [x] CARGOS
- [x] PAIS
- [x] REGIONES
- [x] COMUNAS
- [ ] EMPRESA

--------------------------------------------------------------------------------------------------------------------
REFRESCAR EN AUTOMATICO SIN RECARGAR .-
--------------------------------------------------------------------------------------------------------------------

En el componente NombreContador, agrega el siguiente código al final del método 

```
mount():

public function mount()
{
    $this->count = Empleado::count();
}

public function render()
{
    return view('livewire.employee-counter');
}
```


En la vista nombre-vista.blade.php, modifica el código existente para agregar la directiva wire:poll al elemento que muestra el contador. Asegúrate de ajustar el intervalo de tiempo según tus necesidades. Por ejemplo:

```
<div>
    <h2><span wire:poll.3000ms="refreshCount">{{ $count }}</span></h2>
</div>

@livewireScripts
```

En el componente NombreCounter, agrega un nuevo método llamado refreshCount() que se ejecutará cada vez que se actualice el contador. Dentro de este método, actualizarás la propiedad $count con el nuevo valor de empleados.
Por ejemplo:

```
public function refreshCount()
{
    $this->count = Empleado::count();
}
```
 ## EJEMPLO CONTROLADOR 


![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/11944c73-e71f-4240-95d1-92d35aee3c47)


## EJEMPLO VISTA


![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/fb1ea976-5fc3-493d-b160-475012c2a721)




- [x] EMPLEADOS
- [x] CARGOS
- [x] PAISES
- [x] REGIONES
- [x] COMUNAS
- [x] EMPRESAS

-------------------------------------------------------------------------------------------------
Actualizar Iconos Livewire
------------------------------------------------------------------------------------------------

```
<div class="float-left"  style="display: flex; align-items: center;">

  <div style="width: 32px; height: 32px; overflow: hidden; margin-right: 10px;">

  <img src="{{ asset('img/livewire.png') }}" alt="Logo" style="width: 100%; height: auto;">

</div>
	<h4>Lista de Regiones  </h4>
</div>
```
- [x] EMPLEADOS
- [x] CARGO
- [x] PAIS
- [x] REGION
- [x] COMUNA
- [x] EMPRESA



![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/2ece58ff-aaa6-4d4e-802d-0a214a29adc8)




![Image](https://github.com/cristianhu06/laravelv9x/assets/139149058/80d2d210-a7a8-4509-87a0-6b8fcbd4cb7c)


--------------------------------------------------------------------------------------------------

--------------------------------------------------------------------------------------------------

