require('dotenv').config();

const express = require('express');
const expressLayouts = require('express-ejs-layouts');
const methodOverride = require('method-override');
const connectDB = require('./server/config/db');
const session = require('express-session');
const passport = require('passport');
const MongoStore = require('connect-mongo');

const app = express();
const port = 5000 || process.env.port;
app.use(session({
  secret: 'some secret',
  resave: false,
  saveUninitialized: true,
  store: MongoStore.create({
    mongoUrl: process.env.MONGODB_URI
  }),
  cookie: {maxAge: 3600000} //ciasteczko ważne godzinę
}));


app.use(passport.initialize());
app.use(passport.session());

app.use(express.urlencoded({extended: true}));
app.use(express.json());
app.use(methodOverride("_method"));


// STATIC FILE
app.use(express.static('public'));

// CONNECTING TO DATABASE
connectDB();

// TEMPLATING ENGINE
app.use(expressLayouts);
app.set('layout', './layouts/main');
app.set('view engine', 'ejs');

// ROUTES
app.use('/', require('./server/routes/auth'));
app.use('/', require('./server/routes/index'));
app.use('/', require('./server/routes/dashboard'));


//THIS HAS TO BE THE LAST ROUTE  (404)!!
app.get('*', function(req, res) {
  isLogged = false;
  if (req.user) {
    isLogged = true;
  } else {
    isLogged = false;
  }
  res.status(404).render('404', {
    isLogged
  });
})

app.listen(port, () => {
  console.log(`App listening on port ${port}`);
})