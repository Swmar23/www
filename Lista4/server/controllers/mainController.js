const { isLoggedIn } = require('../middleware/checkAuth');
/**
 * GET /
 * Homepage for notes
 */
exports.homepage = async (req, res) => {
  const locals = {
    title: 'Twoje notatki',
    description: 'Prywatny notatnik zrobiony w NodeJs'
  };
  isLogged = false;
  if (req.user) {
    isLogged = true;
  } else {
    isLogged = false;
  }
  res.render('index', {
    locals,
    isLogged,
    layout: '../views/layouts/landing-page'});
}


/**
 * GET /
 * About
 */
exports.about = async (req, res) => {
  const locals = {
    title: 'O aplikacji - notatnik w NodeJs',
    description: 'Prywatny notatnik zrobiony w NodeJs'
  }
  isLogged = false;
  if (req.user) {
    isLogged = true;
  } else {
    isLogged = false;
  }
  res.render('about', {
    locals,
    isLogged
  });
}