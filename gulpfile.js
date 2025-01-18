import gulp from "gulp";
import * as sass from "sass"; // Zmienione na nowy sposób importu
import gulpSass from "gulp-sass";
import rename from "gulp-rename";
import sourcemaps from "gulp-sourcemaps";
import concat from "gulp-concat";
import { deleteAsync } from "del";
import browserSync from "browser-sync";
import cleanCss from "gulp-clean-css"; // Dodanie pluginu do minifikacji CSS

// Tworzymy instancję Gulp Sass
const sassCompiler = gulpSass(sass);

// Zbieranie plików JS (dla różnych podstron)
function getJsLibraries() {
  return gulp
    .src([
      "assets/src/js/libr/jquery.min.js",
      "assets/src/js/libr/bootstrap.min.js",
    ])
    .pipe(concat("libs.min.js"))
    .pipe(gulp.dest("assets/dist/js"));
}

// Kompilacja SCSS do CSS dla homepage (przykład dla homepage.css)
function homepageStyles() {
  return gulp
    .src("assets/src/scss/homepage.scss") // Możesz dodać więcej punktów wejścia dla innych stron
    .pipe(sourcemaps.init())
    .pipe(sassCompiler().on("error", sassCompiler.logError))
    .pipe(cleanCss()) // Minifikacja CSS
    .pipe(rename({ suffix: ".min" })) // Nazwa pliku będzie "homepage.min.css"
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("assets/dist/css"))
    .pipe(browserSync.stream());
}

// Kompilacja SCSS do CSS dla innych stron
function mainStyles() {
  return gulp
    .src("assets/src/scss/main.scss", { allowEmpty: true }) // Dodano allowEmpty: true
    .pipe(sourcemaps.init())
    .pipe(sassCompiler().on("error", sassCompiler.logError))
    .pipe(cleanCss()) // Minifikacja CSS
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("assets/dist/css"))
    .pipe(browserSync.stream());
}

// Usuwanie plików w folderze dist
function clean() {
  return deleteAsync(["assets/dist/*"]);
}

// Task startowy (czyszczenie + przetwarzanie plików)
function build() {
  return gulp.series(
    clean,
    gulp.parallel(homepageStyles, mainStyles, getJsLibraries)
  );
}

// Uruchomienie BrowserSync i śledzenie plików
function watchFiles() {
  browserSync.init({
    proxy: "http://3color.test", // Zmien na odpowiedni URL
    open: true, // Ustawienie na true
    reloadOnRestart: true, // Wymusza odświeżenie strony po restarcie Gulp
  });

  gulp.watch("assets/src/scss/homepage.scss", homepageStyles); // Nasłuchuje na zmiany w SCSS homepage
  gulp.watch("assets/src/scss/**/*.scss", mainStyles); // Nasłuchuje na zmiany w innych plikach SCSS
  gulp.watch("assets/src/js/**/*.js", getJsLibraries); // Nasłuchuje na zmiany w JS
  gulp.watch("**/*.php").on("change", browserSync.reload); // Nasłuchuje na zmiany w plikach PHP
}

// Zbieramy wszystkie zadania
export const dev = gulp.series(
  clean,
  gulp.parallel(homepageStyles, mainStyles, getJsLibraries),
  watchFiles
);
export default dev;
