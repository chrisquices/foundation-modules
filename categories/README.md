<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="#">
    <img src="../logo.png" alt="Logo" height="70">
  </a>
</div>

## Categories

## Installation

1. Run install.sh via terminal or manually move files to their corresponding directories

1. Create migration
   ```
    php artisan make:migration create_categories_table
   ```
1. Update migration
   ```
   public function up(): void
   {
       Schema::create('categories', function (Blueprint $table) {
           $table->id();
           $table->string('name')->unique();
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
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.categories', 'general.list_categories', 'list_categories');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.categories', 'general.create_categories', 'create_categories');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.categories', 'general.view_categories', 'view_categories');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.categories', 'general.edit_categories', 'edit_categories');
   INSERT INTO `permissions` (`category`, `name`, `code`) VALUES ('general.categories', 'general.delete_categories', 'delete_categories');
   ```

1. Add routes
   ```
   use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
   
   Route::prefix('categories')->name('categories.')->group(function () {
       Route::get('/', [BackendCategoryController::class, 'index'])->name('index')->middleware('has.permission.to:list_categories');
       Route::get('/create', [BackendCategoryController::class, 'create'])->name('create')->middleware('has.permission.to:create_categories');
       Route::post('/store', [BackendCategoryController::class, 'store'])->name('store')->middleware('has.permission.to:create_categories');
       Route::get('/{category}', [BackendCategoryController::class, 'show'])->name('show')->middleware('has.permission.to:view_categories');
       Route::get('/{category}/edit', [BackendCategoryController::class, 'edit'])->name('edit')->middleware('has.permission.to:edit_categories');
       Route::patch('/{category}/update', [BackendCategoryController::class, 'update'])->name('update')->middleware('has.permission.to:edit_categories');
       Route::delete('/{category}/delete', [BackendCategoryController::class, 'delete'])->name('delete')->middleware('has.permission.to:delete_categories');
   });
   ```

1. Add menu item to sidebar.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_categories')
   <li class="sidebar-item">
       <a href="{{ route('backend.categories.index') }}" class="sidebar-link" data-menu-item="categories">
           <i class="bi bi-list"></i>
           <span>{{ __('general.categories') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_categories')
   <li class="submenu-item">
       <a href="{{ route('backend.categories.index') }}" data-menu-item="categories">{{ __('general.categories') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add menu link to header-horizontal.blade.php

   a) For first level menu item:
   ```
   @hasPermissionTo('list_categories')
   <li class="menu-item">
       <a href="{{ route('backend.categories.index') }}" class="menu-link" data-menu-item="categories">
            <span><i class="bi bi-list me-2"></i> {{ __('general.categories') }}</span>
       </a>
   </li>
   @endhasPermissionTo
   ```

   b) For second level menu item:
   ```
   @hasPermissionTo('list_categories')
   <li class="submenu-item">
       <a href="{{ route('backend.categories.index') }}" data-menu-item="categories">{{ __('general.categories') }}</a>
   </li>
   @endhasPermissionTo
   ```

1. Add US lang entries (if applicable)
   ```
   'categories' => 'Categories',
   'create_category' => 'Create Category',
   'view_category' => 'View Category',
   'update_category' => 'Update Category',
   'list_categories' => 'List Categories',
   'create_categories' => 'Create Categories',
   'view_categories' => 'View Categories',
   'edit_categories' => 'Edit Categories',
   'delete_categories' => 'Delete Categories',
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
   'categories' => 'Categorías',
   'create_category' => 'Crear Categoría',
   'view_category' => 'Ver Categoría',
   'update_category' => 'Actualizar Categoría',
   'list_categories' => 'Listar Categorías',
   'create_categories' => 'Crear Categorías',
   'view_categories' => 'Ver Categorías',
   'edit_categories' => 'Editar Categorías',
   'delete_categories' => 'Eliminar Categorías',
   'view_all_statuses' => 'Ver todos los estados',
   'active' => 'Activo',
   'inactive' => 'Inactivo',
   'name' => 'Nombre',
   'code' => 'Código',
   'photo' => 'Foto',
   'status' => 'Estado',
   ```





