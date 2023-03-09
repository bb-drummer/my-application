var gulp = require('gulp');
var scssLint = require('gulp-scss-lint');
var jshint = require('gulp-jshint');

var PATHS = [
  'src/scss/**/*.scss',
  '!src/scss/vendor/**/*.scss',
  '!src/scss/components_old/**/*.scss'
];

gulp.task('lint:sass', function() {
  return gulp.src(PATHS)
    .pipe(scssLint({
      'config': 'config/scss-lint.yml'
    }));
});

gulp.task('lint:javascript', function() {
  jshint.lookup = false;

  return gulp.src('js/*.js')
    .pipe(jshint('./config/.jshintConfig'))
    .pipe(jshint.reporter('default'));
});

// Lints Sass and JavaScript files for formatting issues
gulp.task('lint', gulp.series('lint:sass', 'lint:javascript'));
