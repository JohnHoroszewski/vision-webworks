const gulp = require( 'gulp' );
const sourcemaps = require( 'gulp-sourcemaps' );
const sass = require('gulp-sass');
const csso = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
 
sass.compiler = require('node-sass');

function sync(done) {
  browserSync.init({
    files: [
      './**/*.php'
    ],
    proxy: 'http://localhost/visionww'
  });
  done();
}

function sassy() {
  return gulp.src('./assets/*.scss')
    .pipe( sourcemaps.init() )
    .pipe(sass().on('error', sass.logError))
    .pipe( autoprefixer() )
    .pipe(csso())
    .pipe( sourcemaps.write( './' ) )
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
};

gulp.task( "sass", sassy );
gulp.task( "sync", sync )

gulp.task( 'watch', function () {
  gulp.watch('./assets/*.scss', gulp.parallel('sass', 'sync'));
});
