#!/bin/bash
echo -n "Foundation App Directory: "

read "directory"

echo "------------------------------------------"

echo "Copying files"

echo "------------------------------------------"

if cp "./app/Http/Controllers/Backend/CompanyController.php" "/$directory/app/Http/Controllers/Backend/CompanyController.php"
    then echo COPY SUCCESSFUL CompanyController.php
else
    echo COPY FAILED CompanyController.php
fi

echo "------------------------------------------"

if cp "./app/Http/Livewire/Backend/CompaniesIndex.php" "/$directory/app/Http/Livewire/Backend/CompaniesIndex.php"
    then echo COPY SUCCESSFUL CompaniesIndex.php
else
    echo COPY FAILED CompaniesIndex.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/StoreCompanyRequest.php" "/$directory/app/Http/Requests/Backend/StoreCompanyRequest.php"
    then echo COPY SUCCESSFUL StoreCompanyRequest.php
else
    echo COPY FAILED StoreCompanyRequest.php
fi

echo "------------------------------------------"

if cp "./app/Http/Requests/Backend/UpdateCompanyRequest.php" "/$directory/app/Http/Requests/Backend/UpdateCompanyRequest.php"
    then echo COPY SUCCESSFUL UpdateCompanyRequest.php
else
    echo COPY FAILED UpdateCompanyRequest.php
fi

echo "------------------------------------------"

if cp "./app/Models/Company.php" "/$directory/app/Models/Company.php"
    then echo COPY SUCCESSFUL Company.php
else
    echo COPY FAILED Company.php
fi

echo "------------------------------------------"

if mkdir -p /$directory/resources/views/backend/companies
    then echo CREATE SUCCESSFUL companies
else
    echo CREATE FAILED companies
fi

echo "------------------------------------------"

if cp "./resources/views/backend/companies/create.blade.php" "/$directory/resources/views/backend/companies/create.blade.php"
    then echo COPY SUCCESSFUL create.blade.php
else
    echo COPY FAILED create.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/companies/edit.blade.php" "/$directory/resources/views/backend/companies/edit.blade.php"
    then echo COPY SUCCESSFUL edit.blade.php
else
    echo COPY FAILED edit.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/companies/index.blade.php" "/$directory/resources/views/backend/companies/index.blade.php"
    then echo COPY SUCCESSFUL index.blade.php
else
    echo COPY FAILED index.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/companies/show.blade.php" "/$directory/resources/views/backend/companies/show.blade.php"
    then echo COPY SUCCESSFUL show.blade.php
else
    echo COPY FAILED show.blade.php
fi

echo "------------------------------------------"

if cp "./resources/views/backend/livewire/companies-index.blade.php" "/$directory/resources/views/backend/livewire/companies-index.blade.php"
    then echo COPY SUCCESSFUL companies-index.blade.php
else
    echo COPY FAILED companies-index.blade.php
fi
echo "------------------------------------------"


#
