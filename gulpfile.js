'use strict';

let gulp         = require('gulp'),
	rename       = require('gulp-rename'),
	notify       = require('gulp-notify'),
	autoprefixer = require('gulp-autoprefixer'),
	sass         = require('gulp-sass'),
	minify       = require('gulp-minify'),
	uglify       = require('gulp-uglify'),
	plumber      = require('gulp-plumber' );

gulp.task( 'rx-theme-css', () => {
	return gulp.src('./assets/sass/style.scss')
		.pipe(
			plumber( {
				errorHandler: function ( error ) {
					console.log('=================ERROR=================');
					console.log(error.message);
					this.emit( 'end' );
				}
			})
		)
		.pipe(sass( { outputStyle: 'compressed' } ))
		.pipe(autoprefixer({
				browsers: ['last 10 versions'],
				cascade: false
		}))

		.pipe(rename('style.css'))
		.pipe(gulp.dest('./'))
		.pipe(notify('Compile Sass Done!'));
});

//watch
gulp.task( 'watch', () => {
	gulp.watch( [ './assets/style.scss', './assets/sass/**'], ['rx-theme-css'] );
});
