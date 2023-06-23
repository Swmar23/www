const express = require('express');
const passport = require('passport');
const router = express.Router();
const GoogleStrategy = require('passport-google-oauth20').Strategy;
const User = require('../models/User');

passport.use(new GoogleStrategy({
  clientID: process.env.GOOGLE_CLIENT_ID,
  clientSecret: process.env.GOOGLE_CLIENT_SECRET,
  callbackURL: process.env.GOOGLE_CALLBACK_URL
},
async function(accessToken, refreshToken, profile, done) {
  
  const newUser = {
    googleId: profile.id,
    displayName: profile.displayName,
    firstName: profile.name.givenName,
    lastName: profile.name.familyName,
    profileImage: profile.photos[0].value
  };

  try {
    //sprawdzamy, czy w bazie danych mamy już użytkownika
    let user = await User.findOne( {googleId: profile.id} );
    if (user) {
      done(null, user);
    } else {
      //jeśli nie ma go w bazie to go dodajemy
      user = await User.create(newUser);
      done(null, user);
    }
    
  } catch (error) {
    console.log(error);
  }
}
)); 


router.get('/google',
  passport.authenticate('google', { scope: ['email', 'profile'] }));

router.get('/google/callback', 
  passport.authenticate('google', { 
    failureRedirect: '/login-failure',
    successRedirect: '/dashboard'
  })
);

//when login fails
router.get('/login-failure', (req, res) => {
  res.send('Something went wrong...');
});

//End user session
router.get('/logout', (req, res) => {
  req.session.destroy(error => {
    if(error) {
      console.log(error);
      res.send('Error when logging out.');
    } else {
      res.redirect('/');
    }
  })
})


//persist user's data after successful authentication
passport.serializeUser(function(user, done) {
  done(null, user.id);
});


//get needed user's data from session
passport.deserializeUser(async (id, done) => {

  try {

    const user = await User.findById(id);

    done(null, user);

  } catch (err) {

    done(err, null);

  }

});

module.exports = router;