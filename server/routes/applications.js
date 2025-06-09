const express = require('express');
const { body } = require('express-validator');
const {
  getApplications,
  getApplication,
  createApplication,
  updateApplication,
  deleteApplication,
  getMyApplications,
  approveApplication,
  rejectApplication,
  updateTracking,
  rateApplication
} = require('../controllers/applications');
const { protect } = require('../middleware/auth');

const router = express.Router();

router.route('/')
  .get(protect, getApplications)
  .post(protect, [
    body('errand').notEmpty().withMessage('Errand ID is required'),
    body('expectedSalary').isNumeric().withMessage('Expected salary must be a number')
  ], createApplication);

router.route('/my-applications')
  .get(protect, getMyApplications);

router.route('/:id')
  .get(protect, getApplication)
  .put(protect, updateApplication)
  .delete(protect, deleteApplication);

router.route('/:id/approve')
  .post(protect, approveApplication);

router.route('/:id/reject')
  .post(protect, rejectApplication);

router.route('/:id/tracking')
  .post(protect, updateTracking);

router.route('/:id/rate')
  .post(protect, [
    body('score').isInt({ min: 1, max: 5 }).withMessage('Rating must be between 1 and 5')
  ], rateApplication);

module.exports = router;