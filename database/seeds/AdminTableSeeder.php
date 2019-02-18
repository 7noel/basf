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
use App\Modules\Base\DocumentType;
use App\Modules\Base\DocumentControl;
use App\Modules\Finances\PaymentCondition;
use App\Modules\Sales\Modelo;
use App\Modules\HumanResources\Job;
use App\Modules\HumanResources\Employee;
use App\Modules\Finances\Bank;

use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        User::create(['name' => 'Noel', 'email' => 'noel.logan@gmail.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'MAT_001', 'email' => 'matizador_001@gmail.com', 'password' => '123', 'is_superuser' => true]);

        Role::create(['name' => 'ADMINISTRADOR DE SISTEMA']);
        Role::create(['name' => 'MATIZADOR']);
        Role::create(['name' => 'PINTOR']);
        Role::create(['name' => 'ADMINISTRADOR']);

        // UserRole::create(['user_id' => 1, 'role_id' => 1]);
        // UserRole::create(['user_id' => 2, 'role_id' => 5]);
        // UserRole::create(['user_id' => 3, 'role_id' => 6]);
        // UserRole::create(['user_id' => 4, 'role_id' => 6]);
        // UserRole::create(['user_id' => 5, 'role_id' => 6]);
        // UserRole::create(['user_id' => 6, 'role_id' => 2]);
        // UserRole::create(['user_id' => 7, 'role_id' => 6]);
        // UserRole::create(['user_id' => 8, 'role_id' => 3]);
        // UserRole::create(['user_id' => 9, 'role_id' => 7]);
        //Role::create(['name' => 'JEFE DE ALMACEN']);
        //Role::create(['name' => 'ASISTENTE DE ALMACEN']);
        //Role::create(['name' => 'JEFE DE COMPRAS']);
        //Role::create(['name' => 'ASISTENTE DE ADV']);
        //Role::create(['name' => 'JEFE DE VENTAS']);
        //Role::create(['name' => 'RECEPCIONISTA']);

        IdType::create(['name' => 'REGISTRO UNICO DE CONTRIBUYENTE', 'symbol' => 'RUC', 'code' => '6']);
        IdType::create(['name' => 'DOCUMENTO NACIONAL DE IDENTIDAD', 'symbol' => 'DNI', 'code' => '1']);
        IdType::create(['name' => 'CARNET DE EXTRANJERÍA', 'symbol' => 'CEX', 'code' => '4']);
        IdType::create(['name' => 'PASAPORTE', 'symbol' => 'PAS', 'code' => '7']);
        IdType::create(['name' => 'CED. DIPLOMATICA DE IDENTIDAD', 'symbol' => 'CED', 'code' => 'A']);
        IdType::create(['name' => 'DOC.TRIB.NO.DOM.SIN.RUC', 'symbol' => 'NDO', 'code' => '0']);
        IdType::create(['name' => 'VARIOS', 'symbol' => 'S/D', 'code' => '-']);

        Job::create(['name' => 'ANALISTA DE SISTEMAS']);
        Job::create(['name' => 'MATIZADOR']);
        Job::create(['name' => 'PINTOR']);

        Employee::create(['name' => 'NOEL', 'paternal_surname'=>'HUILLCA', 'maternal_surname'=>'HUAMANI', 'full_name'=>'HUILLCA HUAMANI NOEL', 'id_type_id'=>'2', 'doc'=>'44243484', 'job_id'=>'1', 'gender'=>'0', 'address'=>'JR. LAS GROSELLAS 910', 'ubigeo_id'=>'1306', 'user_id'=>'1', 'email_company' => '']);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000001', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'1', 'email_company' => '', 'Warehouse_id' => 1]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000002', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 2]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000003', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 3]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000004', 'job_id'=>'2', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 4]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000005', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 1]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000006', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 2]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000007', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 3]);
        Employee::create(['name' => $faker->firstNameMale, 'paternal_surname' => $faker->lastName, 'maternal_surname' => $faker->lastName, 'full_name'=>$faker->firstNameMale.' '.$faker->lastName.' '.$faker->lastName, 'id_type_id'=>'2', 'doc'=>'08000008', 'job_id'=>'3', 'gender'=>'0', 'address'=>$faker->address, 'ubigeo_id'=>'1306', 'user_id'=>'0', 'email_company' => '', 'Warehouse_id' => 4]);


        Company::create(['company_name'=>'basf', 'id_type_id'=>'1', 'doc'=>'20000000001', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_my_company'=>1]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000002', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name'  => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000003', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000004', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_provider'=>1]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000005', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 2]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000006', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 2]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000007', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 3]);
        Company::create(['company_name' => $faker->company, 'id_type_id'=>'1', 'doc'=>'20000000008', 'address'=>$faker->address, 'ubigeo_id'=>'1307', 'country_id' => 1465, 'is_client'=>1, 'provider_id' => 4]);

        Warehouse::create(['company_id' => 5, 'name' => 'CAMACHO', 'ubigeo_id' => 1309, 'address' => $faker->address]);
        Warehouse::create(['company_id' => 6, 'name' => 'CAMPOY', 'ubigeo_id' => 1309, 'address' => $faker->address]);
        Warehouse::create(['company_id' => 7, 'name' => 'ZARATE', 'ubigeo_id' => 1309, 'address' => $faker->address]);
        Warehouse::create(['company_id' => 8, 'name' => 'LINCE', 'ubigeo_id' => 1309, 'address' => $faker->address]);



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
        Permission::create(['name' => 'Contraseña Editar', 'action' => 'change_password', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Contraseña Actualizar', 'action' => 'update_password', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Usuarios Listar', 'action' => 'users.index', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Usuarios Ver', 'action' => 'users.show', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Usuarios Crear', 'action' => 'users.create', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Usuarios Editar', 'action' => 'users.edit', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Usuarios Eliminar', 'action' => 'users.destroy', 'permission_group_id' => 1]);
        // Roles
        Permission::create(['name' => 'Roles Listar', 'action' => 'roles.index', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Roles Ver', 'action' => 'roles.show', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Roles Crear', 'action' => 'roles.create', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Roles Editar', 'action' => 'roles.edit', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Roles Eliminar', 'action' => 'roles.destroy', 'permission_group_id' => 1]);
        // Grupos
        Permission::create(['name' => 'Grupos Listar', 'action' => 'permission_groups.index', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Grupos Ver', 'action' => 'permission_groups.show', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Grupos Crear', 'action' => 'permission_groups.create', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Grupos Editar', 'action' => 'permission_groups.edit', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Grupos Eliminar', 'action' => 'permission_groups.destroy', 'permission_group_id' => 1]);
        // Permisos
        Permission::create(['name' => 'Permisos Listar', 'action' => 'permissions.index', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Permisos Ver', 'action' => 'permissions.show', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Permisos Crear', 'action' => 'permissions.create', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Permisos Editar', 'action' => 'permissions.edit', 'permission_group_id' => 1]);
        Permission::create(['name' => 'Permisos Eliminar', 'action' => 'permissions.destroy', 'permission_group_id' => 1]);
        // Tipos de Unidad
        Permission::create(['name' => 'Tipos de Unidad Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tipos de Unidad Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tipos de Unidad Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tipos de Unidad Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tipos de Unidad Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Unidad
        Permission::create(['name' => 'Unidad Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Unidad Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Unidad Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Unidad Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Unidad Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Categorías
        Permission::create(['name' => 'Categorías Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Categorías Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Categorías Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Categorías Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Categorías Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Sub Categorías
        Permission::create(['name' => 'Sub Categorías Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Sub Categorías Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Sub Categorías Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Sub Categorías Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Sub Categorías Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Marcas
        Permission::create(['name' => 'Marcas Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Marcas Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Marcas Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Marcas Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Marcas Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Almacenes
        Permission::create(['name' => 'Almacenes Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Almacenes Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Almacenes Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Almacenes Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Almacenes Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Productos
        Permission::create(['name' => 'Productos Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Productos Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Productos Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Productos Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Productos Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Tickets de E/S
        Permission::create(['name' => 'Tickets de E/S Listar', 'action' => '.index', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tickets de E/S Ver', 'action' => '.show', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tickets de E/S Crear', 'action' => '.create', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tickets de E/S Editar', 'action' => '.edit', 'permission_group_id' => 3]);
        Permission::create(['name' => 'Tickets de E/S Eliminar', 'action' => '.destroy', 'permission_group_id' => 3]);
        // Documentos Identidad
        Permission::create(['name' => 'Documentos Identidad Listar', 'action' => '.index', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Identidad Ver', 'action' => '.show', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Identidad Crear', 'action' => '.create', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Identidad Editar', 'action' => '.edit', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Identidad Eliminar', 'action' => '.destroy', 'permission_group_id' => 2]);
        // Empresas
        Permission::create(['name' => 'Empresas Listar', 'action' => '.index', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Empresas Ver', 'action' => '.show', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Empresas Crear', 'action' => '.create', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Empresas Editar', 'action' => '.edit', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Empresas Eliminar', 'action' => '.destroy', 'permission_group_id' => 6]);
        // Monedas
        Permission::create(['name' => 'Monedas Listar', 'action' => '.index', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Monedas Ver', 'action' => '.show', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Monedas Crear', 'action' => '.create', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Monedas Editar', 'action' => '.edit', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Monedas Eliminar', 'action' => '.destroy', 'permission_group_id' => 6]);
        // Documentos Comprobantes
        Permission::create(['name' => 'Documentos Comprobantes Listar', 'action' => '.index', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Comprobantes Ver', 'action' => '.show', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Comprobantes Crear', 'action' => '.create', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Comprobantes Editar', 'action' => '.edit', 'permission_group_id' => 2]);
        Permission::create(['name' => 'Documentos Comprobantes Eliminar', 'action' => '.destroy', 'permission_group_id' => 2]);
        // Condiciones de Pago
        Permission::create(['name' => 'Condiciones de Pago Listar', 'action' => '.index', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Condiciones de Pago Ver', 'action' => '.show', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Condiciones de Pago Crear', 'action' => '.create', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Condiciones de Pago Editar', 'action' => '.edit', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Condiciones de Pago Eliminar', 'action' => '.destroy', 'permission_group_id' => 6]);
        // Tipos de Cambio
        Permission::create(['name' => 'Tipos de Cambio Listar', 'action' => '.index', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Tipos de Cambio Ver', 'action' => '.show', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Tipos de Cambio Crear', 'action' => '.create', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Tipos de Cambio Editar', 'action' => '.edit', 'permission_group_id' => 6]);
        Permission::create(['name' => 'Tipos de Cambio Eliminar', 'action' => '.destroy', 'permission_group_id' => 6]);
        // Cargos
        Permission::create(['name' => 'Cargos Listar', 'action' => '.index', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Cargos Ver', 'action' => '.show', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Cargos Crear', 'action' => '.create', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Cargos Editar', 'action' => '.edit', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Cargos Eliminar', 'action' => '.destroy', 'permission_group_id' => 7]);
        // Empleados
        Permission::create(['name' => 'Empleados Listar', 'action' => '.index', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Empleados Ver', 'action' => '.show', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Empleados Crear', 'action' => '.create', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Empleados Editar', 'action' => '.edit', 'permission_group_id' => 7]);
        Permission::create(['name' => 'Empleados Eliminar', 'action' => '.destroy', 'permission_group_id' => 7]);
        // Cotizaciones orders
        Permission::create(['name' => 'Cotizaciones Listar', 'action' => '.index', 'permission_group_id' => 5]);
        Permission::create(['name' => 'Cotizaciones Ver', 'action' => '.show', 'permission_group_id' => 5]);
        Permission::create(['name' => 'Cotizaciones Crear', 'action' => '.create', 'permission_group_id' => 5]);
        Permission::create(['name' => 'Cotizaciones Editar', 'action' => '.edit', 'permission_group_id' => 5]);
        Permission::create(['name' => 'Cotizaciones Eliminar', 'action' => '.destroy', 'permission_group_id' => 5]);
        // Compras
        Permission::create(['name' => 'Compras Listar', 'action' => '.index', 'permission_group_id' => 4]);
        Permission::create(['name' => 'Compras Ver', 'action' => '.show', 'permission_group_id' => 4]);
        Permission::create(['name' => 'Compras Crear', 'action' => '.create', 'permission_group_id' => 4]);
        Permission::create(['name' => 'Compras Editar', 'action' => '.edit', 'permission_group_id' => 4]);
        Permission::create(['name' => 'Compras Eliminar', 'action' => '.destroy', 'permission_group_id' => 4]);
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

        Category::create(['name' => 'PRODUCTO FINAL', 'code' => '01']);
        Category::create(['name' => 'ACCESORIOS', 'code' => '01']);
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
        SubCategory::create(['name' => 'DILUYENTES Y DESENGRASANTES', 'category_id' => 1]);
        SubCategory::create(['name' => 'IMPRIMACIÓN, APAREJO, SELLADOR', 'category_id' => 1]);
        SubCategory::create(['name' => 'PROCESIVOS PULITURA', 'category_id' => 1]);
        SubCategory::create(['name' => 'PROCESIVOS VARIOS', 'category_id' => 1]);

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


        Brand::create(['name' => 'ADVANCED', 'is_car' => '0']);
        Brand::create(['name' => 'EUROCOLUMBUS', 'is_car' => '0']);
        Brand::create(['name' => 'FAMED LODZ', 'is_car' => '0']);
        Brand::create(['name' => 'FAMED ZYWIEC', 'is_car' => '0']);
        Brand::create(['name' => 'GMM', 'is_car' => '0']);
        Brand::create(['name' => 'HERSILL', 'is_car' => '0']);
        Brand::create(['name' => 'NEUMOVENT', 'is_car' => '0']);
        Brand::create(['name' => 'PROHS', 'is_car' => '0']);
        Brand::create(['name' => 'TSE', 'is_car' => '0']);
        Brand::create(['name' => 'ZOLL', 'is_car' => '0']);


    }
}