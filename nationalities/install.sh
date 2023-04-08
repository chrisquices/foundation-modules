#!/bin/bash
echo -n "Foundation App Directory: "

read "directory"

echo "------------------------------------------"

echo "Copying files"

echo "------------------------------------------"

if cp "./app/Http/Controllers/Backend/NationalityController.php" "/$directory/app/Http/Controllers/Backend/NationalityController.php"
    then echo COPY SUCCESSFUL NationalityController.php 
else
    echo COPY FAILED NationalityController.php
fi

echo "------------------------------------------"

if cp "./app/Http/Livewire/Backend/NationalitiesIndex.php" "/$directory/app/Http/Livewire/Backend/NationalitiesIndex.php"
    then echo COPY SUCCESSFUL NationalitiesIndex.php 
else
    echo COPY FAILED NationalitiesIndex.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/StoreNationalityRequest.php" "/$directory/app/Http/Requests/Backend/StoreNationalityRequest.php"
    then echo COPY SUCCESSFUL StoreNationalityRequest.php 
else
    echo COPY FAILED StoreNationalityRequest.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/UpdateNationalityRequest.php" "/$directory/app/Http/Requests/Backend/UpdateNationalityRequest.php"
    then echo COPY SUCCESSFUL UpdateNationalityRequest.php 
else
    echo COPY FAILED UpdateNationalityRequest.php
fi

echo "------------------------------------------"

if cp "./app/Models/Nationality.php" "/$directory/app/Models/Nationality.php"
    then echo COPY SUCCESSFUL Nationality.php 
else
    echo COPY FAILED Nationality.php
fi

echo "------------------------------------------"

if mkdir -p /$directory/resources/views/backend/nationalities
    then echo CREATE SUCCESSFUL nationalities
else
    echo CREATE FAILED nationalities
fi

echo "------------------------------------------"

if cp "./resources/views/backend/nationalities/create.blade.php" "/$directory/resources/views/backend/nationalities/create.blade.php"
    then echo COPY SUCCESSFUL create.blade.php 
else
    echo COPY FAILED create.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/nationalities/edit.blade.php" "/$directory/resources/views/backend/nationalities/edit.blade.php"
    then echo COPY SUCCESSFUL edit.blade.php 
else
    echo COPY FAILED edit.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/nationalities/index.blade.php" "/$directory/resources/views/backend/nationalities/index.blade.php"
    then echo COPY SUCCESSFUL index.blade.php 
else
    echo COPY FAILED index.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/nationalities/show.blade.php" "/$directory/resources/views/backend/nationalities/show.blade.php"
    then echo COPY SUCCESSFUL show.blade.php 
else
    echo COPY FAILED show.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/livewire/nationalities-index.blade.php" "/$directory/resources/views/backend/livewire/nationalities-index.blade.php"
    then echo COPY SUCCESSFUL nationalities-index.blade.php 
else
    echo COPY FAILED nationalities-index.blade.php
fi
echo "------------------------------------------"


# 