<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="#">
    <img src="../logo.png" alt="Logo" height="70">
  </a>
</div>

## Nationalities

## Installation

1. Run install.sh via terminal or manually move files to their corresponding directories

1. Create migration
   ```
    php artisan make:migration create_nationalities_table
   ```
1. Update migration
   ```
   public function up(): void
   {
       Schema::create('nationalities', function (Blueprint $table) {
           $table->id();
           $table->string('name')->unique();
           $table->string('code')->unique();
           $table->string('photo')->nullable();
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
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.nationalities', 'general.list_nationalities', 'list_nationalities');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.nationalities', 'general.create_nationalities', 'create_nationalities');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.nationalities', 'general.view_nationalities', 'view_nationalities');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.nationalities', 'general.edit_nationalities', 'edit_nationalities');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.nationalities', 'general.delete_nationalities', 'delete_nationalities');
   ```

1. Add routes
   ```
   use App\Http\Controllers\Backend\NationalityController as BackendNationalityController;
   
   Route::prefix('nationalities')->name('nationalities.')->group(function () {
       Route::get('/', [BackendNationalityController::class, 'index'])->name('index')->middleware('has.permission.to:list_nationalities');
       Route::get('/create', [BackendNationalityController::class, 'create'])->name('create')->middleware('has.permission.to:create_nationalities');
       Route::post('/store', [BackendNationalityController::class, 'store'])->name('store')->middleware('has.permission.to:create_nationalities');
       Route::get('/{nationality}', [BackendNationalityController::class, 'show'])->name('show')->middleware('has.permission.to:view_nationalities');
       Route::get('/{nationality}/edit', [BackendNationalityController::class, 'edit'])->name('edit')->middleware('has.permission.to:edit_nationalities');
       Route::patch('/{nationality}/update', [BackendNationalityController::class, 'update'])->name('update')->middleware('has.permission.to:edit_nationalities');
       Route::delete('/{nationality}/delete', [BackendNationalityController::class, 'delete'])->name('delete')->middleware('has.permission.to:delete_nationalities');
   });
   ```

1. Add menu item to sidebar.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_nationalities')
   <li class="sidebar-item">
       <a href="{{ route('backend.nationalities.index') }}" class="sidebar-link" data-menu-item="nationalities">
           <i class="bi bi-globe"></i>
           <span>{{ __('general.nationalities') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_nationalities')
   <li class="submenu-item">
       <a href="{{ route('backend.nationalities.index') }}" data-menu-item="nationalities">{{ __('general.nationalities') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add menu link to header-horizontal.blade.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_nationalities')
   <li class="menu-item">
       <a href="{{ route('backend.nationalities.index') }}" class="menu-link" data-menu-item="nationalities">
            <span><i class="bi bi-globe me-2"></i> {{ __('general.nationalities') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_nationalities')
   <li class="submenu-item">
       <a href="{{ route('backend.nationalities.index') }}" data-menu-item="nationalities">{{ __('general.nationalities') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add US lang entries (if applicable)
   ```
   'nationalities' => 'Nationalities',
   'create_nationality' => 'Create Nationality',
   'view_nationality' => 'View Nationality',
   'update_nationality' => 'Update Nationality',
   'list_nationalities' => 'List Nationalities',
   'create_nationalities' => 'Create Nationalities',
   'view_nationalities' => 'View Nationalities',
   'edit_nationalities' => 'Edit Nationalities',
   'delete_nationalities' => 'Delete Nationalities',
   'view_all_statuses' => 'Show all statuses',
   'active' => 'Active',
   'inactive' => 'Inactive',
   'name' => 'Name',
   'code' => 'Code',
   'photo' => 'Photo',
   'status' => 'Status',
   ```

1. Add ES lang entries (if applicable)
   ```
   'nationalities' => 'Nacionalidades',
   'create_nationality' => 'Crear Nacionalidad',
   'view_nationality' => 'Ver Nacionalidad',
   'update_nationality' => 'Actualizar Nacionalidad',
   'list_nationalities' => 'Listar Nacionalidades',
   'create_nationalities' => 'Crear Nacionalidades',
   'view_nationalities' => 'Ver Nacionalidades',
   'edit_nationalities' => 'Editar Nacionalidades',
   'delete_nationalities' => 'Eliminar Nacionalidades',
   'view_all_statuses' => 'Ver todos los estados',
   'active' => 'Activo',
   'inactive' => 'Inactivo',
   'name' => 'Nombre',
   'code' => 'Código',
   'photo' => 'Foto',
   'status' => 'Estado',
   ```





