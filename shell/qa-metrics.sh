#!/bin/bash
#
# project code qualitiy assurance and testing script
#
SOURCE_PATH="./module"
PROJECT_NAME="application-base"
LOCAL_REPORT_PATH="./public/.reports"

# purge old reports in wiki
clear
mkdir -p $LOCAL_REPORT_PATH	
rm -rf $LOCAL_REPORT_PATH/*

# code beautifier & fixer
phpcbf $SOURCE_PATH --report=diff -vv > $LOCAL_REPORT_PATH/qa.code-beautifier-fixer.diff
git diff > $LOCAL_REPORT_PATH/qa.code-beautifier-fixer.git-head.diff

# phploc project size
phploc $SOURCE_PATH > $LOCAL_REPORT_PATH/qa.project-size.txt

# phpcpd copy&paste detection
phpcpd $SOURCE_PATH > $LOCAL_REPORT_PATH/qa.copy-paste-detection.txt

# pdepend project metrics
mkdir -p $LOCAL_REPORT_PATH/pdepend
pdepend --summary-xml=$LOCAL_REPORT_PATH/pdepend/summary.xml --jdepend-chart=$LOCAL_REPORT_PATH/pdepend/jdepend.svg --overview-pyramid=$LOCAL_REPORT_PATH/pdepend/pyramid.svg $SOURCE_PATH

# codesniffer project metrics
mkdir -p $LOCAL_REPORT_PATH/codesniffer
phpcs -s --report-file=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.report.txt --error-severity=1 --warning-severity=8 $SOURCE_PATH
phpcs -s --report-info=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.info.txt --error-severity=1 --warning-severity=8 $SOURCE_PATH
phpcs -s --report-summary=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.summary.txt --error-severity=1 --warning-severity=8 $SOURCE_PATH
phpcs -s --report-source=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.source.txt --error-severity=1 --warning-severity=8 $SOURCE_PATH
phpcs -s --report-full=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.full.txt --error-severity=1 --warning-severity=8 $SOURCE_PATH
phpcs -s --report-xml=$LOCAL_REPORT_PATH/codesniffer/qa.codesniffer.report.xml --error-severity=1 --warning-severity=8 $SOURCE_PATH

# phpmd project metrics
phpmd $SOURCE_PATH html "cleancode,codesize,controversial,design,naming,unusedcode" > $LOCAL_REPORT_PATH/qa.phpmd.html

# phpmetrics project metrics
phpmetrics --report-html=$LOCAL_REPORT_PATH/qa.phpmetrics.html $SOURCE_PATH

# phpunit
#composer update; 
mkdir -p $LOCAL_REPORT_PATH/phpunit

# phpunit (only application)
vendor/bin/phpunit --verbose --debug --configuration $SOURCE_PATH/Application/test/phpunit.xml --coverage-html $LOCAL_REPORT_PATH/phpunit --coverage-text=$LOCAL_REPORT_PATH/qa.phpunit.txt

# phpunit (all found from one level above)
#touch $LOCAL_REPORT_PATH/qa.phpunit.all.txt;
#find $SOURCE_PATH/../ -name "phpunit.xml" -exec vendor/bin/phpunit $PHPERRORS --verbose --debug --configuration {} >> $LOCAL_REPORT_PATH/qa.phpunit.all.txt \;
