#!/bin/bash
##
## copy current source files into a build container directory, ex: to prepare for deployment
##
BUILD_TARGET='build';

# prepare build dir 
# (when using the 'copy' version, uncomment the next line 'rm ...' to have a clean build directory)
#rm -rf build
mkdir -p $BUILD_TARGET


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
#cp -p .scrutinizer.yml build/

# application files
rsync -a --inplace --delete --exclude='.git*' --exclude='.vagrant*' --exclude='.report*' config module public shell sql $BUILD_TARGET/
rsync -a --inplace --delete --exclude='.git*' --exclude='.vagrant*' --exclude='.report*' --include='.gitlab*' LICENSE.txt README.md init_autoloader.php .gitlab* .scrutinizer.yml $BUILD_TARGET/
rsync -a --inplace --delete --exclude='.git*' --exclude='.vagrant*' --exclude='.report*' composer.build.json $BUILD_TARGET/composer.json

cp -v -p .gitlab-ci.yml build/


# vendor modules
rsync -a --inplace --delete --exclude='.git*' --exclude='.vagrant*' --exclude='.report*' vendor/slm/locale $BUILD_TARGET/module/SlmLocale

#
# removing files from build directory which should NOT be included with the build, like local 
# configurations, temporary files etc... (modify to your needs!)
#
echo 'removing files from build directory which should not be included with the build...';

# remove (local) configs
echo 'remove local configurations';
rm -rf $BUILD_TARGET/config/**/*local.php

# remove git files
echo 'remove local report files';
rm -rf $BUILD_TARGET/public/.report*

# remove git files
echo 'remove local (sub)git files';
rm -rf $BUILD_TARGET/module/**/.git*
rm -rf $BUILD_TARGET/public/**/.git*
rm -rf $BUILD_TARGET/public/**/*/.git*

# remove obsolete composer files
echo 'remove local (sub)composer files';
rm -rf $BUILD_TARGET/module/**/composer* 
rm -rf $BUILD_TARGET/public/**/composer*
rm -rf $BUILD_TARGET/public/**/*/composer*

# remove obsolete assets dev and build files
echo 'remove local dev and build files';
rm -rf $BUILD_TARGET/public/application-assets/.* 
rm -rf $BUILD_TARGET/public/application-assets/*.sh
rm -rf $BUILD_TARGET/public/application-assets/*.json
rm -rf $BUILD_TARGET/public/application-assets/package*  
rm -rf $BUILD_TARGET/public/application-assets/gulp*
rm -rf $BUILD_TARGET/public/application-assets/lib 
rm -rf $BUILD_TARGET/public/application-assets/src 
rm -rf $BUILD_TARGET/public/application-assets/test 
rm -rf $BUILD_TARGET/public/application-assets/CONTRIBUTING.md
rm -rf $BUILD_TARGET/public/application-assets/LICENSE.txt 
rm -rf $BUILD_TARGET/public/application-assets/README.md 

# remove test themes
echo 'remove local test themes';
#rm -rf $BUILD_TARGET/public/themes/foundation 
#rm -rf $BUILD_TARGET/public/themes/bootstrap 
rm -rf $BUILD_TARGET/public/themes/adminlte 
rm -rf $BUILD_TARGET/public/themes/lcars 
rm -rf $BUILD_TARGET/public/themes/remark 
rm -rf $BUILD_TARGET/public/themes/taurus

# other clean up
echo 'clean up...';
rm -rf $BUILD_TARGET/module/UIComponents/tests

exit
