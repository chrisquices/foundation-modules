#!/bin/bash
echo -n "Foundation App Directory: "

read "directory"

echo "------------------------------------------"

echo "Copying files"

echo "------------------------------------------"

if cp "./app/Http/Controllers/Backend/CategoryController.php" "/$directory/app/Http/Controllers/Backend/CategoryController.php"
    then echo COPY SUCCESSFUL CategoryController.php
else
    echo COPY FAILED CategoryController.php
fi

echo "------------------------------------------"

if cp "./app/Http/Livewire/Backend/CategoriesIndex.php" "/$directory/app/Http/Livewire/Backend/CategoriesIndex.php"
    then echo COPY SUCCESSFUL CategoriesIndex.php
else
    echo COPY FAILED CategoriesIndex.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/StoreCategoryRequest.php" "/$directory/app/Http/Requests/Backend/StoreCategoryRequest.php"
    then echo COPY SUCCESSFUL StoreCategoryRequest.php
else
    echo COPY FAILED StoreCategoryRequest.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/UpdateCategoryRequest.php" "/$directory/app/Http/Requests/Backend/UpdateCategoryRequest.php"
    then echo COPY SUCCESSFUL UpdateCategoryRequest.php
else
    echo COPY FAILED UpdateCategoryRequest.php
fi

echo "------------------------------------------"

if cp "./app/Models/Category.php" "/$directory/app/Models/Category.php"
    then echo COPY SUCCESSFUL Category.php
else
    echo COPY FAILED Category.php
fi

echo "------------------------------------------"

if mkdir -p /$directory/resources/views/backend/categories
    then echo CREATE SUCCESSFUL categories
else
    echo CREATE FAILED categories
fi

echo "------------------------------------------"

if cp "./resources/views/backend/categories/create.blade.php" "/$directory/resources/views/backend/categories/create.blade.php"
    then echo COPY SUCCESSFUL create.blade.php
else
    echo COPY FAILED create.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/categories/edit.blade.php" "/$directory/resources/views/backend/categories/edit.blade.php"
    then echo COPY SUCCESSFUL edit.blade.php
else
    echo COPY FAILED edit.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/categories/index.blade.php" "/$directory/resources/views/backend/categories/index.blade.php"
    then echo COPY SUCCESSFUL index.blade.php
else
    echo COPY FAILED index.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/categories/show.blade.php" "/$directory/resources/views/backend/categories/show.blade.php"
    then echo COPY SUCCESSFUL show.blade.php
else
    echo COPY FAILED show.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/livewire/categories-index.blade.php" "/$directory/resources/views/backend/livewire/categories-index.blade.php"
    then echo COPY SUCCESSFUL categories-index.blade.php
else
    echo COPY FAILED categories-index.blade.php
fi
echo "------------------------------------------"
