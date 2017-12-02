var gulp = require('gulp');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');

gulp.task('default', function() {
    gulp.src(['app/Resources/assets/scss/**/*.scss', '!./assets/scss/**/_*.scss'])
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(gulp.dest('web/css'))
});