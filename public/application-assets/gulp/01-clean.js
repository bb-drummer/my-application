var gulp = require('gulp');
var rimraf = require('rimraf').sync;

// Erases the dist folder
gulp.task('clean', function(cb) {
  rimraf('_build');
  rimraf('dist');
  cb();
});
