const express = require('express');
const router = express.Router();
const { isLoggedIn } = require('../middleware/checkAuth');
const dashboardController = require('../controllers/dashboardController');


router.get('/dashboard', isLoggedIn, dashboardController.dashboard);
router.get('/dashboard/item/:id', isLoggedIn, dashboardController.dashboardViewNote);
router.put('/dashboard/item/:id', isLoggedIn, dashboardController.dashboardUpdateNote);
router.delete('/dashboard/item/:id', isLoggedIn, dashboardController.dashboardDeleteNote);
router.get('/dashboard/add', isLoggedIn, dashboardController.dashboardAddNoteScreen);
router.post('/dashboard/item', isLoggedIn, dashboardController.dashboardAddNote);
router.get('/dashboard/search', isLoggedIn, dashboardController.dashboardSearchScreen);
router.post('/dashboard/search', isLoggedIn, dashboardController.dashboardSearch);

module.exports = router;