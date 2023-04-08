<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="#">
    <img src="../logo.png" alt="Logo" height="70">
  </a>
</div>

## Companies

## Installation

1. Run install.sh via terminal or manually move files to their corresponding directories

1. Create migration
   ```
    php artisan make:migration create_companies_table
   ```
1. Update migration
   ```
   public function up(): void
   {
       Schema::create('companies', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->string('description');
           $table->string('email')->unique();
           $table->string('telephone')->unique();
           $table->string('address');
           $table->string('website')->unique();
           $table->string('photo')->nullable();
           $table->string('banner')->nullable();
           $table->boolean('is_active');
           $table->timestamps();
       });
   }
   ```
1. Run Migration
   ```
   php artisan migrate
   ```
1. Create permissions
   ```
   INSERT INTO `permissions` (`company`, `name`, `code`) VALUES ('general.companies', 'general.list_companies', 'list_companies');
   INSERT INTO `permissions` (`company`, `name`, `code`) VALUES ('general.companies', 'general.create_companies', 'create_companies');
   INSERT INTO `permissions` (`company`, `name`, `code`) VALUES ('general.companies', 'general.view_companies', 'view_companies');
   INSERT INTO `permissions` (`company`, `name`, `code`) VALUES ('general.companies', 'general.edit_companies', 'edit_companies');
   INSERT INTO `permissions` (`company`, `name`, `code`) VALUES ('general.companies', 'general.delete_companies', 'delete_companies');
   ```

1. Add routes
   ```
   use App\Http\Controllers\Backend\CompanyController as BackendCompanyController;
   
   Route::prefix('companies')->name('companies.')->group(function () {
       Route::get('/', [BackendCompanyController::class, 'index'])->name('index')->middleware('has.permission.to:list_companies');
       Route::get('/create', [BackendCompanyController::class, 'create'])->name('create')->middleware('has.permission.to:create_companies');
       Route::post('/store', [BackendCompanyController::class, 'store'])->name('store')->middleware('has.permission.to:create_companies');
       Route::get('/{company}', [BackendCompanyController::class, 'show'])->name('show')->middleware('has.permission.to:view_companies');
       Route::get('/{company}/edit', [BackendCompanyController::class, 'edit'])->name('edit')->middleware('has.permission.to:edit_companies');
       Route::patch('/{company}/update', [BackendCompanyController::class, 'update'])->name('update')->middleware('has.permission.to:edit_companies');
       Route::delete('/{company}/delete', [BackendCompanyController::class, 'delete'])->name('delete')->middleware('has.permission.to:delete_companies');
   });
   ```

1. Add menu item to sidebar.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_companies')
   <li class="sidebar-item">
       <a href="{{ route('backend.companies.index') }}" class="sidebar-link" data-menu-item="companies">
           <i class="bi bi-buildings"></i>
           <span>{{ __('general.companies') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_companies')
   <li class="submenu-item">
       <a href="{{ route('backend.companies.index') }}" data-menu-item="companies">{{ __('general.companies') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add menu link to header-horizontal.blade.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_companies')
   <li class="menu-item">
       <a href="{{ route('backend.companies.index') }}" class="menu-link" data-menu-item="companies">
            <span><i class="bi bi-buildings me-2"></i> {{ __('general.companies') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_companies')
   <li class="submenu-item">
       <a href="{{ route('backend.companies.index') }}" data-menu-item="companies">{{ __('general.companies') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add US lang entries (if applicable)
   ```
   'companies' => 'Companies',
   'create_company' => 'Create Company',
   'view_company' => 'View Company',
   'update_company' => 'Update Company',
   'list_companies' => 'List Companies',
   'create_companies' => 'Create Companies',
   'view_companies' => 'View Companies',
   'edit_companies' => 'Edit Companies',
   'delete_companies' => 'Delete Companies',
   'view_all_statuses' => 'Show all statuses',
   'active' => 'Active',
   'inactive' => 'Inactive',
   'name' => 'Name',
   'description' => 'Description',
   'email' => 'Email',
   'telephone' => 'Telephone',
   'address' => 'Address',
   'website' => 'Website',
   'photo' => 'Photo',
   'banner' => 'Banner',
   'status' => 'Status',
   ```

1. Add ES lang entries (if applicable)
   ```
   'companies' => 'Empresas',
   'create_company' => 'Crear Empresa',
   'view_company' => 'Ver Empresa',
   'update_company' => 'Actualizar Empresa',
   'list_companies' => 'Listar Empresas',
   'create_companies' => 'Crear Empresas',
   'view_companies' => 'Ver Empresas',
   'edit_companies' => 'Editar Empresas',
   'delete_companies' => 'Eliminar Empresas',
   'view_all_statuses' => 'Ver todos los estados',
   'active' => 'Activo',
   'inactive' => 'Inactivo',
   'name' => 'Nombre',
   'description' => 'Descripción',
   'email' => 'Correo',
   'telephone' => 'Teléfono',
   'address' => 'Dirección',
   'website' => 'Sitio Web',
   'photo' => 'Foto',
   'banner' => 'Banner',
   'status' => 'Estado',
   ```





