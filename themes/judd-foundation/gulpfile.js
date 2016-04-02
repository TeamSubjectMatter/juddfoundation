var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var browserSync = require('browser-sync');

function errorHandler(err) {
    // Logs out error in the command line
    console.log(err.toString());
    // Ends the current pipe, so Gulp watch doesn't break
    this.emit('end');
}

function customPlumber(errTitle) {
    return plumber({
        errorHandler: notify.onError({
            // Customizing error title
            title: errTitle || "Error running Gulp",
            message: "Error: <%= error.message %>",
            sound: "Glass"
        })
    });
}

// Gulp Sass Task 
gulp.task('sass', function() {
    gulp.src('sass/{,*/}*.{scss,sass}')
    .pipe(sourcemaps.init())
    //.pipe(sourcemaps.write())
    .pipe(customPlumber('Error Running Sass'))
    .pipe(sass())
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({
        stream: true
    }));
})

gulp.task('watch', ['sass', 'autoprefixer'], function () {
    gulp.watch('sass/{,*/}*.{scss,sass}', ['sass']);
});
 
gulp.task('browserSync', function() {
    browserSync({
        server: {
            baseDir: ''
        },
    })
});

gulp.task('autoprefixer', function () {
    var postcss      = require('gulp-postcss');
    var sourcemaps   = require('gulp-sourcemaps');
    var autoprefixer = require('autoprefixer');

    return gulp.src('*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer({ browsers: ['last 2 versions'] }) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(''));
});


gulp.task('default', ['watch', 'browserSync'], function() {

});