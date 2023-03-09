var fs = require('fs');
var gulp = require('gulp');
var Parker = require('parker/lib/Parker');
var prettyJSON = require('prettyjson');
var sass = require('gulp-sass')(require('node-sass'));
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var octophant = require('octophant');

var PATHS = [
  'src/scss',
  'src/mydocs/scss',
  'node_modules/motion-ui/src',
  'node_modules/foundation-docs/scss'
];

var COMPATIBILITY = [
  'last 2 versions',
  'ie >= 9',
  'and_chr >= 2.3'
];

// Compiles MyApplication Sass
gulp.task('sass:myapplication', function() {
  return gulp.src(['src/assets/*'])
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: COMPATIBILITY
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('_build/assets/css'));
});

// Compiles docs Sass
gulp.task('sass:docs', function() {
  return gulp.src('src/docs/assets/scss/docs.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: PATHS
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: COMPATIBILITY
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('_build/assets/css'));
});

// Compiles Sass files into CSS
gulp.task('sass', gulp.series('sass:myapplication', 'sass:docs', /*'deploy:commit',*/));

// Audits CSS filesize, selector count, specificity, etc.
gulp.task('sass:audit', gulp.series('sass:myapplication', function(cb) {
  fs.readFile('./_build/assets/css/myapplication.css', function(err, data) {
    var parker = new Parker(require('parker/metrics/All'));
    var results = parker.run(data.toString());
    console.log(prettyJSON.render(results));
    cb();
  });
}));


// Generates a settings file
gulp.task('sass:settings', function(cb) {
  var options = {
    title: '[MyApplication] Settings',
    output: './src/scss/settings/_settings.scss',
    groups: {
      // turn on/off foundation groups ^^
      //'grid': 'The Grid',
      //'off-canvas': 'Off-canvas',
      //'typography-base': 'Base Typography'
    },
    sort: [
      // turn on/off foundation sorting ^^
      'global',
      'breakpoints',
      //'grid',
      //'typography-base',
      //'typography-helpers'
    ],
    imports: [
      // turn on/off foundation imports ^^
      'util/util'
    ]
  }

  octophant('./src/scss', options, cb);
});