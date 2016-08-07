#!/bin/bash
##
## sync module files without git stuff
## USE WITH COUTION !!!
##
CDIR=`pwd`;

# sync 'admin' module
#
CSRC=$CDIR'/../module-admin'
TARGETS=(
    $CDIR'/module/Admin/'
);

echo $CSRC
for TARGET in ${TARGETS[@]}; do
    rsync -v -a --inplace --exclude='.{git|vagrant|report}*' $CSRC/config $CSRC/language $CSRC/src $CSRC/test* $CSRC/view $CSRC/Module.php $TARGET
done;


# sync 'ui-components' module
#
CSRC=$CDIR'/../module-uicomponents'
TARGETS=(
    $CDIR'/module/UIComponents/'
);

echo $CSRC
for TARGET in ${TARGETS[@]}; do
    rsync -v -a --inplace --exclude='.{git|vagrant|report}*' $CSRC/config $CSRC/language $CSRC/src $CSRC/test* $CSRC/view $CSRC/Module.php $TARGET
done;

exit;

