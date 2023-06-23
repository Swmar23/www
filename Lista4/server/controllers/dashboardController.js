const Note = require('../models/Notes');
const mongoose = require('mongoose');

/**
 * GET /dashboard
 * Display dashboard
 */
exports.dashboard = async (req, res) => {

  let perPage = 4; // how many notes per one page
  let page = req.query.page || 1;  //by default 

  const locals = {
    title: 'Twoje notatki',
    description: 'Prywatny notatnik zrobiony w NodeJs'
  };

  try {    
    //sort - descending by updated at (newest first)
    //match user that is logged in
    //project - show only 30 characters of title and 150 characters of body
    //skip - to skip first (k-1)*16 notes that should have been displayed in
    //previous pages to the kth page
    //limit - display only 16 notes
    const notes = await Note.aggregate([
      { $sort: { updatedAt: -1 } },
      { $match: { user: new mongoose.Types.ObjectId(req.user.id) } },
      {
        $project: {
          title: { $substr: ["$title", 0, 30] },
          body: { $substr: ["$body", 0, 150] },
        },
      }
      ])
    .skip(perPage * page - perPage)
    .limit(perPage)
    .exec(); 

    const count = await Note.count();

    res.render('dashboard/index', {
      userName: req.user.firstName,
      locals,
      notes,
      layout: "../views/layouts/dashboard",
      current: page,  //current page number
      pages: Math.ceil(count / perPage) //number of pages total
    });

  } catch (error) {
    console.log(error);
  }
};

/**
 * GET /dashboard/item/:id
 * View given note
 * only from notes of specific user!
 */
exports.dashboardViewNote = async(req, res) => {
  const locals = {
    title: 'Przeglądanie notatki',
    description: 'Prywatny notatnik zrobiony w NodeJs'
  };
  const note = await Note.findById({ _id: req.params.id })
  .where({ user: req.user.id })
  .lean();

  if (note) {
    res.render('dashboard/view-note', {
      noteID: req.params.id,
      locals,
      note,
      layout: '../views/layouts/dashboard'
    });
  } else {
    res.send("Something went wrong.")
  }
};

/**
 * PUT /dashboard/item/:id
 * Update given note
 */
exports.dashboardUpdateNote = async(req, res) => {
  try {

    await Note.findOneAndUpdate(
      {_id: req.params.id},
      { title: req.body.title, body: req.body.body, updatedAt: Date.now() }
      ).where( { user: req.user.id } );

      res.redirect('/dashboard');

  } catch (error) {
    console.log(error);
  }
};

/**
 * DELETE /dashboard/item/:id
 * Deletes given note
 */
exports.dashboardDeleteNote = async(req, res) => {
  try {
    await Note.deleteOne({_id: req.params.id}).where({user: req.user.id});
    res.redirect('/dashboard');
  } catch (error) {
    console.log(error);
  }
}

/**
 * GET /dashboard/add
 * Go to add note screen
 */
exports.dashboardAddNoteScreen = async(req, res) => {
  try {
    res.render('dashboard/add-note', {
      layout: '../views/layouts/dashboard'
    });
  } catch (error) {
    console.log(error);
  }
}


/**
 * POST /dashboard/item
 * Adds new note
 */
exports.dashboardAddNote = async(req, res) => {
  try {
    req.body.user = req.user.id;
    await Note.create(req.body);
    res.redirect('/dashboard');
  } catch (error) {
    console.log(error);
  }
}


/**
 * GET /dashboard/search
 * Proceed with searching (show search results)
 */
exports.dashboardSearchScreen = async(req, res) => {
  try {
    res.render('dashboard/search', {
      searchResults: '',
      locals,
      layout: '../views/layout/dashboard'
    })
  } catch (error) {
    console.log(error);
  }
}

/**
 * POST /dashboard/search
 * Submit the search
 */
exports.dashboardSearch = async(req, res) => {
  const locals = {
    title: 'Wyniki wyszukiwania',
    description: 'Prywatny notatnik zrobiony w NodeJs'
  };
  try {
    let searchTerm = req.body.searchTerm; //input from search bar
    const searchNoSpecialCharacters = searchTerm.replace(/[^a-zA-Z0-9 ]/g, "");

    const searchResults = await Note.find({
      $or: [
        { title: { $regex: new RegExp(searchNoSpecialCharacters, 'i')}},
        { body: { $regex: new RegExp(searchNoSpecialCharacters, 'i')}}
      ]
    }).where( {user: req.user.id })

    res.render('dashboard/search', {
      searchResults,
      locals,
      layout: '../views/layouts/dashboard'
    })
  } catch (error) {
    console.log(error);
  }
}
