'use strict'

import gulp, { parallel } from 'gulp'
import * as dartSass from 'sass'
import gulpSass from 'gulp-sass'
import rename from 'gulp-rename'
import autoprefixer from 'gulp-autoprefixer'
import uglify from 'gulp-uglify'
import clean from 'gulp-clean-css'
import replace from 'gulp-replace'
import merge from 'merge-stream'
import { create as createBrowserSync } from 'browser-sync'

const { src, dest } = gulp
const browserSync = createBrowserSync()

function buildStyles() {
  const sass = gulpSass(dartSass)

  return src('./assets/src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(clean())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('./assets/dist/css/'))
    .pipe(browserSync.stream())
}

function buildScripts() {
  return src('./assets/src/js/**/*.js')
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('./assets/dist/js/'))
}

function watch() {
  parallel(buildStyles, buildScripts)
  gulp.watch('./assets/src/scss/**/*.scss', buildStyles)
  gulp.watch('./assets/src/js/**/*.js', buildScripts)

  browserSync.init({
    proxy: 'http://clickumuarama.local/',
    port: 3000,
    notify: false,
    open: false,
    files: [
      './**/*.php',
      './assets/img/**/*',
      './assets/vendor/**/*',
      './assets/dist/**/*',
      '!./assets/dist/**/*.css',
    ],
  })
}

function stampCss(version) {
  return gulp.src('style.css', { base: './' })
    .pipe(replace('{{PLACEHOLDER_VERSION}}', `Version: ${version}`))
    .pipe(gulp.dest('./'));
}

function stampPhp(version) {
  return gulp.src('utils/support.php', { base: './' })
    .pipe(replace('{{PLACEHOLDER_VERSION}}', version))
    .pipe(gulp.dest('./'));
}

function stampVersion() {
  const version = process.env.VERSION || '0.0.0'
  return merge(stampCss(version), stampPhp(version));
}

gulp.task('stamp', stampVersion)
gulp.task('build:styles', buildStyles)
gulp.task('build:scripts', buildScripts)
gulp.task('build', parallel(buildStyles, buildScripts))
gulp.task('watch', watch)
