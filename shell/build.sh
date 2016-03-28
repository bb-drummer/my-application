#!/bin/bash
##
## copy current source files into a build container directory, ex: to prepare for deployment
##


# prepare build dir 
# (when using the 'copy' version, uncomment the next line 'rm ...' to have a clean build directory)
#rm -rf build
mkdir -p build


#
# copying directories and files which should be included with the build...
# (modify to your needs!)
#
echo 'copying files into build directory...';

# 'copy' version: this might cause analysers to detect 'false positive' changes 
# for files with unchanged content, because their dates have changed (!) ( 'hello' scrutinizer :D )
#
#cp -rp config module public shell sql build/
#cp -rp LICENSE.txt README.md init_autoloader.php build/
#cp -p composer.build.json build/composer.json
##cp -p .gitignore.build build/.gitignore
#cp -p .gitlab-ci.yml build/
#cp -p .scrutinizer.yml build/

# 'rsync' version
#
rsync -a --inplace --delete --exclude='.git*' config module public shell sql build/
rsync -a --inplace --delete --exclude='.git*' LICENSE.txt README.md init_autoloader.php .gitlab-ci.yml .scrutinizer.yml build/
rsync -a --inplace --delete --exclude='.git*' composer.build.json build/composer.json


#
# removing files from build directory which should NOT be included with the build, like local 
# configurations, temporary files etc... (modify to your needs!)
#
echo 'removing files from build directory which should not be included with the build...';

# remove (local) configs
echo 'remove local configurations';
rm -rf build/config/**/*local.php

# remove git files
echo 'remove local (sub)git files';
rm -rf build/module/**/.git*
rm -rf build/public/**/.git*
rm -rf build/public/**/*/.git*

# remove obsolete composer files
echo 'remove local (sub)composer files';
rm -rf build/module/**/composer* 
rm -rf build/public/**/composer*
rm -rf build/public/**/*/composer*

# remove obsolete assets dev and build files
echo 'remove local dev and build files';
rm -rf build/public/application-assets/.* 
rm -rf build/public/application-assets/*.sh
rm -rf build/public/application-assets/*.json
rm -rf build/public/application-assets/package*  
rm -rf build/public/application-assets/gulp*
rm -rf build/public/application-assets/lib 
rm -rf build/public/application-assets/src 
rm -rf build/public/application-assets/test 
rm -rf build/public/application-assets/CONTRIBUTING.md
rm -rf build/public/application-assets/LICENSE.txt 
rm -rf build/public/application-assets/README.md 

# remove test themes
echo 'remove local test themes';
#rm -rf build/public/themes/foundation 
#rm -rf build/public/themes/bootstrap 
rm -rf build/public/themes/adminlte 
rm -rf build/public/themes/lcars 
rm -rf build/public/themes/remark 
rm -rf build/public/themes/taurus

# other clean up
echo 'clean up...';
rm -rf build/module/UIComponents/tests

exit
