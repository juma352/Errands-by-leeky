const express = require('express');
const { body } = require('express-validator');
const {
  getErrands,
  getErrand,
  createErrand,
  updateErrand,
  deleteErrand,
  getMyErrands
} = require('../controllers/errands');
const { protect, authorize } = require('../middleware/auth');

const router = express.Router();

router.route('/')
  .get(getErrands)
  .post(protect, authorize('customer'), [
    body('title').notEmpty().withMessage('Title is required'),
    body('description').notEmpty().withMessage('Description is required'),
    body('category').isIn(['Basic errand', 'specialized errands', 'concierge services']).withMessage('Invalid category'),
    body('location').notEmpty().withMessage('Location is required'),
    body('salary').isNumeric().withMessage('Salary must be a number'),
    body('experience').isIn(['entry', 'intermediate', 'senior']).withMessage('Invalid experience level')
  ], createErrand);

router.route('/my-errands')
  .get(protect, authorize('customer'), getMyErrands);

router.route('/:id')
  .get(getErrand)
  .put(protect, updateErrand)
  .delete(protect, deleteErrand);

module.exports = router;