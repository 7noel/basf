<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Security\User;
use App\Modules\Security\Role;
use App\Modules\Security\Permission;
use App\Modules\Security\PermissionGroup;
use App\Modules\Base\IdType;
use App\Modules\Base\UnitType;
use App\Modules\Storage\Unit;
use App\Modules\Base\Currency;
use App\Modules\Finances\Exchange;
use App\Modules\Finances\Company;
use App\Modules\Storage\Category;
use App\Modules\Storage\SubCategory;
use App\Modules\Storage\Product;
use App\Modules\Storage\Stock;
use App\Modules\Storage\ProductAccessory;
use App\Modules\Storage\Warehouse;
use App\Modules\Logistics\Brand;
use App\Modules\Logistics\Modelo;
use App\Modules\Base\DocumentType;
use App\Modules\Base\DocumentControl;
use App\Modules\Finances\PaymentCondition;
use App\Modules\HumanResources\Job;
use App\Modules\HumanResources\Employee;
use App\Modules\Finances\Bank;

use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        User::create(['name' => 'Noel', 'email' => 'noel.logan@gmail.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'MAT_001', 'email' => 'matizador_001@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'MAT_002', 'email' => 'matizador_002@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'MAT_003', 'email' => 'matizador_003@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'MAT_004', 'email' => 'matizador_004@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'PIN_001', 'email' => 'pintor_001@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'PIN_002', 'email' => 'pintor_002@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'PIN_003', 'email' => 'pintor_003@gmail.com', 'password' => '123', 'is_superuser' => false]);
        User::create(['name' => 'PIN_004', 'email' => 'pintor_004@gmail.com', 'password' => '123', 'is_superuser' => false]);

        $r=Role::create(['name' => 'ADMINISTRADOR DE SISTEMA']);
        $r->users()->sync([1]);
        $r=Role::create(['name' => 'MATIZADOR']);
        $r->users()->sync([2,3,4,5]);
        $r=Role::create(['name' => 'PINTOR']);
        $r->users()->sync([6,7,8,9]);
        $r4=Role::create(['name' => 'ADMINISTRADOR']);


        // MARCAS DE VEHICULOS
        Brand::create(['name' => 'HONDA']);
        Brand::create(['name' => 'CREVROLET']);

        // MODELOS DE VEHICULOS
        Modelo::create(['name' => 'FIT', 'brand_id' => 1]);
        Modelo::create(['name' => 'CIVIC', 'brand_id' => 1]);
        Modelo::create(['name' => 'ACCORD', 'brand_id' => 1]);
        Modelo::create(['name' => 'LEGEND', 'brand_id' => 1]);
        Modelo::create(['name' => 'WRV', 'brand_id' => 1]);
        Modelo::create(['name' => 'HRV', 'brand_id' => 1]);
        Modelo::create(['name' => 'CRV', 'brand_id' => 1]);
        Modelo::create(['name' => 'PILOT', 'brand_id' => 1]);
        Modelo::create(['name' => 'ODISSEY', 'brand_id' => 1]);
        Modelo::create(['name' => 'RIDGELINE', 'brand_id' => 1]);
        Modelo::create(['name' => 'SPARK', 'brand_id' => 2]);
        Modelo::create(['name' => 'SAIL', 'brand_id' => 2]);
        Modelo::create(['name' => 'SPIN', 'brand_id' => 2]);
        Modelo::create(['name' => 'SONIC', 'brand_id' => 2]);
        Modelo::create(['name' => 'AVEO', 'brand_id' => 2]);
        Modelo::create(['name' => 'COBALT', 'brand_id' => 2]);
        Modelo::create(['name' => 'CRUZE', 'brand_id' => 2]);
        Modelo::create(['name' => 'MALIBÚ', 'brand_id' => 2]);
        Modelo::create(['name' => 'TRACKER', 'brand_id' => 2]);
        Modelo::create(['name' => 'CAPTIVA', 'brand_id' => 2]);
        Modelo::create(['name' => 'TRAVERSE', 'brand_id' => 2]);
        Modelo::create(['name' => 'TAHOE', 'brand_id' => 2]);
        Modelo::create(['name' => 'SUBURBAN', 'brand_id' => 2]);
        Modelo::create(['name' => 'COLORADO', 'brand_id' => 2]);
        Modelo::create(['name' => 'PRISMA', 'brand_id' => 2]);
        Modelo::create(['name' => 'EQUINOX', 'brand_id' => 2]);
        Modelo::create(['name' => 'ONIX', 'brand_id' => 2]);
        Modelo::create(['name' => 'ORLANDO', 'brand_id' => 2]);
        Modelo::create(['name' => 'N300 MAX', 'brand_id' => 2]);
        Modelo::create(['name' => 'N300 MOVE', 'brand_id' => 2]);
        Modelo::create(['name' => 'N300 CARGO', 'brand_id' => 2]);
        Modelo::create(['name' => 'N300 WORK', 'brand_id' => 2]);
        Modelo::create(['name' => 'TRAILBLAZER', 'brand_id' => 2]);

        IdType::create(['name' => 'REGISTRO UNICO DE CONTRIBUYENTE', 'symbol' => 'RUC', 'code' => '6']);
        IdType::create(['name' => 'DOCUMENTO NACIONAL DE IDENTIDAD', 'symbol' => 'DNI', 'code' => '1']);
        IdType::create(['name' => 'CARNET DE EXTRANJERÍA', 'symbol' => 'CEX', 'code' => '4']);
        IdType::create(['name' => 'PASAPORTE', 'symbol' => 'PAS', 'code' => '7']);
        IdType::create(['name' => 'CED. DIPLOMATICA DE IDENTIDAD', 'symbol' => 'CED', 'code' => 'A']);
        IdType::create(['name' => 'DOC.TRIB.NO.DOM.SIN.RUC', 'symbol' => 'NDO', 'code' => '0']);
        IdType::create(['name' => 'VARIOS', 'symbol' => 'S/D', 'code' => '-']);

        Job::create(['name' => 'ADMINISTRADOR DEL SISTEMA']);
        Job::create(['name' => 'MATIZADOR']);
        Job::create(['name' => 'PINTOR']);
        Job::create(['name' => 'SUPERVISOR']);


        Employee::create(['name' => 'NOEL', 'paternal_surname'=>'HUILLCA', 'maternal_surname'=>'HUAMANI', 'full_name'=>'HUILLCA HUAMANI NOEL', 'id_type_id'=>'2', 'doc'=>'44243484', 'job_id'=>'1', 'gender'=>'0', 'address'=>'JR. LAS GROSELLAS 910', 'ubigeo_id'=>'1306', 'user_id'=>'1', 'email_company' => '']);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000001', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'2', 'email_company' => '', 'company_id' => 1]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000002', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'3', 'email_company' => '', 'company_id' => 2]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000003', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'4', 'email_company' => '', 'company_id' => 3]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000004', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'5', 'email_company' => '', 'company_id' => 4]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000005', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'6', 'email_company' => '', 'company_id' => 5]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000006', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'7', 'email_company' => '', 'company_id' => 6]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000007', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'8', 'email_company' => '', 'company_id' => 7]);
        Employee::create(['name' => strtoupper($faker->firstNameMale), 'paternal_surname' => strtoupper($faker->lastName), 'maternal_surname' => strtoupper($faker->lastName), 'full_name'=>strtoupper($faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName), 'id_type_id'=>'2', 'doc'=>'08000008', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'9', 'email_company' => '', 'company_id' => 8]);


        Company::create(['company_name'=>'basf', 'id_type_id'=>'1', 'doc'=>'20000000001', 'address'=> strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_my_company'=>1]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000002', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name'  => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000003', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000004', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000005', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 2]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000006', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 2]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000007', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 3]);
        Company::create(['company_name' => strtoupper($faker->company), 'id_type_id'=>'1', 'doc'=>'20000000008', 'address'=>strtoupper($faker->address), 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 4]);

        $w=Warehouse::create(['company_id' => 5, 'provider_id' => 2, 'name' => 'CAMACHO', 'ubigeo_id' => 1309, 'address' => strtoupper($faker->address)]);
        $w->employees()->sync([2,6]);
        $w=Warehouse::create(['company_id' => 6, 'provider_id' => 2, 'name' => 'CAMPOY', 'ubigeo_id' => 1309, 'address' => strtoupper($faker->address)]);
        $w->employees()->sync([3,7]);
        $w=Warehouse::create(['company_id' => 7, 'provider_id' => 3, 'name' => 'ZARATE', 'ubigeo_id' => 1309, 'address' => strtoupper($faker->address)]);
        $w->employees()->sync([4,8]);
        $w=Warehouse::create(['company_id' => 8, 'provider_id' => 4, 'name' => 'LINCE', 'ubigeo_id' => 1309, 'address' => strtoupper($faker->address)]);
        $w->employees()->sync([5,9]);



        PermissionGroup::create(['name' => 'SISTEMAS']);
        PermissionGroup::create(['name' => 'ADMINISTRACION']);
        PermissionGroup::create(['name' => 'ALMACEN']);
        PermissionGroup::create(['name' => 'LOGISTICA']);
        PermissionGroup::create(['name' => 'VENTAS']);
        PermissionGroup::create(['name' => 'FINANZAS']);
        PermissionGroup::create(['name' => 'RECURSOS HUMANOS']);
        PermissionGroup::create(['name' => 'PRODUCCION']);
        PermissionGroup::create(['name' => 'CONTABILIDAD']);

        // Usuarios
        $p=Permission::create(['name' => 'Contraseña Editar', 'action' => 'change_password', 'permission_group_id' => 1]);
        $p->roles()->sync([1,2,3,4]);
        $p=Permission::create(['name' => 'Contraseña Actualizar', 'action' => 'update_password', 'permission_group_id' => 1]);
        $p->roles()->sync([1,2,3,4]);
        $p=Permission::create(['name' => 'Usuarios Listar', 'action' => 'users.index', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Usuarios Ver', 'action' => 'users.show', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Usuarios Crear', 'action' => 'users.create', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Usuarios Editar', 'action' => 'users.edit', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Usuarios Eliminar', 'action' => 'users.destroy', 'permission_group_id' => 1]);
        // Roles
        $p=Permission::create(['name' => 'Roles Listar', 'action' => 'roles.index', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Roles Ver', 'action' => 'roles.show', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Roles Crear', 'action' => 'roles.create', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Roles Editar', 'action' => 'roles.edit', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Roles Eliminar', 'action' => 'roles.destroy', 'permission_group_id' => 1]);
        // Grupos
        $p=Permission::create(['name' => 'Grupos Listar', 'action' => 'permission_groups.index', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Grupos Ver', 'action' => 'permission_groups.show', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Grupos Crear', 'action' => 'permission_groups.create', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Grupos Editar', 'action' => 'permission_groups.edit', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Grupos Eliminar', 'action' => 'permission_groups.destroy', 'permission_group_id' => 1]);
        // Permisos
        $p=Permission::create(['name' => 'Permisos Listar', 'action' => 'permissions.index', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Permisos Ver', 'action' => 'permissions.show', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Permisos Crear', 'action' => 'permissions.create', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Permisos Editar', 'action' => 'permissions.edit', 'permission_group_id' => 1]);
        $p=Permission::create(['name' => 'Permisos Eliminar', 'action' => 'permissions.destroy', 'permission_group_id' => 1]);
        // Tipos de Unidad
        $p=Permission::create(['name' => 'Tipos de Unidad Listar', 'action' => 'unit_types.index', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Tipos de Unidad Ver', 'action' => 'unit_types.show', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Tipos de Unidad Crear', 'action' => 'unit_types.create', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Tipos de Unidad Editar', 'action' => 'unit_types.edit', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Tipos de Unidad Eliminar', 'action' => 'unit_types.destroy', 'permission_group_id' => 3]);
        // Unidad
        $p=Permission::create(['name' => 'Unidad Listar', 'action' => 'units.index', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Unidad Ver', 'action' => 'units.show', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Unidad Crear', 'action' => 'units.create', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Unidad Editar', 'action' => 'units.edit', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Unidad Eliminar', 'action' => 'units.destroy', 'permission_group_id' => 3]);
        // Categorías
        $p=Permission::create(['name' => 'Categorías Listar', 'action' => 'categories.index', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Categorías Ver', 'action' => 'categories.show', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Categorías Crear', 'action' => 'categories.create', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Categorías Editar', 'action' => 'categories.edit', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Categorías Eliminar', 'action' => 'categories.destroy', 'permission_group_id' => 3]);
        // Sub Categorías
        $p=Permission::create(['name' => 'Sub Categorías Listar', 'action' => 'sub_categories.index', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Sub Categorías Ver', 'action' => 'sub_categories.show', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Sub Categorías Crear', 'action' => 'sub_categories.create', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Sub Categorías Editar', 'action' => 'sub_categories.edit', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Sub Categorías Eliminar', 'action' => 'sub_categories.destroy', 'permission_group_id' => 3]);
        // Marcas
        $p=Permission::create(['name' => 'Marcas Listar', 'action' => 'brands.index', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Marcas Ver', 'action' => 'brands.show', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Marcas Crear', 'action' => 'brands.create', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Marcas Editar', 'action' => 'brands.edit', 'permission_group_id' => 3]);
        $p=Permission::create(['name' => 'Marcas Eliminar', 'action' => 'brands.destroy', 'permission_group_id' => 3]);
        // Almacenes
        $p=Permission::create(['name' => 'Almacenes Listar', 'action' => 'warehouses.index', 'permission_group_id' => 3]);
        $p->roles()->sync([4]);
        $p=Permission::create(['name' => 'Almacenes Ver', 'action' => 'warehouses.show', 'permission_group_id' => 3]);
        $p->roles()->sync([4]);
        $p=Permission::create(['name' => 'Almacenes Crear', 'action' => 'warehouses.create', 'permission_group_id' => 3]);
        $p->roles()->sync([4]);
        $p=Permission::create(['name' => 'Almacenes Editar', 'action' => 'warehouses.edit', 'permission_group_id' => 3]);
        $p->roles()->sync([4]);
        $p=Permission::create(['name' => 'Almacenes Eliminar', 'action' => 'warehouses.destroy', 'permission_group_id' => 3]);
        $p->roles()->sync([4]);
        // Productos
        $p=Permission::create(['name' => 'Productos Listar', 'action' => 'products.index', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Productos Ver', 'action' => 'products.show', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Productos Crear', 'action' => 'products.create', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Productos Editar', 'action' => 'products.edit', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Productos Eliminar', 'action' => 'products.destroy', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        // Tickets de E/S
        $p=Permission::create(['name' => 'Tickets de E/S Listar', 'action' => 'tickets.index', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Tickets de E/S Ver', 'action' => 'tickets.show', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Tickets de E/S Crear', 'action' => 'tickets.create', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Tickets de E/S Editar', 'action' => 'tickets.edit', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Tickets de E/S Eliminar', 'action' => 'tickets.destroy', 'permission_group_id' => 3]);
        $p->roles()->sync([2, 4]);
        // Documentos Identidad
        $p=Permission::create(['name' => 'Documentos Identidad Listar', 'action' => '.index', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Identidad Ver', 'action' => '.show', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Identidad Crear', 'action' => '.create', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Identidad Editar', 'action' => '.edit', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Identidad Eliminar', 'action' => '.destroy', 'permission_group_id' => 2]);
        // Empresas
        $p=Permission::create(['name' => 'Empresas Listar', 'action' => '.index', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Empresas Ver', 'action' => '.show', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Empresas Crear', 'action' => '.create', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Empresas Editar', 'action' => '.edit', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Empresas Eliminar', 'action' => '.destroy', 'permission_group_id' => 6]);
        // Monedas
        $p=Permission::create(['name' => 'Monedas Listar', 'action' => 'id_types.index', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Monedas Ver', 'action' => 'id_types.show', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Monedas Crear', 'action' => 'id_types.create', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Monedas Editar', 'action' => 'id_types.edit', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Monedas Eliminar', 'action' => 'id_types.destroy', 'permission_group_id' => 6]);
        // Documentos Comprobantes
        $p=Permission::create(['name' => 'Documentos Comprobantes Listar', 'action' => 'sub_categories.index', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Comprobantes Ver', 'action' => 'sub_categories.show', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Comprobantes Crear', 'action' => 'sub_categories.create', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Comprobantes Editar', 'action' => 'sub_categories.edit', 'permission_group_id' => 2]);
        $p=Permission::create(['name' => 'Documentos Comprobantes Eliminar', 'action' => 'sub_categories.destroy', 'permission_group_id' => 2]);
        // Condiciones de Pago
        $p=Permission::create(['name' => 'Condiciones de Pago Listar', 'action' => 'payment_conditions.index', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Condiciones de Pago Ver', 'action' => 'payment_conditions.show', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Condiciones de Pago Crear', 'action' => 'payment_conditions.create', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Condiciones de Pago Editar', 'action' => 'payment_conditions.edit', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Condiciones de Pago Eliminar', 'action' => 'payment_conditions.destroy', 'permission_group_id' => 6]);
        // Tipos de Cambio
        $p=Permission::create(['name' => 'Tipos de Cambio Listar', 'action' => 'exchanges.index', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Tipos de Cambio Ver', 'action' => 'exchanges.show', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Tipos de Cambio Crear', 'action' => 'exchanges.create', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Tipos de Cambio Editar', 'action' => 'exchanges.edit', 'permission_group_id' => 6]);
        $p=Permission::create(['name' => 'Tipos de Cambio Eliminar', 'action' => 'exchanges.destroy', 'permission_group_id' => 6]);
        // Cargos
        $p=Permission::create(['name' => 'Cargos Listar', 'action' => 'jobs.index', 'permission_group_id' => 7]);
        $p=Permission::create(['name' => 'Cargos Ver', 'action' => 'jobs.show', 'permission_group_id' => 7]);
        $p=Permission::create(['name' => 'Cargos Crear', 'action' => 'jobs.create', 'permission_group_id' => 7]);
        $p=Permission::create(['name' => 'Cargos Editar', 'action' => 'jobs.edit', 'permission_group_id' => 7]);
        $p=Permission::create(['name' => 'Cargos Eliminar', 'action' => 'jobs.destroy', 'permission_group_id' => 7]);
        // Empleados
        $p=Permission::create(['name' => 'Empleados Listar', 'action' => 'employees.index', 'permission_group_id' => 7]);
        $p->roles()->sync([1, 4]);
        $p=Permission::create(['name' => 'Empleados Ver', 'action' => 'employees.show', 'permission_group_id' => 7]);
        $p->roles()->sync([1, 4]);
        $p=Permission::create(['name' => 'Empleados Crear', 'action' => 'employees.create', 'permission_group_id' => 7]);
        $p->roles()->sync([1, 4]);
        $p=Permission::create(['name' => 'Empleados Editar', 'action' => 'employees.edit', 'permission_group_id' => 7]);
        $p->roles()->sync([1, 4]);
        $p=Permission::create(['name' => 'Empleados Eliminar', 'action' => 'employees.destroy', 'permission_group_id' => 7]);
        $p->roles()->sync([1, 4]);
        // Cotizaciones orders ocompra/servicio
        $p=Permission::create(['name' => 'Ordenes de Compra Filtrar', 'action' => 'quotes.filter', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        $p=Permission::create(['name' => 'Ordenes de Compra Listar', 'action' => 'quotes.index', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        $p=Permission::create(['name' => 'Ordenes de Compra Ver', 'action' => 'quotes.show', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        $p=Permission::create(['name' => 'Ordenes de Compra Crear', 'action' => 'quotes.create', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        $p=Permission::create(['name' => 'Ordenes de Compra Editar', 'action' => 'quotes.edit', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        $p=Permission::create(['name' => 'Ordenes de Compra Eliminar', 'action' => 'quotes.destroy', 'permission_group_id' => 5]);
        $p->roles()->sync([3, 4]);
        // Orders despacho
        $p=Permission::create(['name' => 'Despachos Filtrar', 'action' => 'orders.filter', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Despachos Listar', 'action' => 'orders.index', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Despachos Ver', 'action' => 'orders.show', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Despachos Crear', 'action' => 'orders.create', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Despachos Editar', 'action' => 'orders.edit', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        $p=Permission::create(['name' => 'Despachos Eliminar', 'action' => 'orders.destroy', 'permission_group_id' => 5]);
        $p->roles()->sync([2, 4]);
        // Compras
        $p=Permission::create(['name' => 'Compras Listar', 'action' => 'purchases.index', 'permission_group_id' => 4]);
        $p=Permission::create(['name' => 'Compras Ver', 'action' => 'purchases.show', 'permission_group_id' => 4]);
        $p=Permission::create(['name' => 'Compras Crear', 'action' => 'purchases.create', 'permission_group_id' => 4]);
        $p=Permission::create(['name' => 'Compras Editar', 'action' => 'purchases.edit', 'permission_group_id' => 4]);
        $p=Permission::create(['name' => 'Compras Eliminar', 'action' => 'purchases.destroy', 'permission_group_id' => 4]);
        // // Control de Documentos
        // Permission::create(['name' => 'Control de Documentos Listar', 'action' => '.index', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Control de Documentos Ver', 'action' => '.show', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Control de Documentos Crear', 'action' => '.create', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Control de Documentos Editar', 'action' => '.edit', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Control de Documentos Eliminar', 'action' => '.destroy', 'permission_group_id' => '4']);
        // // Medios de Pago
        // Permission::create(['name' => 'Medios de Pago Listar', 'action' => '.index', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Medios de Pago Ver', 'action' => '.show', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Medios de Pago Crear', 'action' => '.create', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Medios de Pago Editar', 'action' => '.edit', 'permission_group_id' => '4']);
        // Permission::create(['name' => 'Medios de Pago Eliminar', 'action' => '.destroy', 'permission_group_id' => '4']);



        DocumentType::create(['name' => 'FACTURA', 'code' => '1', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'BOLETA', 'code' => '2', 'to_sales' => '1']);
        DocumentType::create(['name' => 'NOTA DE CRÉDITO', 'code' => '3', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'NOTA DE DÉBITO', 'code' => '4', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'INVOICE', 'code' => '91', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'OT', 'code' => '00']);
        DocumentType::create(['name' => 'TK', 'code' => '00']);

        DocumentControl::create(['document_type_id' => 1, 'company_id' => 1, 'series'=>'F001', 'number'=>0]);
        DocumentControl::create(['document_type_id' => 2, 'company_id' => 1, 'series'=>'B001', 'number'=>0]);
        DocumentControl::create(['document_type_id' => 3, 'company_id' => 1, 'series'=>'FC01', 'number'=>0]);
        DocumentControl::create(['document_type_id' => 3, 'company_id' => 1, 'series'=>'BC01', 'number'=>0]);
        DocumentControl::create(['document_type_id' => 4, 'company_id' => 1, 'series'=>'FD01', 'number'=>0]);
        DocumentControl::create(['document_type_id' => 4, 'company_id' => 1, 'series'=>'BD01', 'number'=>0]);

        PaymentCondition::create(['name' => 'CONTADO', 'to_sales' => '1', 'to_purchases' => '1']);
        PaymentCondition::create(['name' => 'CRÉDITO', 'to_sales' => '1', 'to_purchases' => '1']);
        
        UnitType::create(['name' => 'UNIDAD']);
        UnitType::create(['name' => 'LONGITUD']);
        UnitType::create(['name' => 'VOLUMEN']);
        UnitType::create(['name' => 'MASA']);

        Unit::create(['name' => 'UNIDAD', 'symbol' => 'und', 'unit_type_id' => 1, 'value' => 1, 'code' => 'NIU']); // 1
        Unit::create(['name' => 'GRAMO', 'symbol' => 'gr', 'unit_type_id' => 3, 'value' => 1, 'code' => '06']);
        Unit::create(['name' => 'KILOGRAMO', 'symbol' => 'kg', 'unit_type_id' => 2, 'value' => 1, 'code' => 'NIU']); // 9
        Unit::create(['name' => 'LITRO', 'symbol' => 'lt', 'unit_type_id' => 2, 'value' => 1000, 'code' => '08']);
        Unit::create(['name' => 'GALON', 'symbol' => 'gal', 'unit_type_id' => 2, 'value' => 3785.4, 'code' => '09']);
        // Unit::create(['name' => 'PARES', 'symbol' => 'prs', 'unit_type_id' => 1, 'value' => 2, 'code' => 'NIU']); // 2
        // Unit::create(['name' => 'DECENA', 'symbol' => 'dec', 'unit_type_id' => 1, 'value' => 10, 'code' => 'NIU']); // 3
        // Unit::create(['name' => 'CIENTO', 'symbol' => 'cto', 'unit_type_id' => 1, 'value' => 100, 'code' => 'NIU']); // 4
        // Unit::create(['name' => 'GRUEZA', 'symbol' => 'dec', 'unit_type_id' => 1, 'value' => 1728, 'code' => 'NIU']); // 5
        // Unit::create(['name' => 'MILLAR', 'symbol' => 'mill', 'unit_type_id' => 1, 'value' => 1000, 'code' => 'NIU']); // 6

        // Unit::create(['name' => 'SET', 'symbol' => 'set', 'unit_type_id' => 1, 'value' => 1728, 'code' => 'NIU']); // 7
        // Unit::create(['name' => 'METRO', 'symbol' => 'mt', 'unit_type_id' => 4, 'value' => 1, 'code' => 'NIU']); // 8


        // Unit::create(['name' => 'CENTIMETRO', 'symbol' => 'cm', 'unit_type_id' => 4, 'value' => 1, 'code' => '']);
        // Unit::create(['name' => 'KILOMETRO', 'symbol' => 'km', 'unit_type_id' => 4, 'value' => 100000, 'code' => '']);
        // Unit::create(['name' => 'PULGADA', 'symbol' => 'pulg', 'unit_type_id' => 4, 'value' => 2.54, 'code' => '']);
        // Unit::create(['name' => 'PIE', 'symbol' => 'pie', 'unit_type_id' => 4, 'value' => 30.48, 'code' => '']);
        // Unit::create(['name' => 'YARDA', 'symbol' => 'yar', 'unit_type_id' => 4, 'value' => 91.44, 'code' => '']);
        // Unit::create(['name' => 'MILLA', 'symbol' => 'milla', 'unit_type_id' => 4, 'value' => 160934, 'code' => '']);
        // Unit::create(['name' => 'MILILITRO', 'symbol' => 'ml', 'unit_type_id' => 2, 'value' => 1, 'code' => '']);
        // Unit::create(['name' => 'METRO CUBICO', 'symbol' => 'm3', 'unit_type_id' => 2, 'value' => 1000000, 'code' => '']);
        // Unit::create(['name' => 'PULGADA CUBICA', 'symbol' => 'pulg3', 'unit_type_id' => 2, 'value' => 16.3871, 'code' => '']);
        // Unit::create(['name' => 'PIE CUBICO', 'symbol' => 'pie3', 'unit_type_id' => 2, 'value' => 28317, 'code' => '']);
        // Unit::create(['name' => 'TONELADA', 'symbol' => 'ton', 'unit_type_id' => 3, 'value' => 1000000, 'code' => '04']);
        // Unit::create(['name' => 'ONZA', 'symbol' => 'oz', 'unit_type_id' => 3, 'value' => 28.349, 'code' => '']);
        // Unit::create(['name' => 'LIBRA', 'symbol' => 'lb', 'unit_type_id' => 3, 'value' => 453.59, 'code' => '02']);

        Currency::create(['name' => 'SOLES', 'symbol' => 'S/', 'code' => '1']);
        Currency::create(['name' => 'DOLARES AMERICANOS', 'symbol' => 'US$', 'code' => '2']);
        // Currency::create(['name' => 'EUROS', 'symbol' => '€', 'code' => '3']);

        Exchange::create(['date' => date('Y-m-d'), 'currency_id' => 1, 'sales' => 3, 'purchase' => 3]);

        Category::create(['name' => 'PINTURA', 'code' => '01']);
        Category::create(['name' => 'DIRECTOS', 'code' => '01']);
        Category::create(['name' => 'INDIRECTOS', 'code' => '01']);
        // Category::create(['name' => 'PRODUCTO TERMINADO', 'code' => '02']);
        // Category::create(['name' => 'MATERIA PRIMA', 'code' => '03']);
        // Category::create(['name' => 'ENVASES Y EMBALAJES', 'code' => '04']);
        // Category::create(['name' => 'SUMINISTROS DIVERSOS', 'code' => '05']);
        // Category::create(['name' => 'HERRAMIENTAS', 'code' => '']);
        // Category::create(['name' => 'SERVICIOS', 'code' => '']);

        SubCategory::create(['name' => 'BARNICES', 'category_id' => 1]);
        SubCategory::create(['name' => 'BÁSICOS L-11 (EDIC.LIMITADA)', 'category_id' => 1]);
        SubCategory::create(['name' => 'BÁSICOS L-11 (PERLAS MULTIEFECTO)', 'category_id' => 1]);
        SubCategory::create(['name' => 'BÁSICOS L-22 (POLIURETANO BRILLO DIRECTO)', 'category_id' => 1]);
        SubCategory::create(['name' => 'BÁSICOS L-55 (POLIÉSTER)', 'category_id' => 1]);
        SubCategory::create(['name' => 'BÁSICOS L-90 (BASE AGUA)', 'category_id' => 1]);
        SubCategory::create(['name' => 'DILUYENTES Y DESENGRASANTES', 'category_id' => 2]);
        SubCategory::create(['name' => 'IMPRIMACIÓN, APAREJO, SELLADOR', 'category_id' => 1]);
        SubCategory::create(['name' => 'PROCESIVOS PULITURA', 'category_id' => 2]);
        SubCategory::create(['name' => 'PROCESIVOS VARIOS', 'category_id' => 2]);
        SubCategory::create(['name' => 'DILUYENTES Y DESENGRASANTES', 'category_id' => 3]);
        SubCategory::create(['name' => 'PROCESIVOS PULITURA', 'category_id' => 3]);
        SubCategory::create(['name' => 'PROCESIVOS VARIOS', 'category_id' => 3]);

        // SubCategory::create(['name' => 'AUTOMOTRIZ', 'category_id' => 1]);
        // SubCategory::create(['name' => 'CERRAJERIA PARA MADERA Y VIDRIO', 'category_id' => 1]);
        // SubCategory::create(['name' => 'ELECTRONICA', 'category_id' => 1]);
        // SubCategory::create(['name' => 'GASFITERIA', 'category_id' => 1]);
        // SubCategory::create(['name' => 'GENERICOS', 'category_id' => 1]);
        // SubCategory::create(['name' => 'ILUMINACION Y ELECTRICIDAD', 'category_id' => 1]);
        // SubCategory::create(['name' => 'INTERNO', 'category_id' => 1]);
        // SubCategory::create(['name' => 'MAQUINARIAS, HERRAMIENTAS Y REPUESTOS', 'category_id' => 1]);
        // SubCategory::create(['name' => 'MATERIALES Y ACABADOS DE CONSTRUCCION', 'category_id' => 1]);
        // SubCategory::create(['name' => 'SEGURIDAD INDUSTRIAL Y PROTECCION PERSONAL', 'category_id' => 1]);


        // Brand::create(['name' => 'ADVANCED', 'is_car' => '0']);
        // Brand::create(['name' => 'EUROCOLUMBUS', 'is_car' => '0']);
        // Brand::create(['name' => 'FAMED LODZ', 'is_car' => '0']);
        // Brand::create(['name' => 'FAMED ZYWIEC', 'is_car' => '0']);
        // Brand::create(['name' => 'GMM', 'is_car' => '0']);
        // Brand::create(['name' => 'HERSILL', 'is_car' => '0']);
        // Brand::create(['name' => 'NEUMOVENT', 'is_car' => '0']);
        // Brand::create(['name' => 'PROHS', 'is_car' => '0']);
        // Brand::create(['name' => 'TSE', 'is_car' => '0']);
        // Brand::create(['name' => 'ZOLL', 'is_car' => '0']);


    }
}