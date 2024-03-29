var gulp = require('gulp');
var concat = require('gulp-concat');

var MYAPPLICATION = [
  'src/js/myapplication.core.js',
  'src/js/myapplication.config.js',
  'src/js/libs/*.js',
  'src/js/components/*.js',
  'src/js/modules/*.js',
  'src/js/myapplication.init.js'
];

var DEPS = [
  'node_modules/jquery/dist/jquery.js',
  'node_modules/motion-ui/dist/motion-ui.js',
  'node_modules/what-input/what-input.js'
];

var DOCS = [
  'node_modules/clipboard/dist/clipboard.js',
  'node_modules/corejs-typeahead/dist/typeahead.bundle.js',
  'src/docs/assets/js/docs.*.js',
  'src/docs/assets/js/docs.js'
];

gulp.task('javascript:myapplication', function() {
  return gulp.src(MYAPPLICATION)
    .pipe(concat('myapplication.js'))
    .pipe(gulp.dest('_build/assets/js'));
});

gulp.task('javascript:deps', function() {
  return gulp.src(DEPS)
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('_build/assets/js'));
});

gulp.task('javascript:docs', function() {
  return gulp.src(DOCS)
    .pipe(concat('docs.js'))
    .pipe(gulp.dest('_build/assets/js'));
});

gulp.task('javascript', gulp.series('javascript:myapplication', 'javascript:deps', 'javascript:docs', /*'deploy:commit',*/));