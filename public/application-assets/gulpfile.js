var gulp = require('gulp');
var browser = require('browser-sync');
var requireDir = require('require-dir');
var sequence = require('run-sequence');
var exec = require('child_process').execSync;
var port = process.env.SERVER_PORT || 3000;

requireDir('./gulp');


//Writes a commit with the changes to the version numbers
gulp.task('commit', function(cb) {
  exec('git add .');
  exec('git commit -m "update css, js, assets"');
  exec('git push');
  cb();
});


//Writes a commit with the changes to the version numbers
gulp.task('devcopy', function(cb) {

  gulp.src('dist/**/*')
    .pipe(gulp.dest('../my-application/public/application-assets/dist'));

});


// Builds the documentation and framework files
gulp.task('prepare', function (cb) {
	sequence('clean', 'copy', 'docs:all', cb);
});

// Builds the documentation and framework files
gulp.task('completed', function (cb) {
  console.log('build completed at ' + (new Date).toString() + '...');
  //cb();
});

gulp.task('build', function (cb) {
	sequence('sass', 'javascript', 'deploy', function () {
    console.log('build completed at ' + (new Date).toString() + '...');
    cb();
  });
});

// Starts a BrowerSync instance
gulp.task('serve', ['prepare', 'build'], function(){
  console.log('serving...');
  browser.init({server: './_build', port: port});
});

//Runs all of the above tasks and then waits for files to change
gulp.task('default', ['prepare', 'build', 'watch']);

gulp.task('watch', function() {
  console.log('watching...');
  gulp.watch('src/**/*', ['build']);
  //gulp.watch('src/docs/**/*', ['docs', browser.reload]);
  //gulp.watch(['src/docs/layout/*.html', 'src/docs/partials/*.html'], ['docs:all', browser.reload]);
  //gulp.watch('src/scss/**/*', ['sass', browser.reload]);
  //gulp.watch('src/docs/assets/scss/**/*', ['sass:docs', browser.reload]);
  //gulp.watch('src/js/**/*', ['javascript:myapplication', browser.reload]);
  //gulp.watch('src/docs/assets/js/**/*', ['javascript:docs', browser.reload]);
});

// Runs all of the above tasks and then waits for files to change
//gulp.task('default', ['build', 'watch']);
