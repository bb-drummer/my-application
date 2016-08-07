#!/bin/bash
##
## deploy current build files to release repo
##
## @param string release-repo-target-path (ex: ../my-application)
##
CDIR=`pwd`;
BUILD_SRC='build';
TARGET1='/Volumes/BB.DATA.MOBILE.01/repositories/zf2/my-app.devel.local/';
TARGET2='dp_devel@devel.dragon-projects.net://var/www/vhosts/devel.dragon-projects.net/subdomains/mydemo-test/';
TARGET3='dp_devel@devel.dragon-projects.net://var/www/vhosts/devel.dragon-projects.net/subdomains/mydemo-test2/';

echo 'deploying build files to test hosts...';
echo 'target 1: ' $TARGET1;
echo 'target 1: ' $TARGET2;
echo 'target 2: ' $TARGET3;
echo 'source: ' $CDIR'/'$BUILD_SRC'/';


#
# syncronize files from build directory and release repo directory
#
cd $TARGET
echo 'syncronizing files from build and vendor directories to test hosts...';

# 'rsync' version, exclude .git* files to keep repo info *g* O:)
#
rsync -v -a --inplace --delete --exclude=".git*" --exclude=".vagrant*" --exclude=".report*" $CDIR/config $CDIR/module $CDIR/vendor $TARGET1
##cp -v $CDIR/config/autoload/*.local.php $TARGET1/config/autoload/
cp $CDIR/config/autoload/zfcuser.global.php $TARGET1/config/autoload/
cp $CDIR/config/autoload/recaptcha.local.php $TARGET1/config/autoload/

rsync -v -a --inplace --delete --exclude=".git*" --exclude=".vagrant*" --exclude=".report*" $CDIR/config $CDIR/module $CDIR/vendor $TARGET2
ssh dp_devel@devel.dragon-projects.net 'cp subdomains/mydemo/config/autoload/*.local.php subdomains/mydemo-test/config/autoload/'
scp $CDIR/config/autoload/zfcuser.global.php $TARGET2/config/autoload/
scp $CDIR/config/autoload/recaptcha.local.php $TARGET2/config/autoload/

rsync -v -a --inplace --delete --exclude=".git*" --exclude=".vagrant*" --exclude=".report*" $CDIR/config $CDIR/module $CDIR/vendor $TARGET3
ssh dp_devel@devel.dragon-projects.net 'cp subdomains/mydemo/config/autoload/*.local.php subdomains/mydemo-test2/config/autoload/'
scp $CDIR/config/autoload/zfcuser.global.php $TARGET3/config/autoload/
scp $CDIR/config/autoload/recaptcha.local.php $TARGET3/config/autoload/

exit;

