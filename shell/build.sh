# prepare build dir
rm -rf build
mkdir -p build

# copy files
cp -rp config module public shell sql build/
cp -rp LICENSE.txt README.md init_autoloader.php build/
cp -p composer.build.json build/composer.json
cp -p .gitignore.build build/.gitignore
cp -p .gitlab-ci.yml build/
cp -p .scrutinizer.yml build/

# remove (local) configs
rm -rf build/config/**/*local.php

# remove git files
rm -rf build/module/**/.git 
rm -rf build/public/**/.git
rm -rf build/public/**/*/.git

# remove obsolete composer files
rm -rf build/module/**/composer* 
rm -rf build/public/**/composer*
rm -rf build/public/**/*/composer*

# remove test themes
rm -rf build/public/themes/adminlte 
rm -rf build/public/themes/lcars 
rm -rf build/public/themes/remark 
rm -rf build/public/themes/taurus

# other clean up
rm -rf build/module/UIComponents/tests

touch build/test.txt
